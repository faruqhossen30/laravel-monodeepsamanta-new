<?php

namespace App\Http\Controllers\Admin\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\Review;
use App\Models\Review\ReviewType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->can('review list')){
            abort(403);
        }
        $reviews = Review::latest()->paginate(10);
        // return $reviews;
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(!Auth::user()->can('review create')){
            abort(403);
        }
        $types      = ReviewType::get();
        $categories = Category::get();
        return view('admin.review.create',compact('types','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'rating'         => 'required',
            'date'           => 'required',
            'review_type_id' => 'required',
            'review'         => 'required'
        ]);

        $data = [
            'name'           => $request->name,
             'slug'          => Str::slug($request->name, '-'),
            'rating'         => $request->rating,
            'date'           => $request->date,
            'review'         => $request->review,
            'review_type_id' => $request->review_type_id,
            'category_id'    => $request->category_id,
            'review_url'     => $request->review_url,
            'user_id'        => Auth::user()->id,
            'status'         => $request->status
        ];

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('thumbnail/review/');
            $data['thumbnail'] = $file_name;
        }


        Review::create($data);

        Session::flash('create');
        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->can('review show')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('review update')){
            abort(403);
        }
        $types      = ReviewType::get();
        $review     = Review::firstWhere('id', $id);
        $categories = Category::get();
        return view('admin.review.edit', compact('review','types','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // return $request->all();
        if(!Auth::user()->can('review update')){
            abort(403);
        }
        $request->validate([
            'name'           => 'required',
            'rating'         => 'required',
            'date'           => 'required',
            'review_type_id' => 'required',
            'review'         => 'required'
        ]);

        $data = [
            'name'           => $request->name,
             'slug'          => Str::slug($request->name, '-'),
            'rating'         => $request->rating,
            'date'           => $request->date,
            'review'         => $request->review,
            'review_type_id' => $request->review_type_id,
            'category_id'    => $request->category_id,
            'review_url'     => $request->review_url,
            'status'         => $request->status
        ];

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('thumbnail/review/');
            $data['thumbnail'] = $file_name;
        }


        Review::firstWhere('id', $id)->update($data);

        Session::flash('update');
        return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!Auth::user()->can('review delete')){
            abort(403);
        }
        $review = Review::findOrFail($id);
        Storage::delete($review->thumbnail);
        $review->delete();
        // return "welcome";
        return redirect()->route('review.index');
    }
}
