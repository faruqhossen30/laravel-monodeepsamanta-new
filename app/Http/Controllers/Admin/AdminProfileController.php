<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
   function adminProfile(){

    $adminprofile = Auth::guard('web')->user();

    return view('admin.profile.profile',compact('adminprofile'));
   }

   public function editAdminProfile(){

    $admin = Auth::user();

    return view('admin.profile.edit-profile' ,compact('admin'));
   }
}
