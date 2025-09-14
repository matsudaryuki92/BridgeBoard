<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BridgeBoard') }}
        </h2>
    </x-slot>

    {{-- 全体背景色を gray-100 に --}}
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- 内枠 --}}
            <div class="space-y-6">
                {{-- 上部バー --}}
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">カテゴリ一覧</h2>
                    <a href="{{ route('categories.create') }}"
                        class="inline-block rounded-lg border bg-white px-4 py-2 text-sm font-semibold text-gray-500 hover:bg-gray-100">
                        カテゴリ作成
                    </a>
                </div>

                {{-- カテゴリカードグリッド --}}
                <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach($categories as $category)
                    <a href="{{ route('categories.show', ['slug' => $category->slug]) }}"
                        class="bg-white shadow-md border border-gray-200 rounded-xl p-6 hover:shadow-lg transition duration-200">
                        <div class="flex flex-col items-center text-center">
                            <div class="text-indigo-600 font-bold text-lg mb-2">
                                {{ $category->name }}
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $category->post->count() }} 件の投稿
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>