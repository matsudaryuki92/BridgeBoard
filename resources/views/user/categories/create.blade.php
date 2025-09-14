<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BridgeBoard') }}
        </h2>
    </x-slot>

    {{-- 全体背景 --}}
    <div class="py-12 bg-gray-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- カード風内枠 --}}
            <div class="bg-white shadow-md rounded-xl p-8">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">カテゴリ作成</h3>

                <form action="{{ route('categories.store') }}" method="post" class="space-y-6">
                    @csrf

                    {{-- カテゴリ名 --}}
                    <div>
                        <x-label for="name" :value="__('カテゴリ（英語のみで作成可能）')" class="font-semibold text-gray-700" />
                        <x-input id="name"
                            class="mt-2 block w-full border border-gray-300 rounded-lg p-3 bg-gray-50 focus:ring focus:ring-indigo-200 focus:border-indigo-400"
                            type="text" name="name" placeholder="Category Name" value="{{ old('name') }}" />
                        @foreach ($errors->get('name') as $error)
                        <p class="mt-1 text-red-600 text-sm italic">{{ $error }}</p>
                        @endforeach
                    </div>

                    {{-- ボタン --}}
                    <div class="flex items-center justify-end gap-4">
                        <a href="{{ route('categories.index') }}">
                            <x-button type="button"
                                class="bg-gray-200 hover:bg-gray-300 text-white px-4 py-2 rounded-lg">
                                戻る
                            </x-button>
                        </a>
                        <x-button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                            作成
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>