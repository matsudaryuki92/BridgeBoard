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
                        <h3 class="text-xl font-bold mb-4 text-gray-800">新規投稿</h3>

                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf

                            {{-- カテゴリ選択 --}}
                            <div class="mb-6">
                                <x-label for="category_id" :value="__('カテゴリ')" />
                                <select name="category_id" id="category_id"
                                    class="block w-full mt-1 p-2 border rounded-lg bg-indigo-50 border-indigo-300 focus:ring focus:ring-indigo-200 focus:border-indigo-400">
                                    <option disabled selected>-- カテゴリを選択してください --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @foreach ($errors->get('category_id') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- タイトル入力 --}}
                            <div class="mb-6">
                                <x-label for="title" :value="__('タイトル')" />
                                <x-input id="title"
                                    class="block mt-1 w-full border border-indigo-300 rounded-lg p-2 bg-indigo-50 focus:ring focus:ring-indigo-200 focus:border-indigo-400"
                                    type="text" name="title" placeholder="タイトル" value="{{ old('title') }}" />
                                @foreach ($errors->get('title') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 内容入力 --}}
                            <div class="mb-6">
                                <x-label for="contents" :value="__('内容')" />
                                <textarea id="contents"
                                    class="block w-full mt-1 border border-indigo-300 rounded-lg p-2 h-40 bg-indigo-50 focus:ring focus:ring-indigo-200 focus:border-indigo-400"
                                    name="contents" placeholder="内容">{{ old('contents') }}</textarea>
                                @foreach ($errors->get('contents') as $error)
                                    <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- ボタン --}}
                            <div class="flex items-center justify-end gap-4">
                                <a href="{{ route('posts.index') }}">
                                    <x-button type="button" class="bg-gray-200  hover:bg-gray-300">
                                        {{ __('戻る') }}
                                    </x-button>
                                </a>
                                <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                    {{ __('投稿') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>