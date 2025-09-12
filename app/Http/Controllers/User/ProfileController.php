<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Requests\Profile\EditProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $profile = Profile::with(['user', 'image'])
            ->where('user_id', Auth::id())
            ->select('bio', 'user_id', 'image_id')
            ->firstOrFail();

        return view('user.profiles.index', compact('profile'));
    }

    public function create()
    {
        return view('user.profiles.create');
    }

    public function store(StoreProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        $image_id = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            $image = Image::create(['filename' => $path]);
            $image_id = $image->id;
        }

        Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'bio' => $request->input('bio'),
                'image_id' => $image_id,
            ]
        );

        return redirect()->route('posts.index')
            ->with([
                'message' => 'プロフィールの設定をしました！',
                'status' => 'success',
            ]);
    }

    public function edit()
    {
        $profile = Profile::with('user')
            ->where('user_id', Auth::id())
            ->select('bio', 'user_id')
            ->firstOrFail();

        return view('user.profiles.edit', compact('profile'));
    }

    public function update(EditProfileRequest $request)
    {
        $profile = Profile::where('user_id', Auth::id())->firstOrFail();

        $user = User::findOrFail(Auth::id());
        $user->name = $request->input('name');
        $user->save();

        $profile->bio = $request->input('bio');
        $profile->save();

        return redirect()->route('profile.index')
            ->with([
                'message' => 'プロフィールを更新しました。',
                'status' => 'info',
            ]);
    }
}
