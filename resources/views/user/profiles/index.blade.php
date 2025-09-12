<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイプロフィール') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-2xl overflow-hidden">
                {{-- プロフィールヘッダー --}}
                <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-32"></div>

                {{-- メイン --}}
                <div class="p-6 relative">
                    {{-- アイコン --}}
                    <div class="absolute -top-12 left-6">
                        <div class="w-24 h-24 rounded-full bg-indigo-600 flex items-center justify-center text-white text-3xl font-bold shadow-lg">
                            <img src="{{ asset('storage/' . $profile->image->filename) }}" alt="処理ミス">
                        </div>
                    </div>

                    {{-- 名前と編集ボタンを横並びに --}}
                    <div class="ml-32 flex items-center justify-between">
                        <h3 class="text-2xl font-bold text-gray-800">{{ $profile->user->name }}</h3>
                        <a href="{{ route('profile.edit') }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition ml-4">
                            編集
                        </a>
                    </div>

                    {{-- 自己紹介 --}}
                    <div class="mt-6 border-t pt-4">
                        <h4 class="text-lg font-semibold text-gray-700 mb-2">自己紹介</h4>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $profile->bio ?? '自己紹介はまだありません。' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>