<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Papers;
use App\Models\College;
use App\Models\PaperType;
use App\Models\Bookmarks;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()
    {
        $College = College::all();
        $PT = PaperType::all();
        $paper = Papers::all();
        $bm = Bookmarks::all();

        $result_weekly = (new StatsController)->stats_weekly();
        $result_monthly = (new StatsController)->stats_monthly();
        $result_yearly = (new StatsController)->stats_yearly();

        return view('admin.adminpage',compact('College','PT','paper','bm', 'result_weekly', 'result_monthly', 'result_yearly'));
    }
    

   public function showAll()
   {
        $paper=Papers::all();
        return view('admin.mypapersadmin',compact('paper'));
   }

   public function maintenance()
   {
        $paper=Papers::all();
        return view('admin.mpm',compact('paper'));
   }

   public function view($PaperID)
   {
        $PT = PaperType::all();
        $paper=Papers::find($PaperID);
        return view('admin.viewPDFAdmin',compact('paper', 'PT'));
   }

   public function destroy(Papers $paper)
   {
      
       $paper->delete();
       return redirect()->route('AdminPage');
   }

   public function edit(Papers $paper, $PaperID)
   {
       $paper=Papers::find($PaperID);
       return view('admin.updatepaper',compact('paper'));
   }

   public function update(Request $request, $PaperID)
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

        $paper=Papers::find($PaperID);

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();
                $request->file->move('assets', $filename);
                $paper->file=$filename;

            $paper->DatePublished=$request->DatePublished;
            $paper->PaperTitle=$request->PaperTitle;
            $paper->PaperType=$request->PaperType;
            $paper->Authors=$request->Authors;


            $paper->update();
            return redirect()->route('AdminPage');
   }
    
   
}
