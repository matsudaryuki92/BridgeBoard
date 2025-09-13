<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BridgeBoard') }}
        </h2>
    </x-slot>

    <div class="w-full px-4 mt-2 mb-4 flex justify-end">
        <div class="bg-gray-50 shadow rounded-xl px-6 py-2 text-sm border border-gray-200">
            {{ $posts->links() }}
        </div>
    </div>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @foreach($posts as $post)
                <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                    {{-- ヘッダーにグラデーション --}}
                    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-16"></div>

                    <div class="p-6 relative -mt-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                            {{-- 投稿者 --}}
                            <div class="flex items-center mb-2">
                                <!-- プロフィール画像 -->
                                @if($post->user->profile && $post->user->profile->image)
                                <img src="{{ asset('storage/' . $post->user->profile->image->filename) }}"
                                    alt="プロフィール画像"
                                    class="w-10 h-10 rounded-full mr-3 object-cover">
                                @endif

                                <!-- 投稿者名 -->
                                <p class="text-sm text-gray-500">{{ $post->user->name }}</p>
                            </div>



                            {{-- カテゴリタグ --}}
                            <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-2 py-1 rounded-full mb-2">
                                {{ $post->category->name }}
                            </span>

                            {{-- タイトル --}}
                            <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h3>

                            {{-- 内容 --}}
                            <p class="text-gray-700 mb-4">{{ $post->contents }}</p>

                            {{-- 投稿日時・編集・削除 --}}
                            <div class="flex justify-between items-center">
                                <p class="text-sm text-gray-400">
                                    投稿日時：{{ $post->updated_at->diffForHumans() }}
                                </p>

                                @if(Auth::id() === $post->user_id)
                                <div class="flex space-x-2">
                                    {{-- 編集ボタン --}}
                                    <a href="{{ route('posts.edit', $post) }}">
                                        <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                            編集
                                        </x-button>
                                    </a>

                                    {{-- 削除ボタン --}}
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                        onsubmit="return confirm('本当に削除しますか？');">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="bg-red-500 hover:bg-red-700 text-white">
                                            削除
                                        </x-button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="max-w-4xl mx-auto mt-8 px-4">
                    <div class="bg-gray-50 shadow-md rounded-xl p-4 text-center border border-gray-200">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>