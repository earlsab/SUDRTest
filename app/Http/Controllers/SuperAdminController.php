<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Papers;
use App\Models\College;
use App\Models\PaperType;
use App\Models\Bookmarks;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();
        $bm = Bookmarks::all();

        return view ('admin.superadminpanel',compact('users','College', 'PT', 'paper', 'bm'));
    }
}
