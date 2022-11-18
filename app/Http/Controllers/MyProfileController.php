<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Papers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use DB;
use Auth;


class MyProfileController extends Controller
{
    public function index()
    {
        return view('profile.myprofile');
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

        return redirect()->back()->with("status", "Password changed successfully!");
    }

    

   
}
