<?php

namespace App\Http\Controllers;

use App\Models\Review\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inc.servicepage.reviewsection');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'name'                 => 'required',
                'email'                => 'required',
                'review_communication' => 'required',
                'review_recommend'     => 'required',
                'review_described'     => 'required',
                'review'               => 'required|min: 20|max: 500',
                'website'              => 'required',
            ],
            [
                'review.required'   => 'The review field is required',
                'review.min'        => 'Please write at list 20 char',
                'review.max'        => 'Please write at list 500 char',
            ]
        );
        $data = [
            'name'                 => $request->name,
            'email'                => $request->email,
            'rating'               => ($request->review_communication * $request->review_recommend * $request->review_described) / 3,
            'review_communication' => $request->review_communication,
            'review_recommend'     => $request->review_recommend,
            'review_described'     => $request->review_described,
            'review'               => $request->review,
            'service_id'           => $request->service_id,
            'website'              => $request->website,
            'date'                 => Carbon::now(),
        ];

        Review::create($data);
        Session::flash('reviewsubmit');
        return redirect()->back();
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
