<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->can('gallery list')){
            abort(403);
        }
        $thumbnails = Gallery::latest()->paginate(8);
        //    return $thumbnail;
        return view('admin.gallery.index', compact('thumbnails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->can('gallery create')){
            abort(403);
        }
        $categories = GalleryCategory::get();
        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $imagethumbnail = $request->file('file');
        $extension = $imagethumbnail->getClientOriginalExtension();
        $thumbnailname = Str::uuid() . '.' . $extension;

        // Image::make($imagethumbnail)->save('uploads/galleries/' . $thumbnailname);

        $request->file('file')->move(public_path('uploads/galleries/'), $thumbnailname);
        $data = ['name'   => $thumbnailname, 'author_id' => Auth::user()->id, 'category_id' => $request->category_id];

        Gallery::create($data);
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Auth::user()->can('gallery show')){
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('gallery edit')){
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::user()->can('pgallery update')){
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if(!Auth::user()->can('gallery delete')){
            abort(403);
        }
        $gallery = Gallery::firstWhere('id', $id);

            $path = 'uploads/galleries/' . $gallery->name;
            if (file_exists($path)) {
                unlink($path);
            }
            $gallery->delete();
        return redirect()->back();
    }
}
