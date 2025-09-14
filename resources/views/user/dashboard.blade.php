<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('BridgeBoard') }}
        </h2>
    </x-slot>

    <div class="bg-gradient-to-b from-indigo-50 to-white py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-xl p-8">
                <h1 class="mb-6 text-center text-3xl font-bold text-indigo-600 sm:text-4xl">
                    BridgeBoardへようこそ
                </h1>

                <p class="mb-6 text-gray-700 sm:text-lg leading-relaxed">
                    BridgeBoardは、<strong class="text-indigo-500">同じ趣味や関心を持つ人たちが集まり、自由に交流できる掲示板</strong>です。
                </p>

                <p class="mb-6 text-gray-700 sm:text-lg leading-relaxed">
                    <strong class="text-indigo-500">「自由なやりとり」と「安心して使える環境」</strong>を大切にしています。
                    管理者が掲示板全体を見守り、必要に応じて方向性の調整や、不適切な投稿への対応も行います。
                </p>

                <p class="mb-6 text-gray-700 sm:text-lg leading-relaxed">
                    あなたの「好き」や「想い」が、きっと誰かの心にも届きます。
                </p>

                <p class="text-gray-700 sm:text-lg text-center">
                    ぜひ、あなただけの居場所を見つけてください。<br>
                    <span class="font-semibold text-indigo-600">BridgeBoardが、その一歩をお手伝いします。</span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>