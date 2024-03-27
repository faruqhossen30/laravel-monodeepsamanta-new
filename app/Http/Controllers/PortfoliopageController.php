<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfoliopageController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $category = null;
        $cat = null;
        if (isset($_GET['category'])) {
            $category = trim($_GET['category']);
            $cat = Category::firstWhere('slug', $category);
        }

        $portfolios = Portfolio::with('category')
            ->when($cat, function ($query, $cat) {
                return $query->where('category_id', $cat->id);
            })
            ->where('status', true)
            ->latest()
            ->paginate(12);


        $categories = Category::get();
        // return $portfolios;

        return view('portfoliopagenew', compact('portfolios', 'categories'));
    }
    /**
     * Display the user's profile form.
     */
    public function singlePortfolio(Request $request, $slug)
    {

        $portfolio = Portfolio::with('images')->firstWhere('slug', $slug);

        // $previous = Portfolio::firstWhere('id', $portfolio->id-1);
        // $next = Portfolio::firstWhere('id', $portfolio->id+1);

        $previous = null;
        $next = null;

        // return $portfolio;


        return view('single.portfolio', compact('portfolio'));
    }
}
