<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioContent;
use App\Models\Portfolio\PortfolioSection;
use Illuminate\Http\Request;

class PortfolioContentController extends Controller
{
    public function create($id)
    {
        $portfolio = Portfolio::with('contents')->firstWhere('id', $id);

        // return $portfolio;

        return view('admin.portfolio.addcontentnew', compact('portfolio'));
    }

    public function store(Request $request, $id)
    {
        // return $request->all();

        foreach($request->section as $key=> $section){
            PortfolioSection::create([
                'portfolio_id'=> $id,
                'thumbnail'=> null,
                'content'=> $section
            ]);
        }

        // $headings = $request->heading;
        // $descriptions = $request->description;
        // $thumbnails = $request->file('thumbnail');
        // $iframe = $request->iframe;

        // $old = PortfolioContent::where('portfolio_id', $id)->delete();
        // if (!empty($request->heading)) {
        //     foreach ($headings as $key => $heading) {
        //         // $is_iframe = str_contains($thumbnails[$key], 'https://iframe.mediadelivery.net');

        //         $photo_file_name = null;
        //         if (array_key_exists($key, $thumbnails)) {
        //             $file_name = $request->file('thumbnail')[$key]->store('portfolio/slider');
        //             $photo_file_name = $file_name;
        //             PortfolioContent::create([
        //                 'portfolio_id' => $id,
        //                 'content_type' => 'photo',
        //                 'heading'      => $heading,
        //                 'description'  => $descriptions[$key],
        //                 'photo'        => $photo_file_name,
        //             ]);
        //         } else {
        //             PortfolioContent::create([
        //                 'portfolio_id' => $id,
        //                 'content_type' => 'video',
        //                 'heading'      => $heading,
        //                 'description'  => $descriptions[$key],
        //                 'video'        => $iframe[$key],
        //             ]);
        //         }





        //         // if ($is_iframe) {
        //         //     PortfolioContent::create([
        //         //         'portfolio_id' => $id,
        //         //         'content_type' => 'video',
        //         //         'heading'      => $heading,
        //         //         'description'  => $descriptions[$key],
        //         //         'video'        => $thumbnails[$key],
        //         //     ]);
        //         // } else {

        //         //     PortfolioContent::create([
        //         //         'portfolio_id' => $id,
        //         //         'content_type' => 'photo',
        //         //         'heading'      => $heading,
        //         //         'description'  => $descriptions[$key],
        //         //         'photo'        => $thumbnails[$key],
        //         //     ]);
        //         // }
        //     }
        // }

        return redirect()->route('portfolio.index');
    }
}
