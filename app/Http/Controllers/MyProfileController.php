<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
