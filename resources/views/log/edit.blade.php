{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- ------ログの更新（編集）画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <form action="{{ route('log.update',$log->id) }}" method="POST">
        @method('put')
        @csrf
        <table>
            <tr>
                {{-- 日付 --}}
                <th>date</th>
                <td><input type="date" name="date" value="{{ $log->date}}"></td>
            </tr>
            <tr>
                {{-- 潜った場所 --}}
                <th>dive site</th>
                <td>
                    <input type="text" name="dive_site" value="{{ $log->dive_site}}">
                </td>
            </tr>
            <tr>
                {{-- 水温 --}}
                <th>temp</th>
                <td><input type="number" value="20" name="temp" min="0" value="{{ $log->temp}}"></td>
            </tr>
            <tr>
                {{-- 潜った時間 --}}
                <th>time(first dive)</th>
                <td><input type="number" value="50" min="0" name="dive_time" value="{{ $log->dive_time}}"></td>
            </tr>
            @if($log->dive_time2)
            <tr>
                {{-- 潜った時間 --}}
                <th>time(second dive)</th>
                <td><input type="number" value="50" min="0" name="dive_time2" value="{{ $log->dive_time2}}"></td>
            </tr>
            @endif
            <tr>
                {{-- コメント --}}
                <th>comment</th>
                <td>
                    <textarea name="message">{{ $log->message}}</textarea>
                </td>
            </tr>
        </table>

        <x-button class="mb-12">更新</x-button>
    </form>
    {{-- ------入力フォームここまで-------------- --}}

    <x-button id="select_picture">サムネイル変更</x-button>

    <div id="thumbnail_view">
        <p>一覧画面に表示する画像を選択してください</p>
        @foreach ($log->pictures as $picture)
        <form action="{{ route('picture.change',$picture->id)}}" method="post">
            @csrf
            <button>
                <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
            </button>
        </form>
        @endforeach
    </div>

    <x-button id="delete_picture">写真を削除</x-button>

    <div id="delete_view">

        <p>削除する画像を選んでください</p>

        @foreach ($log->pictures as $picture)
        <form action="{{ route('picture.destroy',$picture->id ) }}" method="post">
            @method('DELETE')
            @csrf
            <button>
                <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
            </button>
        </form>
        @endforeach

    </div>


    {{-- 戻るボタン --}}
    <a href="{{ route('log.index') }}"><x-button>back</x-button></a>

    <!-- jquery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

        //一覧画面は消しておく
        $('#thumbnail_view').hide();
        $('#delete_view').hide();

        //サムネイル変更をクリックすると登録写真一覧を表示
        $('#select_picture').on('click',function(){
            $('#thumbnail_view').show();
        })

        //写真を削除をクリックすると登録写真一覧を表示
        $('#delete_picture').on('click',function(){
            $('#delete_view').show();
        })

    </script>



</x-app-layout>
