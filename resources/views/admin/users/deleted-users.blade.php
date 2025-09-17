<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-red-600 leading-tight">
            {{ __('削除済みユーザー一覧') }}
        </h2>
    </x-slot>

    <div class="py-6 px-6 bg-gray-950 min-h-screen text-white">
        <!-- Filters -->
        <div class="flex flex-wrap justify-center gap-4 mb-6 items-center">
            <input type="text" placeholder="名前・メールアドレス"
                class="bg-gray-900 text-white rounded px-4 py-2 w-1/4 focus:outline-none border border-red-500" />
            <x-button class="bg-red-600 hover:bg-red-700 text-white">
                検索
            </x-button>
        </div>

        <div class="overflow-x-auto bg-gray-900 rounded-lg shadow border border-red-700">
            <table class="w-full text-left text-sm">
                <thead class="bg-red-800 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">ユーザーID</th>
                        <th class="px-6 py-3">氏名</th>
                        <th class="px-6 py-3">メールアドレス</th>
                        <th class="px-6 py-3">削除日</th>
                        <th class="px-6 py-3">復元</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    @if(isset($profile->user))
                    <tr class="border-b border-gray-700 hover:bg-gray-800">
                        <td class="px-6 py-4 flex items-center gap-2">
                            <div class="h-8 w-8 bg-gray-600 rounded-full">
                                <img src="{{ asset('storage/' . $profile->image->filename) }}" alt="">
                            </div>
                            <span>{{ $profile->user->id }}</span>
                        </td>
                        <td class="px-6 py-4">{{ $profile->user->name }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $profile->user->email }}</td>
                        <td class="px-6 py-4">{{ $profile->deleted_at->format('Y年m月d日') }}</td>
                        <td class="px-6 py-4">
                            <form action="" method="POST" onsubmit="return confirm('復元しますか？');">
                                @csrf
                                <x-button class="bg-green-600 hover:bg-green-700 text-white">
                                    復元
                                </x-button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>