<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

use function Termwind\render;

class GalleryAjaxController extends Controller
{
    public function getGallery(Request $request)
    {
        $gallery_category_id = null;
        if ($request->gallery_category_id && $request->gallery_category_id != null) {
            $gallery_category_id = $request->gallery_category_id;
        }

        $thumbnails  = Gallery::when($gallery_category_id, function ($query, $gallery_category_id) {
            return $query->where('category_id', $gallery_category_id);
        })
            ->latest()
            ->paginate(8);

        // $categories = GalleryCategory::get();
        // return $request->gallery_category_id;
        return view('admin.ajax.gallerymodalbody', compact('thumbnails'))->render();
    }


    public function getPaginateGallery(Request $request)
    {
        $gallery_category_id = null;
        if ($request->gallery_category_id && $request->gallery_category_id != null) {
            $gallery_category_id = $request->gallery_category_id;
        }

        $thumbnails  = Gallery::when($gallery_category_id, function ($query, $gallery_category_id) {
            return $query->where('category_id', $gallery_category_id);
        })
            ->latest()
            ->paginate(8);

        // return $request->gallery_category_id;
        return view('admin.ajax.gallerymodalbody', compact('thumbnails'))->render();
    }

    // For Multiple photos Gallery
    public function getMultiPhotoGallery(Request $request)
    {
        $gallery_category_id = null;
        if ($request->gallery_cat_id && $request->gallery_cat_id != null) {
            $gallery_category_id = $request->gallery_cat_id;
        }

        $thumbnails  = Gallery::when($gallery_category_id, function ($query, $gallery_category_id) {
            return $query->where('category_id', $gallery_category_id);
        })
            ->latest()
            ->paginate(8);

        return view('admin.ajax.gallerymultiphtomodalbody', compact('thumbnails'))->render();
    }

    public function getPaginateMultiPhotoGallery(Request $request)
    {
        $gallery_category_id = null;
        if ($request->gallery_cat_id && $request->gallery_cat_id != null) {
            $gallery_category_id = $request->gallery_cat_id;
        }

        $thumbnails  = Gallery::when($gallery_category_id, function ($query, $gallery_category_id) {
            return $query->where('category_id', $gallery_category_id);
        })
            ->latest()
            ->paginate(8);

        return view('admin.ajax.gallerymultiphtomodalbody', compact('thumbnails'))->render();
    }
}
