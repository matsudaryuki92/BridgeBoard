<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

class DashboardController extends Controller
{
    public function getStatistics()
    {
        $users = User::count();
        $posts = Post::count();
        $categories = Category::count();

        return view('admin.dashboard', compact('users', 'posts', 'categories'));
    }
}
