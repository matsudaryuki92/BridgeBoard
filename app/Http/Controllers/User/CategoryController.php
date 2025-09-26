<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('user.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('user.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        $name = $request->input('name');
        $maxSortOrder = Category::max('sort_order') ?? 0;
        $slug = Str::slug($name);

        Category::create([
            'name' => $name,
            'sort_order' => $maxSortOrder + 1,
            'slug' => $slug,
        ]);

        return redirect()->route('categories.index')
            ->with([
                'message' => 'カテゴリを作成しました！',
                'status' => 'success',
            ]);
    }


    public function show($slug)
    {
        $category = Category::where('slug', $slug)
                    ->firstOrFail();

        $posts = Post::where('category_id', $category->id)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(10);

        return view('user.categories.show', compact('category', 'posts'));
    }
}
