<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Authors;
use App\Models\College;
use App\Models\Relations;
use App\Models\PaperType;
use App\Models\User;

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
        $PT = PaperType::all();
        $College = College::all();
        $searchstr=$request->term;
        $count = 0;
        $allpaper = Papers::all();

        $paper = Papers::where([
        ['PaperTitle', '!=', Null],
        [function($query) use ($request) {
            $count = 2;
            if (($term = $request->term)) {

                $keywordresult = DB::table('tagging_tagged')
                ->orWhere('tag_name', 'LIKE','%'. $request->term . '%')->get();

                $author = DB::table('authors')
                ->orWhere('Fname', 'LIKE','%'. $request->term . '%')
                ->orWhere('Lname', 'LIKE','%'. $request->term . '%')->get();

                foreach($author as $authors){
                    $query->orwhere('PaperID', '=', $authors -> paper_id)
                        ->orWhere('PaperTitle', 'LIKE','%'. $term . '%')
                        ->orWhere('PaperType', 'LIKE','%'. $term . '%')
                        ->orWhere('College', 'LIKE','%'. $term . '%')
                        //->orWhere('ContentAdviser', 'LIKE','%'. $term . '%')
                        ->get();
                }

                foreach($keywordresult as $keywordresults){
                $query->orwhere('PaperID', '=', $keywordresults -> taggable_id)
                    ->orWhere('PaperTitle', 'LIKE','%'. $term . '%')
                    ->orWhere('PaperType', 'LIKE','%'. $term . '%')
                    ->orWhere('College', 'LIKE','%'. $term . '%')
                    //->orWhere('ContentAdviser', 'LIKE','%'. $term . '%')
                    ->get();
                }

                $query->orWhere('PaperTitle', 'LIKE','%'. $term . '%')
                    ->orWhere('PaperType', 'LIKE','%'. $term . '%')
                    ->orWhere('College', 'LIKE','%'. $term . '%')
                    //->orWhere('ContentAdviser', 'LIKE','%'. $term . '%')
                    ->get();
                
                 
            }
            
        }]
       ])
        
            ->orderBy("PaperID", "desc")
            ->paginate();
            $tags = Papers::all();
        $count = $paper ->count();
        return view('papers.displaysearch', compact('paper','tags','allpaper','searchstr', 'PT', 'College', 'count'))
            ->with('i', (request()->input('page', 1) -1) *5);

    }

    public function filter(Request $request){

        $PT = PaperType::all();
        $College = College::all();
        $allpaper = Papers::all();
        $searchstr=$request->term;
        $requestPT = null;
        $requestCollege = null;
        $requestCollegeEquals = '!=';
        $requestPTEquals = '!=';
        $notequals = "!=";
        $null = null;
        $requestAuthor = null;
        $requestAuthorEquals = "!=";
        $count = 0;

        if($request -> has('College')){
            $requestCollegeEquals = '=';
            $requestCollege = $request->College;
        }

        if($request -> has('PaperType')){
            $requestPTEquals = '=';
            $requestPT = $request->PaperType;
        }

        if($request ->Author){
            
            $author = DB::table('authors')
                    ->orWhere('Fname', 'LIKE','%'. $request->Author . '%')
                    ->orWhere('Lname', 'LIKE','%'. $request->Author . '%')->latest()->first();
                    if($author){
                        $requestAuthorEquals = '=';
                        $requestAuthor = $author->paper_id;
                    }else {
                        $requestAuthor = null;
                        $requestAuthorEquals = '!=';
                    }
                    //$requestAuthorEquals = '!=';
        }

        $paper = Papers::where([
        ['PaperTitle', $notequals, $null],
        ['College', $requestCollegeEquals, $requestCollege],
        ['PaperType', $requestPTEquals, $requestPT],
        ['PaperID', $requestAuthorEquals, $requestAuthor],


        [function($query) use ($request) {
            $count = 2;
            if (($term = $request->term)) {


                if($request ->Author){
            
                    $author = DB::table('authors')
                            ->orWhere('Fname', 'LIKE','%'. $request->Author . '%')
                            ->orWhere('Lname', 'LIKE','%'. $request->Author . '%')->latest()->first();
                            if($author){
                                $requestAuthorEquals = '=';
                                $requestAuthor = $author->paper_id;
                            }else {
                                $requestAuthor = null;
                                $requestAuthorEquals = '!=';
                            }
                            //$requestAuthorEquals = '!=';
                }

                $keywordresult = DB::table('tagging_tagged')
                ->orWhere('tag_name', 'LIKE','%'. $request->term . '%')->get();
                
                foreach($keywordresult as $keywordresults){
                $query->orwhere('PaperID', '=', $keywordresults -> taggable_id)
                    ->orWhere('PaperTitle', 'LIKE','%'. $term . '%')->get();
                }

                $query->orWhere('PaperTitle', 'LIKE','%'. $term . '%')->get();
            }
        }]
       ])


            ->orderBy("PaperID", "desc")
            ->paginate(5);
            $tags = Papers::all();
        
        return view('papers.displaysearch', compact('paper','tags','allpaper', 'searchstr', 'College', 'PT', 'count'))
            ->with('i', (request()->input('page', 1) -1) *5);

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
        ->select(DB::raw("GROUP_CONCAT(' ', substr(authors.Lname , 1 , 1),'.',' ', authors.Fname) as Citation"))
        ->get();

        $cite2 = DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)
        ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
        ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
        ->select(DB::raw("GROUP_CONCAT(' ', authors.Lname,',',' ', substr(authors.Fname , 1 , 1)) as Citation"))
        ->get();

        $result = DB::table('authors')
        ->where('authors.paper_id', '=', $PaperID)
        ->join('relations', 'relations.author_ID', '=', 'authors.AuthorID')
        ->join('papers', 'papers.PaperID', '=', 'relations.paper_ID')
        ->select(DB::raw("GROUP_CONCAT(' ', authors.Fname,' ', authors.Lname) as FullName"))
        ->get();

        $keyword = DB::table('tagging_tagged')
        ->where('taggable_id' , '=' , $PaperID)
        ->get();

        return view('papers.viewPDF', compact('paper','result','cite','cite2','College','PT','author', 'keyword'));
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
            'tags' => 'required',
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
            $input = $request->all();
            $tags = explode(",", $request->tags);
            
            $paper->save();
            $paper->tag($tags);

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
 

            return redirect()->back()->with('message','File has been uploaded.');

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

    public function update(Request $request, $PaperID)
    {
        $request->validate([
            'PaperTitle' => 'required',
            'PaperType' => 'required',
        ]);

        $paper=Papers::find($PaperID);

        $file=$request->file;
        if($request->file !== null){
        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $paper->file=$filename;
        }
            $paper->PaperTitle=$request->PaperTitle;
            $paper->PaperType=$request->PaperType;
            $paper->College=$request->College;
            $paper->DateCompleted=$request->DateCompleted;
            $paper->ContentAdviser=$request->ContentAdviser;
            $paper->modified_by=$request->modified_by;
            $input = $request->all();
            $tags = explode(",", $request->tags);
            $paper->save();

            $paper->tag($tags);
            $author=Relations::select('author_ID')
            ->where('paper_ID', $PaperID)->get();

            

            $prevcount = Relations::where('paper_ID', $PaperID)->get()->count();

            $input = $request->all();
            $newcount = count($input['Fname']);

            if($newcount < $prevcount){
                for($i = $prevcount; $newcount < $i ; $i--){
                    
                    $writerID=Relations::where('paper_ID', $PaperID)->orderBydesc('author_ID')->take(1)->value('id');
                    $writer_AuthorsID=Authors::where('paper_ID', $PaperID)->orderBydesc('AuthorID')->take(1)->value('AuthorID');
                    Relations::destroy($writerID);
                    Authors::destroy($writer_AuthorsID);
                    
                }
            }
            else{
                for($i = $prevcount; $newcount > $i ; $i++){
                    $author = new Authors();
                    $relate = new Relations();
                    
                    $AuthorData = [
                        'Fname' => $input['Fname'][$i],
                        'Lname' => $input['Lname'][$i],
                        'paper_id'  => $PaperID,
                    ];
        
                    $authorsmake = Authors::create($AuthorData);

                    $RelationsData = [
                        'paper_ID'  => $PaperID,
                        'author_ID' => $authorsmake->AuthorID,
                    ];

                    Relations::create($RelationsData);
    
                }
            }

            
            
            $relate_authors = Relations::where('paper_ID', $PaperID)->get();

            $i = 0;
                
                foreach($relate_authors as $relate_author){
                    $finding = Authors::find($relate_author->author_ID);

                    

                    $AuthorData = [
                        'Fname' => $input['Fname'][$i],
                        'Lname' => $input['Lname'][$i],
                    ];

                    $finding->update($AuthorData);
                    $i += 1;
                }           

            return redirect()->back()->with('message','File has been updated.');

    }

    public function editPDF($PaperID) {

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
        ->select(DB::raw("GROUP_CONCAT(' ', authors.Fname,' ', authors.Lname) as FullName"))
        ->get();

        $keyword = DB::table('tagging_tagged')
        ->where('taggable_id' , '=' , $PaperID)
        ->get();
        return view('papers.editPDF', compact('paper','result','cite','College','PT','author','keyword'));
    }

    public function keysearch(Request $request){
        
        $PT = PaperType::all();
        $College = College::all();
        $allpaper = Papers::all();
        $searchstr=$request->term;
        $requestPT = null;
        $requestCollege = null;
        $requestCollegeEquals = '!=';
        $requestPTEquals = '!=';
        $notequals = "!=";
        $null = null;
        $requestAuthor = null;
        $requestAuthorEquals = "!=";
        $count = 0;

        if($request -> has('College')){
            $requestCollegeEquals = '=';
            $requestCollege = $request->College;
        }

        if($request -> has('PaperType')){
            $requestPTEquals = '=';
            $requestPT = $request->PaperType;
        }


        $paper = Papers::where([

        ['PaperID', $requestAuthorEquals, $requestAuthor],


        [function($query) use ($request) {
            $count = 2;
            if (($term = $request->term)) {

                $keywordresult = DB::table('tagging_tagged')
                ->orWhere('tag_name', 'LIKE','%'. $request->term . '%')->get();
                
                foreach($keywordresult as $keywordresults){
                $query->orwhere('PaperID', '=', $keywordresults -> taggable_id);
                }

            }
        }]
    ]);
            $tags = Papers::all();
        
        return view('papers.keywordsearch', compact('paper','tags','allpaper', 'searchstr', 'College', 'PT', 'count'));
    }
 
}
