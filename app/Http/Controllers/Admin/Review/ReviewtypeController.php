<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\ReviewType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ReviewtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(!Auth::user()->can('review_type list')){
            abort(403);
        }

        $types = ReviewType::paginate();
        return view('admin.review.reviewtype.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(!Auth::user()->can('review_type create')){
            abort(403);
        }
        return view('admin.review.reviewtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $thumbnailname = null;
        $data = [
            'name'      => $request->name,
            'slug'      => Str::slug($request->name, '-'),
            'user_id'   => Auth::user()->id,
            'thumbnail' => $thumbnailname
        ];

        ReviewType::create($data);
        Session::flash('create');
        return redirect()->route('reviewtype.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->can('review_type show')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        if(!Auth::user()->can('review_type update')){
            abort(403);
        }
        $type = ReviewType::firstWhere('id',$id);
        return view('admin.review.reviewtype.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if(!Auth::user()->can('review_type update')){
            abort(403);
        }

        $request->validate([
            'name' => 'required'
        ]);

        $thumbnailname = null;
        $data = [
            'name'      => $request->name,
            'slug'      => Str::slug($request->name, '-'),
            'user_id'   => Auth::user()->id,
            'thumbnail' => $thumbnailname
        ];
        ReviewType::firstwhere('id', $id)->update($data);
        Session::flash('update');
        return redirect()->route('reviewtype.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!Auth::user()->can('review_type delete')){
            abort(403);
        }
        ReviewType::where('id', $id)->delete();
        return redirect()->route('reviewtype.index');
    }
}
