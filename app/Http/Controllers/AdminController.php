<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Authors;
use App\Models\College;
use App\Models\Relations;
use App\Models\PaperType;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use DB;
use Auth;



class AdminController extends Controller
{
    public function index()
    {
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();

        $result_weekly = (new StatsController)->stats_weekly();
        $result_monthly = (new StatsController)->stats_monthly();
        $result_yearly = (new StatsController)->stats_yearly();

        return view('admin.adminpage',compact('College','PT','paper', 'result_weekly', 'result_monthly', 'result_yearly'));
    }
    

   public function showAll()
   {
        $paper=Papers::all();
        return view('admin.mypapersadmin',compact('paper'));
   }

   public function maintenance()
   {
        $paper=Papers::all();
        return view('admin.mpm',compact('paper'));
   }

   public function view($PaperID)
   {
        $College = College::all();
        $PT = PaperType::all();

        $paper = Papers::find($PaperID);

        $author=DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)->get();

        $cite = DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)
        ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
        ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
        ->select(DB::raw("GROUP_CONCAT(authors.Lname,' ', authors.Fname) as Citation"))
        ->get();

        $result = DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)
        ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
        ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
        ->select(DB::raw("GROUP_CONCAT(authors.Fname,' ', authors.Lname) as FullName"))
        ->get();

        $keyword = DB::table('tagging_tagged')
        ->where('taggable_id' , '=' , $PaperID)
        ->get();

        return view('admin.viewPDFAdmin', compact('paper','result','cite','College','PT','author', 'keyword'));
   }

   public function destroy(Papers $paper)
   {    
        $papers = $paper->PaperID;

        $authorID=DB::table('authors')
        ->where('paper_id', '=', $paper)
        ->value('AuthorID');

        $relation=DB::table('relations')
        ->where('paper_ID', '=', $paper)
        ->where('author_ID', '=', $authorID)
        ->value('id');
        
        DB::table('papers')->where('PaperID', '=', $papers)->delete();
        
        // Authors::destroy($authorID);
        // Relations::destroy($relation);
        
        return redirect()->route('AdminPage');
   }

   public function edit(Papers $paper, $PaperID)
   {
       $paper=Papers::find($PaperID);
       return view('admin.updatepaper',compact('paper'));
   }

   public function update(Request $request, $PaperID)
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

        $paper=Papers::find($PaperID);

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $paper->file=$filename;

            $paper->DatePublished=$request->DatePublished;
            $paper->PaperTitle=$request->PaperTitle;
            $paper->PaperType=$request->PaperType;
            $paper->Authors=$request->Authors;


            $paper->update();
            return redirect()->route('AdminPage');
   }
    
   
}
