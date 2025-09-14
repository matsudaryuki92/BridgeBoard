<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\EditPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Models\Profile;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function index()
    {
        $posts = Post::with(['user.profile.image', 'category'])
            ->select('id', 'title', 'contents', 'updated_at', 'user_id', 'category_id')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('user.posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::select('id', 'name')->get();;

        return view('user.posts.create', compact('categories'));
    }


    public function store(StorePostRequest $request, Post $post)
    {
        $post->user_id = Auth::id();
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->contents = $request->input('contents');
        $post->save();

        return redirect()->route('posts.index')
                ->with([
            'message' => '投稿を作成しました！',
            'status' => 'success',
        ]);
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('user.posts.edit', compact('post'));
    }


    public function update(EditPostRequest $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'contents' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->contents = $request->input('contents');
        $post->save();

        return redirect()->route('posts.index')
                ->with([
            'message' => '投稿を更新しました。',
            'status' => 'info',
        ]);
    }


    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->route('posts.index')
            ->with([
                'message' => '投稿を削除しました！',
                'status' => 'alert',
            ]);
    }
}
