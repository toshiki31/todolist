<!-- resources/views/task/show.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Task Detail') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">
            <!-- task -->
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Task</p>
              <p class="py-2 px-3 text-grey-darkest" id="task">
                {{$task->task}}
              </p>
            </div>
            <!-- comment -->
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Comment</p>
              <p class="py-2 px-3 text-grey-darkest" id="comment">
                {{$task->comment}}
              </p>
            </div>
            <!-- seriousness -->
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Seriousness</p>
              <p class="py-2 px-3 text-grey-darkest" id="seriousness">
                @if(($task->seriousness) === 1)
                  {{__('High')}}
                @elseif(($task->seriousness) === 2)
                  {{__('Medium')}}
                @else
                  {{__('Low')}}
                @endif
              </p>
            </div>
            <!-- urgency -->
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-grey-darkest">Urgency</p>
              <p class="py-2 px-3 text-grey-darkest" id="urgency">
                @if(($task->urgency) === 1)
                  {{__('High')}}
                @elseif(($task->urgency) === 2)
                  {{__('Medium')}}
                @else
                  {{__('Low')}}
                @endif
              </p>
            </div>
            <a href="{{ url()->previous() }}" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Back
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

