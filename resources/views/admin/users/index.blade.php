<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('管理者画面') }}
        </h2>
    </x-slot>


    <div class="py-6 px-6 bg-gray-900 min-h-screen text-white">
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-4 mb-6 items-center">
            <input type="text" placeholder="名前・メールアドレス"
                class="bg-gray-800 text-white rounded px-4 py-2 w-1/4 focus:outline-none" />
            <x-button class="bg-indigo-600 hover:bg-indigo-700 text-white">
                検索
            </x-button>
        </div>

        <div class="overflow-x-auto bg-gray-800 rounded-lg shadow">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-700 text-gray-300 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">ユーザーID</th>
                        <th class="px-6 py-3">氏名</th>
                        <th class="px-6 py-3">メールアドレス</th>
                        <th class="px-6 py-3">作成日</th>
                        <th class="px-6 py-3">削除日</th>
                        <th class="px-6 py-3">削除</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($profiles as $profile)
                    <tr class="border-b border-gray-700 hover:bg-gray-700">
                        <td class="px-6 py-4 flex items-center gap-2">
                            <div class="h-8 w-8 bg-gray-500 rounded-full">
                                <img src="{{ asset('storage/' . $profile->image->filename) }}" alt="">
                            </div>
                            <span>{{ $profile->user->id }}</span>
                        </td>
                        <td class="px-6 py-4">{{ $profile->user->name }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $profile->user->email }}</td>
                        <td class="px-6 py-4">{{ $profile->user->created_at->format('Y年m月d日') }}</td>
                        <td class="px-6 py-4">{{ optional($profile->user->deleted_at)->format('Y年m月d日') }}</td>
                        <td class="px-6 py-4">
                            <x-button class="bg-red-500 hover:bg-red-700 text-white">
                                削除
                            </x-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>