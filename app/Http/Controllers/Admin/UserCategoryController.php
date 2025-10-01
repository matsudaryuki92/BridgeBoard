<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class UserCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with([
                'message' => 'カテゴリを削除しました。',
                'status' => 'alert',
            ]);
    }
}
