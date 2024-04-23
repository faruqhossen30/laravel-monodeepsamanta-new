<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Setting\WebsiteSetting;
use App\Models\Skill\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutpageController extends Controller
{
    public function index()
    {
        $site = WebsiteSetting::first();
        $skills = Skill::first();
        // return $skills ;
        return view('aboutpage',compact('site','skills'));
    }
}
