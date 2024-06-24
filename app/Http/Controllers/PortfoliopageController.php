<?php

namespace App\Http\Controllers;

use App\Models\Portfolio\Portfolio;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfoliopageController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        // $cat = Category::with('portfolios')->get();
        // return $cat;
        $category = null;
        $cat = null;
        if (isset($_GET['category'])) {
            $category = trim($_GET['category']);
            $cat = Category::firstWhere('slug', $category);
        }

        // return $cat;
        // $portfolios = Portfolio::whereHas('categories', function ($query) {
        //     $query->where('slug', 'landing-page');
        // })
        //     // ->when($cat, function ($query, $cat) {
        //     //     return $query->where('category_id', $cat->id);
        //     // })
        //     ->where('status', true)
        //     ->latest()
        //     ->paginate(12);

        $portfolios = Portfolio::when($cat, function ($query, $cat) {
            return $query->where('category_id', $cat->id);
        })
            ->where('status', true)
            ->latest()
            ->paginate(12);



        // return $portfolios;

        $categories = Category::get();

        return view('portfoliopage', compact('portfolios', 'categories'));
    }
    /**
     * Display the user's profile form.
     */
    public function singlePortfolio(Request $request, $slug)
    {

        $portfolio = Portfolio::with('sections')->firstWhere('slug', $slug);

        // return $portfolio;
        return view('single.portfolionew', compact('portfolio'));
    }
}
