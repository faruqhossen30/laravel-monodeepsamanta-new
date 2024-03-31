<?php

namespace App\Http\Controllers;

use App\Models\Service\Service;
use App\Models\Service\ServiceFaq;
use App\Models\Service\ServicePackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServicepageController extends Controller
{
    public function index()
    {
        $services = Service::with('package','video')->where('status',true)->paginate(12);
        // return $services;
        return view('servicepage', compact('services'));
    }
    public function singleService($slug)
    {
        $service = Service::with('features','faqs','package','sliders','video')->firstWhere('slug', $slug);
        return view('single.service', compact('service'));
    }
}
