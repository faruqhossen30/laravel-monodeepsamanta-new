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

        $portfolios = Portfolio::with('category')
            // ->when($cat, function ($query, $cat) {
            //     return $query->whrere('category_id', $cat->id);
            // })
            ->where('status', true)
            ->latest()
            ->paginate(12);


        $categories = Category::get();
        return $portfolios;

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
