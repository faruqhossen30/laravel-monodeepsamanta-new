<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioVideoController extends Controller
{
    public function portfolioVideo() {

        $testmonialvideo = option('portfolio_video');

        // return 1;
        return view('admin.setting.portfolio-video',compact('testmonialvideo'));

    }
    public function portfolioVideoStore(Request $request){


        option(['portfolio_video' => $request->portfolio_video]);
        return redirect()->back();
    }
}
