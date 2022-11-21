<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\College;

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
                    ->orWhere('PaperType', 'LIKE','%'. $term . '%')->get();
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
        return view('papers.viewPDF', compact('paper'));
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
            'Authors' => 'required',
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
            $paper->Authors=$request->Authors;
            $paper->College=$request->College;
            $paper->UploaderUserID = $user;

            $paper->save();
            return redirect()->back()->with('success','File has been uploaded.');

    }
 
}
