<?php

namespace App\Http\Controllers;

use App\Models\Post\Post;
use Illuminate\Http\Request;

class PostpageController extends Controller
{
    public function index(){
        $posts = Post::latest()->paginate(12);
        return view('postpage', compact('posts'));
    }
    public function singlePost($slug)
    {
        $post = Post::with(['categories','softwares'])->firstWhere('slug', $slug);
        // return $post;
        return view('single.post', compact('post'));
    }
}
