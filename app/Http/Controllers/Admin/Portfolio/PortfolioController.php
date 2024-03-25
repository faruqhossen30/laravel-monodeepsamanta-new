<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Admin\Portfolio\Portfolio;
use App\Models\Admin\Portfolio\PortfolioImage;
use App\Models\Admin\Product\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'title'       => $request->title,
            'slug'        => Str::slug($request->title, '-'),
            'user_id'     => Auth::user()->id,
            'category_id' => $request->category_id,
            'thumbnail'   => $request->thumbnail,
            'status'      => $request->status,
        ];

        $porfolio = Portfolio::create($data);
        Session::flash('create');
        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        $portfolio  = Portfolio::with('images')->firstWhere('id', $id);
        return view('admin.portfolio.edit', compact('categories', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required'
        ]);


        $thumbnailname = null;
        $data = [
            'title'       => $request->title,
            'slug'        => Str::slug($request->title, '-'),
            'category_id' => $request->category_id,
            'status'      => $request->status,
            'thumbnail'   => $request->thumbnail,
        ];

        Portfolio::firstWhere('id', $id)->update($data);


        Session::flash('create');
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Portfolio::firstWhere('id', $id)->delete();

        return redirect()->route('portfolio.index');
    }
}
