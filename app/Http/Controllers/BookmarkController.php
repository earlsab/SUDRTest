<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\Bookmarks;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;
use Auth;


class BookmarkController extends Controller
{
    public function index()
    {
        $bm = Bookmarks::all();
        
        // $paper = DB::table('bookmarks')
        // ->where($bm->paper_id, '=', 'PaperID')->get();

        $bookmark_details = DB::table('bookmarks')
            ->join('papers', 'bookmarks.paper_id','=', 'papers.PaperID')->get();

        return view('papers.mybookmarks', compact('bm', 'bookmark_details'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'BookmarkName' => 'required',
        ]);

        
        $paper = DB::table('papers')
            ->where('PaperID', '=', $request->paper_id)
            ->value('PaperID');

        $user = DB::table('users')
            ->where('UserID', '=', Auth::user()->UserID)
            ->value('UserID');
        

        $bm = new Bookmarks();
        $bm->BookmarkName=$request->BookmarkName;
        $bm->paper_id = $paper;
        $bm->user_id = $user;

        $bm->save();
        return redirect()->back()->with('success','Bookmark Added');
    }
}
