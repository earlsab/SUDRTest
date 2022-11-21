<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use App\Models\College;
use App\Models\PaperType;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function papertype(Request $request)
    {
        $PT = PaperType::all();

        $paper = Papers::where([
            ['PaperType', '!=', Null],
            [function($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('PaperType', 'LIKE','%'. $term . '%')->get();
                }
            }]
           ])
                ->orderBy("PaperID", "desc")
                ->paginate(5);
                
        return view('categories.papertype', compact('PT','paper'))
             ->with('i', (request()->input('page', 1) -1) *5);
    }

    public function college(Request $request)
    {
        $College = College::all();

        $paper = Papers::where([
            ['college', '!=', Null],
            [function($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('college', 'LIKE','%'. $term . '%')->get();
                }
            }]
           ])
                ->orderBy("PaperID", "desc")
                ->paginate(5);
                
        return view('categories.college', compact('College','paper'))
             ->with('i', (request()->input('page', 1) -1) *5);
    }
}
