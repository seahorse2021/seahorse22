<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log.show</title>
</head>
<body>
    <h1>log Contents</h1>
    <a href="{{ route('log.index') }}">back</a>

    <section>
        <p>date:{{ $log->date }}</p>
        <p>dive site:{{ $log->dive_site }}</p>
        <p>dive time:{{ $log->dive_time }}min</p>
        <p>temp:{{ $log->temp }}℃</p>
        <p>message:{{ $log->message }}</p>
    </section>

    {{-- log.destroyにdeleteメソッドでlog idを送る --}}
    <form action="{{ route('log.destroy',$log->id )}}" method="post">
        @method('delete')
        @csrf
        {{-- 削除ボタン --}}
        <button type="submit">detete
        <svg class="h-4 w-4 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        </button>
    </form>
    {{-- log.destroyにdeleteメソッドでlog idを送る --}}
    <form action="{{ route('log.edit',$log->id )}}" method="get">
        @csrf
        {{-- 更新ボタン --}}
        <button type="submit">edit
        <svg class="h-4 w-4 text-gray-500"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />  <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />  <line x1="16" y1="5" x2="19" y2="8" /></svg>
        </button>
    </form>

</body>
</html>
