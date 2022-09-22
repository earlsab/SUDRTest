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

    /* ADMIN SIDE OF MY PAPERS */
    public function indexAdmin()
    {
        $papers=Papers::all();
        return view('papers.mypapersadmin',compact('papers'));

    }

    public function maintainshow()
    {
        $papers=Papers::all();
        return view('papers.mpm',compact('papers'));

    }

    public function show(Papers $papers, $id)
    {
        $papers=Papers::find($id);
        return view('papers.viewPDFAdmin',compact('papers'));
    }

    public function destroy(Papers $papers, $id)
    {
        $papers=Papers::find($id);
        $papers->delete();
        return redirect()->back();
    }

    public function edit(Papers $papers, $id)
    {
        $papers=Papers::find($id);
        return view('papers.updatepaper',compact('papers'));
    }

    public function update(Request $request,Papers $papers, $id )
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


        $papers=Papers::find($id);
        
        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $papers->file=$filename;

            $papers->title=$request->title;
            $papers->papertype=$request->papertype;

            $papers->update();
            return redirect()->back();
    }

    
}
