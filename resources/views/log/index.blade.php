<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log.index</title>
</head>
<body>
    <h1>our log</h1>
    <a href="{{ route('log.create') }}">create</a>

    <div>
        @foreach ($logs as $log)
                <a href="{{ route('log.show',$log->id) }}">
                    <div>
                        <p>{{$log->date}}</p>
                        <p>{{$log->dive_site}}</p>
                    </div>
                </a>
                <div class="flex">
                </div>
        @endforeach
    </div>

</body>
</html>
