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
    public function index(Request $request)
    {
        $user = User::all();

        $user = User::where([
            ['UserID', '!=', Null],
            [function($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('UserName', 'LIKE','%'. $term . '%')
                        ->orWhere('FirstName', 'LIKE','%'. $term . '%')
                        ->orWhere('LastName', 'LIKE','%'. $term . '%')
                        ->orWhere('OrganizationName', 'LIKE','%'. $term . '%')
                        ->orWhere('email', 'LIKE','%'. $term . '%')->get();
                }
            }]
           ])
                ->orderBy("UserID", "desc")
                ->paginate(5);
    
            return view('admin.superadminpanel', compact('user'))
                ->with('i', (request()->input('page', 1) -1) *5);

    }

    public function roles($UserID)
    {
        $user = User::find($UserID);
        return view('admin.updaterole',compact('user'));
    }

    public function update(Request $request, $UserID)
    {
        $user = User::find($UserID);
        
        $user->isAdmin = $request->isAdmin;
        
        $user->update();

        return redirect()->route('SuperAdminPage');
    }

    public function store(Request $request)
    {
        $PT = new PaperType();
        $College = new College();

        $PT->PaperTypeName=$request->PaperTypeName;
        $College->CollegeName=$request->CollegeName;
        $College->CollegeAbbr=$request->CollegeAbbr;

        $PT->save();
        $College->save();

        return redirect()->back();
    }
}
