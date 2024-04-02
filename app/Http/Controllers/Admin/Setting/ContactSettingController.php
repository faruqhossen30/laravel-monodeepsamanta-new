<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactSettingController extends Controller
{
    public function contactsetting(){

        if(!Auth::user()->can('socialmedia setting')){
            abort(403);
        }
        $site = WebsiteSetting::first();
        return view('admin.setting.contact-setting', compact('site'));
    }


    public function contactsettingstore( Request $request){
// return "welcmoem";

        WebsiteSetting::updateOrInsert([
            'id'=>1
        ],[

            'address'             => $request->address,
            'email'               => $request->email,
            'mobile_no'           => $request->mobile_no,
            'telephone_no'        => $request->telephone_no,


        ]);

        return redirect()->back();
    }
}
