
{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
    <body>

    </body>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----マイプロフィール画面----- --}}

    {{-- ダッシュボードに戻るボタン --}}
    <!-- <a href="{{ route('dashboard') }}">TOPへ</a> -->
    {{-- マイプロフィール表示部分 --}}
    <div class="flex flex-col">
    <section class="md:flex bg-white rounded-lg p-6 text-center my-4 mx-2 drop-shadow-md">
        {{-- プロフィールイメージ --}}
        <!-- <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-32 w-32"> -->
        <img src="{{ Storage::url($profile->profile_image) }}" class="h-48 w-48 md:h-100 md:w-100 rounded-full mx-auto md:mx-0 md:mr-6">
        {{-- ユーザー名 --}}
        <h1 class="md:text-left mt-2 mr-2"><b>{{ $profile->user->name }}</b></h1>

        <table class="md:text-left w-full justify-center mt-2 ">
            {{-- カードランク --}}
            <tr class="flex flex-col">
                <td>CARD RANK:</td>
                <div class="card">
                    <td><b class="text-5xl">{{ $profile->card_rank }}</b></td>
                </div>
            </tr">
            {{-- ダイブ本数 --}}
            <tr class="flex flex-col">
                <td>DIVE COUNT:</td>
            <div>
                <td><b>{{ $profile->dive_count }}</b></td>
            </div>
            </tr>
        </table>
    </section>
    {{-- profile.edit プロフィール写真変更ページへのリンク --}}
        <form action="{{ route('profile.edit',$profile->id)  }}" method="get" class="mx-auto">
            <x-button>プロフィール画像変更</x-button>
        </form>

</div>
</x-app-layout>


