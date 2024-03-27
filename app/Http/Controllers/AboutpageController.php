<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutpageController extends Controller
{
    public function index():View
    {
        return view('aboutpage');
    }
}
