<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Category;
use App\Models\User;

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

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->delete();

        return redirect()
            ->route('admin.users.index')
            ->with([
                'message' => 'ユーザー情報を削除しました。',
                'status' => 'alert',
            ]);
    }

    public function deletedUsers()
    {
        $profiles = Profile::onlyTrashed()
                    ->with('user', 'image')
                    ->paginate(10);

        return view('admin.users.deleted-users', compact('profiles'));
    }

    public function forceDelete($id)
    {
        $profile = Profile::onlyTrashed()
                    ->with('user')
                    ->findOrFail($id);

        $profile->user->forceDelete();
        $profile->image->forceDelete();
        $profile->forceDelete();

        return redirect()
            ->route('admin.users.deleted_users')
            ->with([
                'message' => 'ユーザー情報を削除しました。',
                'status' => 'alert',
            ]);
    }
}
