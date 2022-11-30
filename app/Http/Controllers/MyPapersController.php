<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Authors;
use App\Models\College;
use App\Models\Relations;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use DB;
use Auth;

class MyPapersController extends Controller
{
    public function index(Request $request)
    {
       $paper = Papers::where([
        ['PaperTitle', '!=', Null],
        [function($query) use ($request) {
            if (($term = $request->term)) {
                $query->orWhere('PaperTitle', 'LIKE','%'. $term . '%')
                    ->orWhere('PaperType', 'LIKE','%'. $term . '%')
                    ->orWhere('College', 'LIKE','%'. $term . '%')->get();
            }
        }]
       ])
            ->orderBy("PaperID", "desc")
            ->paginate(5);

        return view('papers.displaysearch', compact('paper'))
            ->with('i', (request()->input('page', 1) -1) *5);

    }

    public function view($PaperID)
    {
        $paper = Papers::find($PaperID);

        
        $result = DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)
        ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
        ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
        ->select(DB::raw("GROUP_CONCAT(authors.Fname,' ', authors.Lname) as FullName"))
        ->get();

        return view('papers.viewPDF', compact('paper','result'));
    }

    public function create()
    {
        return view('papers.uploadpaper');
    }

    public function store(Request $request)
    {
        $request->validate([
            'PaperTitle' => 'required',
            'PaperType' => 'required',
            'file' => [
                'required',
                File::types('pdf')
                    ->max(12 * 1024),
            ],
        ]);

        $user = DB::table('users')
            ->where('UserID', '=', Auth::user()->UserID)
            ->value('UserID');
        
        $paper=new Papers();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $paper->file=$filename;

            $paper->PaperTitle=$request->PaperTitle;
            $paper->PaperType=$request->PaperType;
            $paper->College=$request->College;
            $paper->DateCompleted=$request->DateCompleted;
            $paper->ContentAdviser=$request->ContentAdviser;
            $paper->UploaderUserID = $user;

            $paper->save();

            $input = $request->all();

            if(count($input['Fname']) > 0){
                for($i = 0 ; $i < count($input['Fname']) ; $i++){
                    $author = new Authors();
                    $relate = new Relations();
    
                    $author->Fname = $input['Fname'][$i];
                    $author->Lname = $input['Lname'][$i];
                    $author->paper_id = $paper->PaperID;
                    $author->save();
    
                    $relate->author_ID = $author->AuthorID;
                    $relate->paper_ID = $paper->PaperID;
                    $relate->save();
                }
            }

            return redirect()->back()->with('success','File has been uploaded.');

    }

    public function joint()
    {
        $result = DB::table('authors')
            ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
            ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
            ->select('papers.PaperTitle as PaperTitle', DB::raw("GROUP_CONCAT(authors.Fname,' ', authors.Lname) as FullName"),
            DB::raw('count(authors.AuthorID) as total'))
            ->orderBy('papers.PaperTitle', 'desc')
            ->groupBy('papers.PaperID')
            ->get();

            return $result;
    }
 
}
