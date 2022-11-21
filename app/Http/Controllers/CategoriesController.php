<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\PaperType;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $paper = Papers::all();
        $PT = PaperType::all();
        return view('categories.papertype', compact('paper','PT'));
    }
}
