{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----プロフィールの登録画面----- --}}
        <div class="flex justify-center">
    <div class="px-2 mx-2 my-4 rounded-lg shadow-lg bg-white max-w-sm w-full">
    <h1 class="text-lg font-bold">add profile</h1>
    {{-- -----プロフィール入力フォーム----- --}}
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data" class="pb-5">
        @csrf

        <div>
            <p>card rank</p>
            {{-- カードの種類 --}}
            <select name="card_rank">
                <option value="Pro">Pro</option>
                <option value="DM">DM</option>
                <option value="MSD">MSD</option>
                <option value="AOW">AOW</option>
                <option value="OW">OW</option>
            </select>
        </div>

        <div class="my-2">
            {{-- 今まで潜った本数 --}}
            <p>dive count</p>
            <input type="number" name="dive_count">
        </div>

        <x-button class="mb-3">add</x-button>
    </form>

    </div>
</div>
    {{-- -----プロフィール入力フォームここまで----- --}}

</x-app-layout>
