<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\WebsiteSetting;
use Illuminate\Http\Request;

class AboutmeSettingController extends Controller
{
    public function aboutMeSetting() {

        $site = WebsiteSetting::first();

        // return $site;
        return view('admin.setting.aboutme',compact('site'));

    }


    public function aboutMesettingStore(Request $request){

        // return $request->all();

        WebsiteSetting::updateOrInsert([
            'id'=>1
        ],[

            'aboutme' => $request->aboutme,
        ]);

        return redirect()->back();

    }
}
