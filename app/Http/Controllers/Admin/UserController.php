<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Category;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $profiles = Profile::with('user', 'image')
                    ->paginate(10);

        return view('admin.users.index', compact('profiles'));
    }
}
