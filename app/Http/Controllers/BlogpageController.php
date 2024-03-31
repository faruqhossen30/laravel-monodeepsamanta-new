<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogpageController extends Controller
{
    public function index(): View
    {
        $posts = Blog::latest()->paginate(10);
        return view('blogpage', compact('posts'));
    }
    public function singleBlog($slug)
    {
        $post = Blog::firstWhere('slug', $slug);
        return view('single.post', compact('post'));
    }
}
