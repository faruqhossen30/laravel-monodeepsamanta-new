<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogSoftware;
use App\Models\Blog\Software;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(!Auth::user()->can('blog list')){
            abort(403);
        }
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blog.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::user()->can('blog create')){
            abort(403);
        }
        $categories = Category::get();
        $softwares  = Software::get();
        return view('admin.blog.blog.create', compact('categories','softwares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // return $request->all();
        $request->validate(
            [
                'title'               => 'required',
                'short_description'   => 'required',
                'project_description' => 'required',
                'description'         => 'required',
                'description'         => 'required',
                'status'              => 'required',
            ]
        );
        $data = [
            'title'               => $request->title,
            'slug'                => Str::slug($request->title, '-'),
            'short_description'   => $request->short_description,
            'project_description' => $request->project_description,
            'description'         => $request->description,
            // 'thumbnail'        => $request->thumbnail,
            'user_id'             => Auth::user()->id,
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'meta_keyword'        => $request->meta_keyword,
            'color'               => $request->color,
            'status'              => $request->status
        ];

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('thumbnail/blog/');
            $data['thumbnail'] = $file_name;
        }

        $blog = Blog::create($data);



        if(!empty($request->category_ids)){
             foreach($request->category_ids as $id){
                BlogCategory::create([
                    'blog_id'=>$blog->id,
                    'category_id'=>$id
                ]);
             }
        }

        if(!empty($request->software_ids)){
             foreach($request->software_ids as $id){
                BlogSoftware::create([
                    'blog_id'=>$blog->id,
                    'software_id'=>$id
                ]);
             }
        }

        Session::flash('create');
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        // return $slug;
        return redirect()->route('singleblog',$slug);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::user()->can('blog update')){
            abort(403);
        }
        $blog = Blog::with('categories','softwares')->firstWhere('id', $id);
        $categories = Category::get();
        $softwares = Software::get();
        $cat_ids = $blog->categories->pluck('id')->toArray();
        $soft_ids = $blog->softwares->pluck('id')->toArray();

        return view('admin.blog.blog.edit', compact('categories','blog','cat_ids','soft_ids','softwares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::user()->can('blog delete')){
            abort(403);
        }
        $request->validate(
            [
                'title'               => 'required',
                'short_description'   => 'required',
                'project_description' => 'required',
                'description'         => 'required',
            ]
        );

        $data = [
           'title'                => $request->title,
            'slug'                => Str::slug($request->title, '-'),
            'short_description'   => $request->short_description,
            'project_description' => $request->project_description,
            'description'         => $request->description,
            // 'thumbnail'           => $request->thumbnail,
            'user_id'             => Auth::user()->id,
            'meta_title'          => $request->meta_title,
            'meta_description'    => $request->meta_description,
            'meta_keyword'        => $request->meta_keyword,
            'color'               => $request->color,
            'status'              => $request->status
        ];

        if($request->file('thumbnail')){
            $file_name = $request->file('thumbnail')->store('thumbnail/blog/');
            $data['thumbnail'] = $file_name;
        }

        $blog = Blog::firstWhere('id',$id)->update($data);

        if(!empty($request->category_ids)){
            BlogCategory::where('blog_id', $id)->delete();
             foreach($request->category_ids as $cat){
                BlogCategory::create([
                    'blog_id'     => $id,
                    'category_id' => $cat
                ]);
             }
        }

        if(!empty($request->software_ids)){
            BlogSoftware::where('blog_id', $id)->delete();
             foreach($request->software_ids as $soft){
                BlogSoftware::create([
                    'blog_id'     => $id,
                    'software_id' => $soft
                ]);
             }
        }

        Session::flash('create');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::user()->can('blog delete')){
            abort(403);
        }
        $blog = Blog::findOrFail($id);
        Storage::delete($blog->thumbnail ?? '');
        $blog->delete();
        return redirect()->route('blog.index')->with('success','data successfully Deleted');
    }
}
