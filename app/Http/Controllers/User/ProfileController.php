<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Requests\Profile\EditProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
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
        try {
            DB::transaction(
                function () use ($request) {
                    if ($request->hasFile('image')) {
                        $path = $request->file('image')->store('profile_images', 'public');
                        $image = Image::create([
                            'filename' => $path,
                        ]);
                        $image_id = $image->id;
                    }

                    Profile::create([
                        'user_id' => Auth::id(),
                        'bio' => $request->input('bio'),
                        'image_id' => $image_id, // ここでセットしておく
                    ]);

                    $user = Auth::user();
                    $user->name = $request->input('name');
                    $user->save();
                },
                1
            );
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('profile.index')
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
        try {
            DB::transaction(function () use ($request) {
                $profile = Profile::where('user_id', Auth::id())->firstOrFail();

                if ($request->hasFile('image')) {
                    $path = $request->file('image')->store('profile_images', 'public');
                    $image = Image::create([
                        'filename' => $path,
                    ]);
                    $profile->image_id = $image->id;
                }

                $profile->bio = $request->input('bio');
                $profile->save();

                $user = User::findOrFail(Auth::id());
                $user->name = $request->input('name');
                $user->save();
            }, 1);
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('profile.index')
            ->with([
                'message' => 'プロフィールを更新しました。',
                'status' => 'info',
            ]);
    }
}
