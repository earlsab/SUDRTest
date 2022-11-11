<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Bookmarks;


class BookmarkController extends Controller
{
    public function index()
    {
        return view('bookmarks.bookmarks');
    }

    public function store(Request $request)
    {
        $request->validate([
            'BookmarkName' => 'required',
        ]);

        $bm = new Bookmarks();
        $bm->BookmarkName=$request->BookmarkName;
        //$bookmark->user_id = auth()->user()->UserID;

        $bm->save();
        return redirect()->back()->with('success','Bookmark Added');
    }
}
