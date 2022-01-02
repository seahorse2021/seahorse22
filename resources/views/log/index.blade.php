{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("My Log") }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----ログの一覧画面----- --}}

    {{-- ログ追加ボタン --}}
    <x-button class="ml-5">
        <a href="{{ route('log.create') }}">create</a>
    </x-button>

    {{-- -----一覧表示部分--------- --}}

    <div>
        @foreach ($logs as $log)
                <a href="{{ route('log.show',$log->id) }}">
                    <div>
                        {{-- 投稿した人のプロフィール画像 --}}
                        <img src="{{ Storage::url($log->user->profile->profile_image) }}" class="rounded-full h-16 w-16">
                        {{-- 投稿した人のプロフィール名前 --}}
                        <p>{{$log->user->name}}</p>
                        {{-- ログの日付 --}}
                        <p>{{$log->date}}</p>
                        {{-- 潜った場所 --}}
                        <p>{{$log->dive_site}}</p>
                    </div>
                </a>
                <div class="flex">
                </div>
        @endforeach
    </div>


    {{-- -----一覧表示部分--------- --}}

{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
