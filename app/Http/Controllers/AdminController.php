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

        $top3_keywords_names = array("");
        $top3_keywords_count = array(0);

        $range1_chartdata = 0;
        $range2_chartdata = 0;

        return view('admin.adminpage',compact('College','PT','paper', 'range1_chartdata', 'range2_chartdata', 'top3_keywords_names', 'top3_keywords_count'));
    }

    public function compareData(Request $request)
    {
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();


        $r1mA = $request->Range1monthA;
        $r1yA = $request->Range1yearA;
        $r1mB = $request->Range1monthB;  
        $r1yB = $request->Range1yearB; 
    
        $r2mA = $request->Range2monthA; 
        $r2yA = $request->Range2yearA;
        $r2mB = $request->Range2monthB; 
        $r2yB = $request->Range2yearB;

        $range1_chartdata = (new StatsController)->compareRange1($r1mA, $r1yA, $r1mB, $r1yB);
        
        $range2_chartdata = (new StatsController)->compareRange2($r2mA, $r2yA, $r2mB, $r2yB);
        return view('admin.adminpage',compact('College','PT','paper', 'range1_chartdata', 'range2_chartdata'));
    }

    public function filterKeywords(Request $request)
    {
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();

        $range1_chartdata = 0;
        $range2_chartdata = 0;

        $year = $request->keyYear; 
        $month = $request->keyMonth; 

        $top3_keywords = (new StatsController)->keywordFilter($month, $year);

        $top3_keywords_names = $top3_keywords->keys();
        $top3_keywords_count = $top3_keywords->values();

        return view('admin.adminpage', compact('College', 'PT', 'paper', 'top3_keywords_names', 'top3_keywords_count', 'range1_chartdata', 'range2_chartdata'));
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
