<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="flex">
        {{-- サイドバー --}}
        @php
        $isAdmin = Auth::guard('admin')->check();
        $user = $isAdmin ? Auth::guard('admin')->user() : Auth::user();
        @endphp

        <aside class="fixed top-0 left-0 w-48 h-screen {{ $isAdmin ? 'bg-gray-800' : 'bg-indigo-800' }} text-white flex flex-col justify-between shadow-lg z-50">

            {{-- 上部：ロゴ＋ナビゲーション --}}
            <div>
                <div class="flex items-center justify-center h-20 border-b {{ $isAdmin ? 'border-gray-700' : 'border-indigo-700' }}">
                    <a href="{{ $isAdmin ? route('admin.dashboard') : route('dashboard') }}">
                        <img src="{{ asset('images/icon.png') }}" alt="Logo" class="h-10 w-auto">
                    </a>
                </div>

                <nav class="flex flex-col mt-4 px-2 space-y-2">
                    @if($isAdmin)
                    {{-- Adminメニュー --}}
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="block py-2 px-4 rounded text-white hover:bg-gray-700">
                        {{ __('ダッシュボード') }}
                    </x-nav-link>
                    @else
                    {{-- Userメニュー --}}
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                        {{ __('ダッシュボード') }}
                    </x-nav-link>
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                        {{ __('カテゴリ選択') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                        {{ __('投稿') }}
                    </x-nav-link>
                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                        {{ __('掲示板') }}
                    </x-nav-link>
                    @endif
                </nav>
            </div>

            {{-- 下部：プロフィール＋ログアウト --}}
            <div class="px-2 mb-4 border-t {{ $isAdmin ? 'border-gray-700' : 'border-indigo-700' }} pt-4">
                <div class="px-2 py-2 text-sm text-gray-300">{{ $user->name }}</div>
                <div class="px-2 py-2 text-xs text-gray-400 mb-2">{{ $user->email }}</div>

                @if(!$isAdmin)
                @php
                $hasProfile = \App\Models\Profile::where('user_id', $user->id)->exists();
                @endphp
                @if($hasProfile)
                <x-nav-link :href="route('profile.index')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                    {{ __('マイプロフィール') }}
                </x-nav-link>
                @else
                <x-nav-link :href="route('profile.create')" class="block py-2 px-4 rounded text-white hover:bg-indigo-700">
                    {{ __('プロフィール設定') }}
                </x-nav-link>
                @endif
                @endif

                <form method="POST" action="{{ $isAdmin ? route('admin.logout') : route('logout') }}">
                    @csrf
                    <x-nav-link :href="$isAdmin ? route('admin.logout') : route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-nav-link>
                </form>
            </div>
        </aside>

        <div class="flex-1 ml-48 w-full">
            {{-- ヘッダー --}}
            <header class="bg-white shadow h-16">
                <div class="max-w-7xl mx-auto h-full flex items-center px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $header ?? '' }}
                    </h1>
                </div>
            </header>

            {{-- メインコンテンツ --}}
            <main class="bg-gray-100 min-h-screen">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot ?? '' }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>