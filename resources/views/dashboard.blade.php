<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    {{-- <a href="{{ route('log.index') }}">ログ一覧へ</a>
                    <a href="{{ route('profile.index') }}">マイプロフィール</a> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <i>
                        Comming soon...!
                    </i>
                    <br>
                    <a href="{{ route('profile.index') }}">メンバー一覧</a>
                    <br>
                    <a href="#">ダイブ本数ランキング</a>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
