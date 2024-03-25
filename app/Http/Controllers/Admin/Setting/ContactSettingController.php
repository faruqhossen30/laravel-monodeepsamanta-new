<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\WebsiteSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function contactsetting(){

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
            'facebook_page_link'  => $request->facebook_page_link,
            'facebook_group_link' => $request->facebook_group_link,

        ]);

        return redirect()->back();
    }
}
