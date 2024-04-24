<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $silders = Slider::latest()->paginate(10);
        return view('admin.slider.index', compact('silders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $photos = Slider::get();
        return view('admin.slider.create', compact('photos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        foreach ($request->thumbnails as $key => $photo) {

            if ($request->thumbnails && array_key_exists($key, $request->thumbnails)) {
                $file_name = null;
                if ($request->file('thumbnails')[$key]) {
                    $file_name = $request->file('thumbnails')[$key]->store('slider');
                }
                slider::create([
                    'photo'    => $file_name,
                    'author_id'    => Auth::user()->id,
                ]);
            }
        }


        // Slider::create($data);
        Session::flash('create');
        return redirect()->route('slider.index');
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
        $slider = Slider::firstWhere('id', $id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required'
        ]);

        $data = [
            'title'     => $request->title,
            'author_id' => Auth::user()->id,
        ];
        if ($request->file('photo')) {
            $file_name = $request->file('photo')->store('thumbnail/slider/');
            $data['photo'] = $file_name;
        }
        Slider::firstwhere('id', $id)->update($data);
        Session::flash('update');
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        Storage::delete($slider->photo);
        $slider->delete();
        return redirect()->route('slider.index')->with('success', 'data successfully Deleted');
    }
}
