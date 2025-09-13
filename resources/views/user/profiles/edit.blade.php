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
                        <h3 class="text-xl font-bold mb-4 text-gray-800">プロフィール編集やで</h3>

                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('PUT')

                            {{-- アイコン --}}
                            <div class="mb-6">
                                <x-label for="icon" :value="__('プロフィール画像')" />

                                <label for="icon"
                                    class="flex items-center justify-center w-24 h-24 rounded-full border-2 border-dashed border-indigo-300 bg-indigo-50 cursor-pointer hover:bg-indigo-100 transition">
                                    <svg aria-hidden="true" class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16V4m0 0L3 8m4-4l4 4M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2h-6a2 2 0 01-2-2v-4m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </label>
                                <input id="icon" name="icon" type="file" class="hidden" />

                                {{-- バリデーションエラー表示 --}}
                                @foreach ($errors->get('icon') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 名前 --}}
                            <div class="mb-4">
                                <x-label for="name" :value="__('名前')" />
                                <x-input id="name" class="block mt-1 w-full border-indigo-300 bg-indigo-50"
                                    type="text" name="name" value="{{ old('name', $profile->user->name) }}" autofocus />
                                @foreach ($errors->get('name') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 内容 --}}
                            <div class="mb-4">
                                <x-label for="bio" :value="__('自己紹介')" />
                                <textarea id="bio" class="block w-full border rounded-lg p-2 h-40 border-indigo-300 bg-indigo-50"
                                    name="bio">{{ old('bio', $profile->bio) }}</textarea>
                                @foreach ($errors->get('bio') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach

                                {{-- ボタン --}}
                                <div class="flex items-center justify-end gap-4 mt-2">
                                    <a href="{{ route('profile.index') }}">
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