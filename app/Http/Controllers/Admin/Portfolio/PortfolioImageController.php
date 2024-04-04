<?php

namespace App\Http\Controllers\Admin\Portfolio;

use App\Http\Controllers\Controller;
use App\Models\Portfolio\Portfolio;
use Illuminate\Http\Request;

class PortfolioImageController extends Controller
{
    public function create($id)
    {
        $portfolio = Portfolio::firstWhere('id', $id);

        return view('admin.portfolio.addcontent',compact('portfolio'));
    }

    public function store(Request $request)
    {
        $headings = $request->heading;
        $descriptions = $request->description;
        $thumbnails = $request->thumbnail;

        return redirect()->route('portfolio.index');

    }
}
