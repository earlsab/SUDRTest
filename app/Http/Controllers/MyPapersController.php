<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Papers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class MyPapersController extends Controller
{
    public function index()
    {
        $papers=Papers::all();
        return view('papers.mypapers',compact('papers'));

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
            'title' => 'required',
            'papertype' => 'required',
            'file' => [
                'required',
                File::types('pdf')
                    ->max(12 * 1024),
            ],
        ]);
        
        $papers=new Papers();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $papers->file=$filename;

            $papers->title=$request->title;
            $papers->papertype=$request->papertype;

            $papers->save();
            return redirect()->back()->with('success','File has been uploaded.');

    }

    public function view($id)
    {
        $papers=Papers::find($id);
        return view('papers.viewPDF',compact('papers'));
    }

    
}
