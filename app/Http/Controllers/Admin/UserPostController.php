<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class UserPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $posts = Post::with(['user.profile.image', 'category'])
            ->select('id', 'title', 'contents', 'updated_at', 'user_id', 'category_id')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }
}
