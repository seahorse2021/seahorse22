<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log.edit</title>
</head>
<body>
    {{-- ------ログの更新（編集）画面------- --}}
    <h1>edit log</h1>
    {{-- ログ一覧に戻るボタン --}}
    <a href="{{ route('log.index') }}">back</a>

    {{-- ------入力フォーム-------------- --}}
    <form action="{{ route('log.update',$log->id) }}" method="POST">
        @method('put')
        @csrf
        <table>
            <tr>
                <th>date</th>
                <td><input type="date" name="date" value="{{ $log->date}}"></td>
            </tr>
            <tr>
                <th>dive site</th>
                <td>
                    <input type="text" name="dive_site" value="{{ $log->dive_site}}">
                </td>
            </tr>
            <tr>
                <th>time</th>
                <td><input type="number" value="50" name="dive_time" value="{{ $log->dive_time}}"></td>
            </tr>
            <tr>
                <th>temp</th>
                <td><input type="number" value="20" name="temp" value="{{ $log->temp}}"></td>
            </tr>
            <tr>
                <th>comment</th>
                <td>
                    <textarea name="message">{{ $log->message}}</textarea>
                </td>
            </tr>
        </table>

        <button>update</button>
    </form>
    {{-- ------入力フォームここまで-------------- --}}

</body>
</html>
