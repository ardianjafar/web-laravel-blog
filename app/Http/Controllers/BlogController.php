<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $category  = Category::all();
        return view('frontend.index',compact('posts','category'));
    }

    public function show()
    {
        $posts = Post::all();
        return view('frontend.single-page');
    }

    public function detail($slug)
    {
        $post = Post::where('slug',$slug)->get();
        $category = Category::all();
        return view('frontend.single-page',compact('post','category'));
    }

    public function related($category)
    {
        # code...
        $category = Category::where('category', $category)->get();
        $post = Post::where('category', $category)->get();
        return view('frontend.sing');
    }
}
