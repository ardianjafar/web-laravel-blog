<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Post , Category};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::paginate(10),
            'total_post' => Post::count('id'),
            'total_users' => User::count('id'),
            'total_category' => Category::count('id'),
            'posts_trashed'     => Post::count('deleted_at'),
        ]);
    }
    public function index2()
    {
        $posts = Post::paginate(20);
        return view('admin.post.index2', [
            'posts' => $posts,  
        ]);
    }
}
