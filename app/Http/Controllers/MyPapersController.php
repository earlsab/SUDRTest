<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Papers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class MyPapersController extends Controller
{
    public function index(Request $request)
    {
       $paper = Papers::where([
        ['PaperTitle', '!=', Null],
        [function($query) use ($request) {
            if (($term = $request->term)) {
                $query->orWhere('PaperTitle', 'LIKE','%'. $term . '%')
                    ->orWhere('PaperType', 'LIKE','%'. $term . '%')->get();
            }
        }]
       ])
            ->orderBy("PaperID", "desc")
            ->paginate(5);
        
        return view('papers.mypapers', compact('paper'))
            ->with('i', (request()->input('page', 1) -1) *5);

    }

    public function showpage()
    {
        return view('papers.uploadpaper');
    }

    public function create()
    {
        return view('papers.uploadpaper');
    }

    public function store(Request $request)
    {
        $request->validate([
            'PaperTitle' => 'required',
            'PaperType' => 'required',
            'Authors' => 'required',
            'file' => [
                'required',
                File::types('pdf')
                    ->max(12 * 1024),
            ],
        ]);
        
        $paper=new Papers();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $paper->file=$filename;

            $paper->PaperTitle=$request->PaperTitle;
            $paper->PaperType=$request->PaperType;
            $paper->Authors=$request->Authors;

            $paper->save();
            return redirect()->back()->with('success','File has been uploaded.');

    }


    
}
