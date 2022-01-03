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
                    <p>Next dive date .... hogehoge/hoge/hoge</p>
                    <p>Last dive date .... hogehoge/hoge/hoge</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-extrabold ...">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                            <i>Comming soon...!</i>
                        </span>
                    </div>

                    {{-- <div>
                        <a href="{{ route('profile.index') }}">メンバー一覧</a>
                    </div> --}}

                    <div>
                        <a href="#">ランキング</a>
                    </div>

                    <div>
                        <a href="#">現在の水温</a>
                    </div>

                    <div>
                        <a href="#">生物図鑑</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
