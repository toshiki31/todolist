<!-- resources/views/task/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="mr-3 px-2 py-2 font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mypage') }}
        </h2>
        <a href="{{ route('task.create') }}">
            <svg class="mr-3 h-10 w-10 text-yellow-400"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
            </svg>
        </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2">
            <div id="graph" class="flex justify-center">
                <canvas id='canvas' width="500" height="400" data="good"></canvas>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="py-2">
                    {{'あなたが達成したタスク'}}
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">{{$sum}}個</h2>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-2">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="py-2">
                    {{'あなたは...'}}
                    <h2 class="font-bold text-xl text-gray-800 leading-tight">{{$phrase}}</h2>
                </div>
            </div>
        </div>

        

    </div>
  </div>
  <script>
        // 受け取った変数をjsに渡す
        // コミットの数（仮置き）
        const num = `{{ $count }}`;
        // サイクルの状態（仮置き）
        const cicle_state = `{{ $cicle_state }}`;
    </script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/graph.js') }}"></script>
</x-app-layout>

