<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Papers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.adminpage');
    }
    

   public function showAll()
   {
        $papers=Papers::all();
        return view('admin.mypapersadmin',compact('papers'));
   }

   public function maintenance()
   {
        $papers=Papers::all();
        return view('admin.mpm',compact('papers'));
   }

   public function view($PaperID)
   {
        $papers=Papers::find($PaperID);
        return view('admin.viewPDFAdmin',compact('papers'));
   }

   public function destroy(Papers $papers, $PaperID)
   {
       $papers=Papers::find($PaperID);
       $papers->delete();
       return redirect()->back();
   }

   public function edit(Papers $papers, $PaperID)
   {
       $papers=Papers::find($PaperID);
       return view('admin.updatepaper',compact('papers'));
   }

   public function update(Request $request,Papers $papers, $PaperID )
   {
        $request->validate([
            'PaperTitle' => 'required',
            'PaperType' => 'required',
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

            $papers->PaperTitle=$request->PaperTitle;
            $papers->PaperType=$request->PaperType;


            $papers->update();
            return redirect()->back();
   }
    
   
}
