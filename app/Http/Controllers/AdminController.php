<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminpage');
    }
    

    public function login()
    {
        return view('admin.adminlogin');
    }

    public function authenticate(Request $request)
    {
       

       return view ('admin.adminpage');
    }
    
   
}
