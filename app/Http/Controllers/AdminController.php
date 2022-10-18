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

   public function view()
   {
        $papers=Papers::find($id);
        return view('admin.viewPDFAdmin',compact('papers'));
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
