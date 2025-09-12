<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BridgeBoard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                {{-- ヘッダーにグラデーション --}}
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-24"></div>

                <div class="p-6 relative -mt-12">
                    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">投稿編集</h3>

                        <form method="POST" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('PUT')

                            {{-- タイトル --}}
                            <div class="mb-4">
                                <x-label for="title" :value="__('タイトル')" />
                                <x-input id="title" class="block mt-1 w-full border-indigo-300 bg-indigo-50"
                                    type="text" name="title" value="{{ old('title', $post->title) }}" autofocus />
                                @foreach ($errors->get('title') as $error)
                                    <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 内容 --}}
                            <div class="mb-4">
                                <x-label for="contents" :value="__('内容')" />
                                <textarea id="contents" class="block w-full border rounded-lg p-2 h-40 border-indigo-300 bg-indigo-50"
                                    name="contents">{{ old('contents', $post->contents) }}</textarea>
                                @foreach ($errors->get('contents') as $error)
                                    <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- ボタン --}}
                            <div class="flex items-center justify-end gap-4">
                                <a href="{{ route('posts.index') }}">
                                    <x-button type="button" class="bg-gray-200 hover:bg-gray-300">
                                        {{ __('戻る') }}
                                    </x-button>
                                </a>
                                <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                    {{ __('更新') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>