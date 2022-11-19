<?php

namespace App\Http\Controllers;

use App\Models\Bookmarks;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use DB;


class BookmarkController extends Controller
{
    public function index()
    {
        $bm = Bookmarks::all();
        return view('bookmarks.bookmarks', compact('bm'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'BookmarkName' => 'required',
        ]);

        $paper = DB::table('papers')
            ->where('PaperID', '=', $request->paper_id)
            ->value('PaperID');

        $bm = new Bookmarks();
        $bm->BookmarkName=$request->BookmarkName;
        $bm->paper_id = $paper;

        $bm->save();
        return redirect()->back()->with('success','Bookmark Added');
    }
}
