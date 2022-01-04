
{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----マイプロフィール画面----- --}}

    {{-- マイプロフィール表示部分 --}}
    <div class="flex flex-col" >
    <section class="md:flex bg-white rounded-lg p-6 text-center my-4 mx-2 drop-shadow-md" id="card">
        {{-- プロフィールイメージ --}}
        <!-- <img src="{{ Storage::url($profile->profile_image) }}" class="rounded-full h-32 w-32"> -->
        <img src="{{ Storage::url($profile->profile_image) }}" class="h-48 w-48 md:h-100 md:w-100 rounded-full mx-auto md:mx-0 md:mr-6 object-cover">
        {{-- ユーザー名 --}}
        <h1 class="md:text-left mt-2 mr-2"><b>{{ $profile->user->name }}</b></h1>

        <table class="md:text-left w-full justify-center mt-2 ">
            {{-- カードランク --}}
            <tr class="flex flex-col w-300 h-300 bg-white" >
                <td>CARD RANK:</td>
                <td><b class="text-3xl">{{ $profile->card_rank }}</b></td>
            </tr>

            {{-- ダイブ本数 ランクProの場合は表示しない--}}
            @if($profile->card_rank !== 'Pro')
                <tr class="flex flex-col">
                    <td>DIVE COUNT:</td>
                    <td><b class="text-3xl">{{ $profile->dive_count }}</b></td>
                </tr>
            @endif

        </table>
    </section>
    {{-- マイプロフィール表示部分ここまで --}}

    {{-- profile.edit プロフィール写真変更ページへのリンク --}}
    @if ($profile->user_id === Auth::user()->id)
        <form action="{{ route('profile.edit',$profile->id)  }}" method="get" class="mx-auto">
            <x-button class="my-2">プロフィール画像変更</x-button>
        </form>
    @endif

</div>
<script src="{{ mix('js/vanilla-tilt.js') }}"></script>
<script>
    VanillaTilt.init(document.querySelectorAll("#card"), {
      max: 10,
      speed: 10,
    //   glare: true,
      "max-glare": 1,
    });
  </script>
</x-app-layout>


