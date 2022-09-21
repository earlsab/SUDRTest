<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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


        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return redirect()->back()->with("status", "Password changed successfully!");
    }
}
