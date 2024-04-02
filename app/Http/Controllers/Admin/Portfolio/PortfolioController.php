<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioImage;
use App\Models\Portfolio\PortfolioVideo;
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

        if(!Auth::user()->can('portfolio list')){
            abort(403);
        }
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(!Auth::user()->can('portfolio create')){
            abort(403);
        }
        $categories = Category::get();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'title'            => $request->title,
            'slug'             => Str::slug($request->title, '-'),
            'user_id'          => Auth::user()->id,
            'category_id'      => $request->category_id,
            'thumbnail'        => $request->thumbnail,
            'slider'           => json_encode($request->slider),
            'meta_tag'         => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keyword'          => $request->keyword,
            'status'           => $request->status,
        ];

        $porfolio = Portfolio::create($data);

        if ($porfolio && $request->video_id && $request->pull_zone && $request->resolution) {
            PortfolioVideo::create([
                'portfolio_id' => $porfolio->id,
                'video_id'      => $request->video_id,
                'pull_zone'     => $request->pull_zone,
                'resolution'    => $request->resolution
            ]);
        }

        if (!empty($request->slider)) {
            foreach ($request->slider as $index => $img) {
                PortfolioImage::create([
                    'portfolio_id' => $porfolio->id,
                    'image'        => $img,
                    'caption'      => null,
                ]);
            }
        }


        Session::flash('create');
        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->can('portfolio show')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        if(!Auth::user()->can('portfolio update')){
            abort(403);
        }
        $categories = Category::get();
        $portfolio  = Portfolio::with('video')->firstWhere('id', $id);

        // return $portfolio;
        return view('admin.portfolio.edit', compact('categories', 'portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if(!Auth::user()->can('portfolio update')){
            abort(403);
        }
        $request->validate([
            'title' => 'required'
        ]);


        $data = [
            'title'            => $request->title,
            'slug'             => Str::slug($request->title, '-'),
            'category_id'      => $request->category_id,
            'thumbnail'        => $request->thumbnail,
            'slider'           => json_encode($request->slider),
            'meta_tag'         => $request->meta_tag,
            'meta_description' => $request->meta_description,
            'keyword'          => $request->keyword,
            'status'           => $request->status,
        ];

        Portfolio::firstWhere('id', $id)->update($data);

        if ($request->video_id && $request->pull_zone && $request->resolution) {
            PortfolioVideo::updateOrInsert([
                'portfolio_id' => $id
            ], [
                'portfolio_id' => $id,
                'video_id'      => $request->video_id,
                'pull_zone'     => $request->pull_zone,
                'resolution'    => $request->resolution
            ]);
        }


        Session::flash('create');
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


        if(!Auth::user()->can('portfolio delete')){
            abort(403);
        }
        Portfolio::firstWhere('id', $id)->delete();

        return redirect()->route('portfolio.index');
    }
}
