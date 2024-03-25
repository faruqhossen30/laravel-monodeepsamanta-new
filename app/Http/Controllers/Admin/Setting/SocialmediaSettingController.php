<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\WebsiteSetting;
use Illuminate\Http\Request;

class SocialmediaSettingController extends Controller
{
    public function socialmedia()
    {
        $site = WebsiteSetting::first();
        // return  $site;
        return view('admin.setting.socialmida-setting', compact('site'));
    }



    public function socialmediastore(Request $request){


        WebsiteSetting::updateOrInsert([
            'id'=>1
        ],[

            'facebook_page_link'  => $request->facebook_page_link,
            'facebook_group_link' => $request->facebook_group_link,
            'facebook_link'       => $request->facebook_link,
            'twitter_link'        => $request->twitter_link,
            'instagram_link'      => $request->instagram_link,
            'linkedin_link'       => $request->linkedin_link,
            'youtube_link'        => $request->youtube_link,
            'intro_video_link'    => $request->intro_video_link,

        ]);

        return redirect()->back();

    }

}




