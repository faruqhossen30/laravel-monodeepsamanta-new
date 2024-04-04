<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Portfolio;
use App\Models\Portfolio\PortfolioContent;
use Illuminate\Http\Request;

class PortfolioContentController extends Controller
{
    public function create($id)
    {
        $portfolio = Portfolio::with('contents')->firstWhere('id', $id);

        // return $portfolio;

        return view('admin.portfolio.addcontent', compact('portfolio'));
    }

    public function store(Request $request, $id)
    {
        // return $request->all();

        $headings = $request->heading;
        $descriptions = $request->description;
        $thumbnails = $request->thumbnail;

        $old = PortfolioContent::where('portfolio_id', $id)->delete();
        if (!empty($request->heading)) {
            foreach ($headings as $key => $heading) {
                $is_iframe = str_contains($thumbnails[$key], 'https://iframe.mediadelivery.net');

                if ($is_iframe) {
                    PortfolioContent::create([
                        'portfolio_id' => $id,
                        'content_type' => 'video',
                        'heading'      => $heading,
                        'description'  => $descriptions[$key],
                        'video'        => $thumbnails[$key],
                    ]);
                } else {
                    PortfolioContent::create([
                        'portfolio_id' => $id,
                        'content_type' => 'photo',
                        'heading'      => $heading,
                        'description'  => $descriptions[$key],
                        'photo'        => $thumbnails[$key],
                    ]);
                }
            }
        }

        return redirect()->route('portfolio.index');
    }
}
