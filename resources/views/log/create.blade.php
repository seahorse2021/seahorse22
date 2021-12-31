{{-- ヘッダー要素・コンポーネント ⏬⏬--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create') }}
        </h2>
    </x-slot>
{{-- ヘッダー要素・コンポーネント ⏫⏫--}}

    {{-- ------新規ログの入力画面------- --}}
    <h1>create log</h1>
    {{-- ログ一覧に戻るボタン --}}
    <a href="{{ route('log.index') }}">back</a>

    {{-- ------入力フォーム-------------- --}}
    <form action="{{ route('log.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <th>date</th>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
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
                <th>time</th>
                <td><input type="number" value="50" name="dive_time"></td>
            </tr>
            <tr>
                <th>temp</th>
                <td><input type="number" value="20" name="temp"></td>
            </tr>
            <tr>
                <th>comment</th>
                <td>
                    <textarea name="message"></textarea>
                </td>
            </tr>
        </table>

        <button>create</button>
    </form>
    {{-- ------入力フォームここまで-------------- --}}

</x-app-layout>
