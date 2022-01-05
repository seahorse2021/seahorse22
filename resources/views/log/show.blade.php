{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Detail') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}
    {{-- -----ログの中身とコメント表示ページ ---}}

    {{-- ---------写真表示部分---------------- --}}
<div class="flex justify-center">
    <div class="px-2 mx-2 my-4 rounded-lg shadow-lg bg-white max-w-sm w-full">
        <!-- <h1 class="font-bold text-center text-lg mt-2">{{ $log->dive_site }}</h1> -->
    {{-- -------ログの詳細表示部分------------ --}}
    <section class="flex flex-col mt-4 ">
        <p>date:<b>{{ $log->date }}</b></p>
        <p>dive site:<b>{{ $log->dive_site }}</b></p>
        <p>temp:<b>{{ $log->temp }}℃</b></p>
        <p>first dive time:<b>{{ $log->dive_time }}min</b></p>
        <p class="mb-12">sesond dive time:<b>{{ $log->dive_time2 }}min</b></p>

        <p><b>{!! nl2br(e($log->message)) !!}</b></p>
    </section>
    {{-- ------ログの詳細表示部分ここまで----- --}}
    @foreach ($log->pictures as $picture)
    <img src="{{ Storage::url($picture->picture) }}" class="mt-2  rounded-lg object-cover">
    @endforeach

    {{-- ---------写真表示部分ここまで---------------- --}}

    <div class="flex justify-end my-2">
        {{-- ------いいねボタン表示部分------------ --}}
        <!-- favorite 状態で条件分岐 -->
        {{-- 中間テーブルのuser_idとログインユーザーのidが一致するデータを取得 --}}
        @if($log->users()->where('user_id', Auth::id())->exists())
        {{-- データがある場合はunfavoriteボタンを表示 --}}
        <!-- unfavorite ボタン -->
        <form action="{{ route('unfavorites',$log) }}" method="POST" class="text-left">
            @csrf
            <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-red py-1 px-2 focus:outline-none focus:shadow-outline">
                <svg class="h-6 w-6 text-red-500" fill="red" viewBox="0 0 24 24" stroke="red">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                {{-- log_users_tableから$logに対応する件数を表示 --}}
                {{ $log->users()->count() }}
            </button>
        </form>
        {{-- データが無い場合はunfavoriteボタンを表示 --}}
        @else
        <!-- favorite ボタン -->
        <form action="{{ route('favorites',$log) }}" method="POST" class="text-left">
            @csrf
            <button type="submit" class="flex mr-2 ml-2 text-sm hover:bg-gray-200 hover:shadow-none text-gray-500 py-1 px-2 focus:outline-none focus:shadow-outline">
                <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                {{-- log_users_tableから$logに対応する件数を表示 --}}
                {{ $log->users()->count() }}
            </button>
        </form>
        @endif
        {{-- ------いいねボタン表示部分ここまで------------ --}}

        {{-- ------ログの更新、削除ボタン表示部分----------- --}}
        {{-- もしlogのuser_idとログイン中のユーザーのidが一致したら削除ボタンと更新ボタンを表示 --}}
        @if ($log->user_id === Auth::user()->id)
        {{-- log.destroyにdeleteメソッドでlog idを送る --}}
        <form action="{{ route('log.destroy',$log->id )}}" method="post">
            @method('delete')
            @csrf
            {{-- 削除ボタン --}}
            <button type="submit">
                <svg class="h-6 w-6 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </form>
        {{-- log.destroyにdeleteメソッドでlog idを送る --}}
        <form action="{{ route('log.edit',$log->id )}}" method="get">
            @csrf
            {{-- 更新ボタン --}}
            <button type="submit" class="flex justify-end mx-2">
                <svg class="h-6 w-6 text-gray-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
            </button>
        </form>
        @endif{{-- ボタン表示の条件分岐ここまで--}}

            {{-- もしlogのuser_idとログイン中のユーザーのidが一致したら写真追加ボタンを表示 --}}
    @if ($log->user_id === Auth::user()->id)
    <form action="{{ route('picture.edit',$log->id) }}" method="get">
        <button>写真を追加</button>
    </form>
    @endif
    {{-- 写真追加ボタン表示の条件分岐ここまで--}}
        {{-- ------ログの更新、削除ボタン表示部分ここまで----------- --}}

    </div>

    {{-- -------コメント入力欄------ --}}
<hr>
    <h2 class="mt-10 font-bold">commment</h2>
    <form method="post" action="{{ route('comment.store', $log ) }}" class="flex flex-col">
        @csrf
        <textarea name="comment"></textarea>
        <x-button class="my-2 text-center mx-auto">Add</x-button>
    </form>
    {{-- -------コメント入力欄ここまで------ --}}

    {{-- -------投稿コメント表示場所--------- --}}

    <div class="mt-5">
        {{-- 繰り返し処理でリストを表示 $log->commetnsで取得可能--}}
        {{-- comments()とすることで条件の指定が可能 --}}
        @foreach ($log->comments()->latest()->get() as $comment)
        <!-- <hr> -->
        <div class="flex"><img src="{{ Storage::url( $comment->user->profile->profile_image) }}" class="rounded-full h-8 w-8"> {{ $comment->user->name }}</div>
        <div class="mx-auto w-full  mb-4"> {!!  nl2br(e($comment->comment)) !!}</div>

        {{-- もしlogのuser_idとログイン中のユーザーのidが一致したら削除ボタンを表示 --}}
        @if ($comment->user_id === Auth::user()->id)
        <form method="post" action="{{ route('comment.destroy',$comment )}}">
            @method('DELETE')
            @csrf

            <button>
                <svg class="h-6 w-6 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        </form>
        @endif{{-- 削除ボタン表示の条件分岐ここまで--}}

        @endforeach
    </div>
    {{-- -------投稿コメント表示場所ここまで--------- --}}

    {{-- ログ一覧に戻るボタン --}}
    <a href="{{ route('log.index') }}">＜back</a>
  </div>
</div>

    {{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}

