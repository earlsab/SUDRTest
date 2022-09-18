<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Papers;

class MyPapersController extends Controller
{
    public function index()
    {
        $data=Papers::all();
        return view('papers.mypapers',compact('data'));

    }

    public function showpage()
    {
        return view('papers.uploadpaper');

    }

    public function store(Request $request)
    {
        $data=new Papers();

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $data->file=$filename;

            $data->title=$request->title;
            $data->papertype=$request->papertype;

            $data->save();
            return redirect()->back();

    }

    public function view($id)
    {
        $data=Papers::find($id);
        return view('papers.viewPDF',compact('data'));
    }

    /* ADMIN SIDE OF MY PAPERS */
    public function indexAdmin()
    {
        $data=Papers::all();
        return view('papers.mypapersadmin',compact('data'));

    }

    public function maintainshow()
    {
        $data=Papers::all();
        return view('papers.mpm',compact('data'));

    }

    public function viewAdmin($id)
    {
        $data=Papers::find($id);
        return view('papers.viewPDFAdmin',compact('data'));
    }

    public function destroy($id)
    {
        $data=Papers::destroy($id);
        return redirect()->back();
    }
}
