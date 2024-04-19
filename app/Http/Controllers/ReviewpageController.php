<?php

namespace App\Http\Controllers;

use App\Http\Helpers\HelperSting;
use App\Models\Review\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewpageController extends Controller
{
    public function index()
    {
        $reviews = Review::with('type','category')->where('status',true)->latest()->paginate(10);
        // return $reviews;
        return view('reviewpage', compact('reviews'));
    }
}
