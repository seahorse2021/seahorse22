
{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----マイプロフィール画面----- --}}
    <h1>my profile</h1>

    {{-- ダッシュボードに戻るボタン --}}
    <a href="{{ route('dashboard') }}">TOPへ</a>
    {{-- マイプロフィール表示部分 --}}
    <section>
        {{-- プロフィールイメージ --}}
        <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-32 w-32">
        {{-- ユーザー名 --}}
        <h1>{{ $profile->user->name }}</h1>

        <table>
            {{-- カードランク --}}
            <tr>
                <th>CARD RANK:</th>
                <td>{{ $profile->card_rank }}</td>
            </tr>
            {{-- ダイブ本数 --}}
            <tr>
                <th>DIVE COUNT:</th>
                <td>{{ $profile->dive_count }}</td>
            </tr>
        </table>

        {{-- profile.edit プロフィール写真変更ページへのリンク --}}
        <form action="{{ route('profile.edit',$profile->id)  }}" method="get">
            <button>プロフィール画像変更</button>
        </form>

    </section>

</x-app-layout>


