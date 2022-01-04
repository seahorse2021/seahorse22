{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- ------新規ログの入力画面------- --}}

    {{-- ------入力フォーム-------------- --}}
    <div class="flex justify-center">
    <div class="px-2 mx-2 my-4 rounded-lg shadow-lg bg-white max-w-sm w-full">
    <form action="{{ route('log.store') }}" method="POST">
        @csrf
        <table class="mt-2">
            <tr>
                {{-- 日付 --}}
                <th>date</th>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                {{-- 潜った場所 --}}
                <th>dive site</th>
                <td>
                    <select name="dive_site">
                        <option disabled selected value>ポイントを選択</option>
                        <option value="志賀島 白瀬">志賀島 白瀬</option>
                        <option value="志賀島 黒瀬">志賀島 黒瀬</option>
                        <option value="長崎 辰ノ口">長崎 辰ノ口</option>
                        <option value="唐津 KMSC前">唐津 KMSC前</option>
                        <option value="呼子 家康">呼子 家康</option>
                    </select>
                </td>
            </tr>
            <tr>
                {{-- 水温 --}}
                <th>temp</th>
                <td><input type="number" value="20"  min="0" name="temp"></td>
            </tr>
            <input type="hidden" name="add_dive" id="add_dive" value="2">
            <tr>
                {{-- 潜った時間 --}}
                <th>time(first dive)</th>
                <td><input type="number" value="50" min="0" name="dive_time"></td>
            </tr>
            <tr id="secound_dive">
                {{-- 2本目潜った時間 --}}
                <th>time(second dive)</th>
                <td><input type="number" value="50" min="0" name="dive_time2"></td>
            </tr>
            {{-- コメント --}}
            <tr>
                <th>comment</th>
                <td>
                    <textarea name="message"></textarea>
                </td>
            </tr>
        </table>

        {{-- 1ダイブのみに切り替えるチェックボックス --}}
<div class="flex flex-col justify-center items-center">
    <label><input type="checkbox" id="one_dive">1ダイブのみ</label>
    <x-button class="my-3">登録</x-button>
</div>
    </form>

    {{-- ログ一覧に戻るボタン --}}
    <!-- <a href="{{ route('log.index') }}">back</a> -->

    </div>
</div>

    {{-- ------入力フォームここまで-------------- --}}

    <!-- jquery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>

        //1ダイブのみに切り替え
        $('#one_dive').on('click',function() {
            if ( $(this).prop('checked')) {
                $('#secound_dive').hide();
                $('#add_dive').val(1);
            } else {
                $('#secound_dive').show();
                $('#add_dive').val(2);
            }
        })

    </script>
</x-app-layout>
