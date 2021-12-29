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

</body>
</html>
