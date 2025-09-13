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
                        <h3 class="text-xl font-bold mb-4 text-gray-800">プロフィール設定</h3>

                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- アイコン --}}
                            <div class="mb-4">
                                <x-label for="image" :value="__('プロフィール画像')" />
                                <x-input id="image" class="block mt-1 w-full border-indigo-300 bg-indigo-50"
                                    type="file" name="image" autofocus />
                                @foreach ($errors->get('image') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 名前 --}}
                            <div class="mb-4">
                                <x-label for="name" :value="__('名前')" />
                                <x-input id="name" class="block mt-1 w-full border-indigo-300 bg-indigo-50"
                                    type="text" name="name" autofocus />
                                @foreach ($errors->get('name') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- 内容 --}}
                            <div class="mb-4">
                                <x-label for="bio" :value="__('自己紹介')" />
                                <textarea id="bio" class="block w-full border rounded-lg p-2 h-40 border-indigo-300 bg-indigo-50"
                                    name="bio"></textarea>
                                @foreach ($errors->get('bio') as $error)
                                <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                                @endforeach
                            </div>

                            {{-- ボタン --}}
                            <div class="flex items-center justify-end gap-4">
                                <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white">
                                    {{ __('登録') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>