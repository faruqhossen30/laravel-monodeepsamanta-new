<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ContactpageController extends Controller
{
    public function index():View
    {
        return view('contact');
    }
}
