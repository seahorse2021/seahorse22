<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>現在の水温 .... Comming soon...!</p>
                    <p>Next dive date .... Comming soon...!</p>
                    <p>Last dive date .... Comming soon...!</p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <div>
                        <a href="{{ route('profile.index') }}">メンバー一覧</a>
                    </div> --}}

                    <div>
                        <a href="{{ route('profile.ranking') }}" method="get">ランキング</a>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="font-extrabold ...">
                        <span class="">
                            <i>Comming soon...!</i>
                        </span>
                    </div>

                    {{-- <div>
                        <a href="{{ route('profile.index') }}">メンバー一覧</a>
                    </div> --}}

                    <div>
                        <a href="#">図鑑作成</a><br>
                        <a href="#">水温グラフ</a><br>
                        <a href="#">器材登録</a><br>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div id="canvas" style="width:200,height:100">
        <canvas id="chart"></canvas>
    </div> --}}

    <!-- jquery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Chart.js読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>

    {{-- <script src="{{ mix('js/chart.js') }}"></script> --}}

    <script>
        'use strict';

        //  var type = 'line'; //折れ線グラフ
        //  var data = {
        //     labels:['Jan','Feb','Mar','','','','','',''];

        //  }

    </script>



</x-app-layout>
