{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----プロフィールの登録画面----- --}}
    <h1>add profile</h1>
    {{-- -----プロフィール入力フォーム----- --}}
    <form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
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

        <div>
            {{-- 今まで潜った本数 --}}
            <p>dive count</p>
            <input type="number" name="dive_count">
        </div>

        <button>add</button>
    </form>
    {{-- -----プロフィール入力フォームここまで----- --}}

</x-app-layout>
