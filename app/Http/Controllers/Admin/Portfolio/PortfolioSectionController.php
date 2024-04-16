<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioSection;
use Illuminate\Http\Request;

class PortfolioSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create($id)
    {
        $portfolio = Portfolio::with('sections')->firstWhere('id', $id);

        // return $portfolio;

        return view('admin.portfolio.addsection', compact('portfolio'));
    }

    public function store(Request $request, $id)
    {
        // return $request->all();
        $thumbnails = $request->file('thumbnails');
        $iframes = $request->iframes;

        foreach ($request->sections as $key => $section) {

            $thumbnail_file_name = null;
            if (array_key_exists($key, $thumbnails)) {
                $thumbnail_file_name =  $request->file('thumbnails')[$key]->store('portfolio/section');
            }

            // $thumbnail_file_name = null;
            // if (array_key_exists($key, $iframes)) {
            //     $thumbnail_file_name =  $request->file('thumbnails')[$key]->store('portfolio/thumbnail');
            // }

            PortfolioSection::create([
                'portfolio_id' => $id,
                'thumbnail' => $thumbnail_file_name,
                'iframe' => $iframes[$key],
                'content' => $section,
            ]);
        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
