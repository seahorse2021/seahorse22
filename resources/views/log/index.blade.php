{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("All Log") }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----ログの一覧画面----- --}}

    {{-- ログ追加ボタン --}}
    {{-- <x-button class="ml-5">
        <a href="{{ route('log.create') }}">create</a>
    </x-button> --}}

    {{-- -----一覧表示部分--------- --}}

    {{-- <div>
        @foreach ($logs as $log)
                <a href="{{ route('log.show',$log->id) }}">
                    <div> --}}
                        {{-- 投稿した人のプロフィール画像 --}}
                        {{-- <img src="{{ Storage::url($log->user->profile->profile_image) }}" class="rounded-full h-16 w-16"> --}}
                        {{-- 投稿した人のプロフィール名前 --}}
                        {{-- <p>{{$log->user->name}}</p> --}}
                        {{-- ログの日付 --}}
                        {{-- <p>{{$log->date}}</p> --}}
                        {{-- 潜った場所 --}}
                        {{-- <p>{{$log->dive_site}}</p> --}}
                        {{-- <p>{!! nl2br(e($log->message)) !!}</p> --}}
                        {{-- サムネイル画像 --}}
                        {{-- @if($log->thumbnail)
                        <img src="{{ Storage::url($log->thumbnail) }}" class="h-48 object-cover">
                        @else
                        <img src="{{ Storage::url('uploads/no_image.png') }}" class="h-48 object-cover">
                        @endif --}}
                        {{-- サムネイル画像記述ここまで --}}
                    {{-- </div>
                </a>
        @endforeach
    </div> --}}

    @foreach ($logs as $log)
    <a href="{{ route('log.show',$log->id) }}">
    <div class=" rounded overflow-hidden border  lg:w-4/12 md:w-4/12 bg-white mx-3 md:mx-0 lg:mx-0 my-5">
        <div class="w-full flex justify-between p-4">
            <div class="flex">
                <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                <img src="{{ Storage::url($log->user->profile->profile_image) }}" alt="profilepic">
                </div>
                <span class="pt-1 ml-2 font-bold text-sm">{{$log->user->name}}</span>
            </div>
            <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
        </div>
        @if($log->thumbnail)
        <img class="w-full bg-cover" src="{{ Storage::url($log->thumbnail) }}">
        @else
        <img class="w-full bg-cover" src="{{ Storage::url('uploads/no_image.png') }}">
        @endif
        <div class="px-3 pb-2">
            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <p>{{$log->dive_site}}</p>
                        <p>{{$log->date}}</p>
                        <p>{{$log->dive_site}}</p>
                    <p>{!! nl2br(e($log->message)) !!}</p>
                </div>
            </div>
            <div class="text-sm mb-2 text-gray-400 cursor-pointer font-medium">View all 14 comments</div>
                <div class="mb-2">
                    <div class="mb-2 text-sm">
                    <span class="font-medium mr-2">razzle_dazzle</span> Dude! How cool! I went to New Zealand last summer and had a blast taking the tour! So much to see! Make sure you bring a good camera when you go!
                </div>
            </div>
        </div>
    </div>
    </a>
    @endforeach


    {{-- -----一覧表示部分--------- --}}

{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
