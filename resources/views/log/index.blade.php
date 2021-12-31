<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log.index</title>
</head>
<body>
    {{-- -----ログの一覧画面----- --}}
    <h1>our log</h1>
    {{-- ログ一覧に戻るボタン --}}
    <a href="{{ route('dashboard')}}">TOPへ</a>
    {{-- 新規作成ボタン --}}
    <a href="{{ route('log.create') }}">create</a>
    <div>
        {{-- 一覧表示切り替えボタン --}}
        <a href="{{ route('log.index') }}">all log</a>
        {{-- 自分のログへ切り替えボタン --}}
        <a href="{{ route('log.mypage') }}">my log</a>
    </div>

    {{-- -----一覧表示部分--------- --}}
    <div>
        @foreach ($logs as $log)
                <a href="{{ route('log.show',$log->id) }}">
                    <div>
                        <p>{{$log->user->name}}</p>
                        <p>{{$log->date}}</p>
                        <p>{{$log->dive_site}}</p>
                    </div>
                </a>
                <div class="flex">
                </div>
        @endforeach
    </div>
    {{-- -----一覧表示部分--------- --}}

</body>
</html>
