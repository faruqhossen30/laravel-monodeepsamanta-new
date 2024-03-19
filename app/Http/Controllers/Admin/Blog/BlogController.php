<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Category;
use App\Models\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.blog.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate(
            [
                'title'        => 'required',
                 'description' => 'required'
            ]
        );

        $thumbnailname = null;
        if ($request->file('thumbnail')) {
            $imagethumbnail = $request->file('thumbnail');
            $extension = $imagethumbnail->getClientOriginalExtension();
            $thumbnailname = Str::uuid() . '.' . $extension;
            Image::make($imagethumbnail)->save('uploads/blog/' . $thumbnailname);
        }
        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'thumbnail'   => $thumbnailname,

        ];

        Blog::create($data);

        return redirect()->route('blog.index');
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
        $blog = Blog::where('id', $id)->first();
        $categories = Category::get();
        // return $blog;
        return view('admin.blog.blog.edit', compact('categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return $request->all();

        $request->validate(
            [
                'title'        => 'required',
                 'description' => 'required',
                 'category_id' => 'required',
            ]
        );



        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];


        $thumbnailname = null;
        if ($request->file('thumbnail')) {
            $imagethumbnail = $request->file('thumbnail');
            $extension = $imagethumbnail->getClientOriginalExtension();
            $thumbnailname = Str::uuid() . '.' . $extension;
            $request->file('thumbnail')->move(public_path('uploads/blog/'), $thumbnailname);
            $data['thumbnail'] = $thumbnailname;
        }

        Blog::where('id', $id)->update($data);

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::where('id', $id)->delete();
        return redirect()->route('blog.index');
    }
}
