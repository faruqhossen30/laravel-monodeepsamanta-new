<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminProfileController extends Controller
{
   function adminProfile(){

    $adminprofile = Auth::user();
    // return $roles;
    return view('admin.profile.profile',compact('adminprofile'));
   }

   public function UpdateAdminProfile(Request $request){


    // return "abc";
    // return $request->all();
    $adminid = Auth::user()->id;

    User::findOrFail($adminid)->update([
        'name'   => $request->name,
      'password' => $request->password,
      'thumbnail' => $request->thumbnail,


    ]);
    return redirect()->back()->with('success', 'successfully data added');


   }
}
