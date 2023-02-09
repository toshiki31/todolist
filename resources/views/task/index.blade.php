<!-- resources/views/task/index.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <div class="flex justify-between">
        <h2 class="mr-3 px-2 py-2 font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Todolist Index') }}
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
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">Todolists</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tasks as $task)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  <div class="flex justify-between">
                    <a href="{{ route('task.show',$task->id)}}">
                      <h3 class="font-bold text-lg text-grey-dark">{{$task->task}}</h3>
                    </a>
                    <!-- 更新ボタン -->
                    <!-- 削除ボタン -->
                    <!-- 達成/未達成ボタン -->
                    @if(($task->isfinished) == False)
                      <!-- 未達成ボタン ボタン -->
                      <form action="{{ route('accomplish.show', $task->id) }}" method="GET" class="text-left">
                        @csrf
                        <button type="submit" class="bg-yellow-300 font-medium text-sm text-white mx-2 py-1 px-2 w-28 rounded-full">
                          未達成
                        </button>
                      </form>
                    @else
                      <!-- 達成 ボタン -->
                        <form action="{{ route('accomplish.show', $task->id) }}" method="GET" class="text-left">
                          @csrf
                          <button type="submit" class="bg-yellow-400 font-medium text-sm text-brack mx-2 py-1 px-2 w-28 rounded-full">
                            達成済み
                          </button>
                        </form>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    

  </div>
</x-app-layout>

