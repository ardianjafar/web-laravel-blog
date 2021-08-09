<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard', [
            'users' => User::get(),
            'total_post' => Post::count('id'),
            'total_users' => User::count('id'),
            'total_category' => Category::count('id'),
            'posts_trashed'     => Post::count('deleted_at'),
        ]);
    }
}
