{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Picture') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}



<div>
    {{-- 入力フォーム --}}
    <form action="{{ route('picture.update',$log->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        {{-- ファイル選択欄 --}}
        <input type="file" name="picture" id="log_picture" class="mb-12">
        {{-- プレビュー表示場所 --}}
        <img src="{{ Storage::url('uploads/no_image.png') }}" id="demo_picture" class="mb-4 h-48 object-cover">
        {{-- 登録ボタン --}}
        <x-button class="mb-12">登録</x-button>
    </form>
    <a href="{{ route('log.show',$log->id) }}"><x-button>登録終了</x-button></a>
    {{-- 入力フォームここまで --}}
</div>

    {{-- ---------写真表示部分---------------- --}}

    @foreach ($log->pictures as $picture)
        <img src="{{ Storage::url($picture->picture) }}" class="h-48 object-cover">
    @endforeach

    {{-- ---------写真表示部分ここまで---------------- --}}

<!-- jquery読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

{{-- プロフィール写真が選択されたらプレビューを表示 --}}
<script>
    $('#log_picture').on('change', function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
        $("#demo_picture").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
    });
</script>
{{-- プロフィール写真が選択されたらプレビューを表示ここまで --}}


{{-- ヘッダー要素・コンポーネント 閉じタグ⏬⏬--}}
</x-app-layout>
{{-- ヘッダー要素・コンポーネント 閉じタグ⏫⏫--}}
