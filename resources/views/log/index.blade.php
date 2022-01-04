{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-clip-text text-transparent bg-gradient-to-br from-teal-400 via-blue-500 to-gray-900 leading-tight">
        {{ __("All Logs") }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- -----ログの一覧画面----- --}}

    {{-- ログ追加ボタン --}}
    {{-- <x-button class="ml-5">
        <a href="{{ route('log.create') }}">create</a>
    </x-button> --}}

    {{-- -----一覧表示部分--------- --}}

    @foreach ($logs as $log)
    <a href="{{ route('log.show',$log->id) }}">
    <div class="flex rounded-lg overflow-hidden border  lg:w-4/12 md:w-4/12 bg-white mx-3 md:mx-0 lg:mx-0 my-5">
        <div class="w-full flex flex-col justify-between p-4">
            <div class="flex">
                <div class="rounded-full h-8 w-8 bg-gray-500 flex items-center justify-center overflow-hidden">
                    <img src="{{ Storage::url($log->user->profile->profile_image) }}" alt="profilepic">
                </div>
                <span class="pt-1 ml-2 font-bold text-sm">{{$log->user->name}}</span>
            </div>
            <span class="px-2 hover:bg-gray-300 cursor-pointer rounded"><i class="fas fa-ellipsis-h pt-2 text-lg"></i></span>
            <div class="px-3 pb-2">
                <div class="pt-1">
                    <div class="mb-2 text-sm">
                            <p>{{$log->date}}</p>
                            <p>{{$log->dive_site}}</p>
                        <p>{!! nl2br(e($log->message)) !!}</p>
                    </div>
                    <p class="mt-2">more＞</p>
                </div>
            </div>
        </div>

        @if($log->thumbnail)
        <div class="flex-none w-80 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
            <img class="z-10 w-full h-full object-cover rounded-r-lg" src="{{ Storage::url($log->thumbnail) }}">
        </div>
        @else
        <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
            <img class="z-10 w-full h-full object-cover rounded-lg" src="{{ Storage::url('uploads/no_image.png') }}">
        </div>
        @endif

    </div>
    </a>
    @endforeach


    {{-- -----一覧表示部分--------- --}}

{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
