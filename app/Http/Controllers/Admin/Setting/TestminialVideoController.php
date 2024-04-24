<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestminialVideoController extends Controller
{
    public function testmonialVideo()
    {
        $testmonialvideo = option('testmonial_video');

        // return $testmonialvideo;
        return view('admin.setting.testmonial-video' ,compact('testmonialvideo'));
    }

    public function testmonialVideoStore(Request $request)
    {
        option(['testmonial_video' => $request->testmonial_video]);
        return redirect()->back();
    }
}
