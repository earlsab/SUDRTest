<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Papers;
use App\Models\College;
use App\Models\PaperType;
use App\Models\Bookmarks;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Validator;

use DB;
use Auth;


class MyProfileController extends Controller
{
    public function index()
    {
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();
        $bm = Bookmarks::all();

        return view('profile.myprofile', compact('College','PT','paper','bm'));
    }

    public function changepass()
    {
        return view('profile.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);

        if(!Hash::check($request->oldpassword, auth()->user()->password)){
            return redirect()->back()->with("error", "Old Password Doesn't match!");
        }

        DB::table('users')
            ->where('UserID', '=', Auth::user()->UserID)
            ->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return redirect()->back()->with("message", "Password changed successfully!");
    }

    

   
}
