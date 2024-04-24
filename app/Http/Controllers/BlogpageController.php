<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogpageController extends Controller
{
    public function index()
    {

        $search = null;
        $post = null;
        if (isset($_GET['search'])) {
            $search = trim($_GET['search']);
            $post = Blog::where('slug', 'like', '%' . $search . '%')->get();
        }


        // return  $post;


        $posts = Blog::when($search, function ($query, $search) {
                return $query->where('slug', 'like', '%' . $search . '%');
            })->latest()->paginate(10);



        return view('blogpage', compact('posts'));
    }
    public function singleBlog($slug)
    {
        $post = Blog::firstWhere('slug', $slug);
        return view('single.post', compact('post'));
    }
}
