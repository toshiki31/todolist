<!-- resources/views/task/create.blade.php -->

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Task') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form class="mb-6" action="{{ route('task.store') }}" method="POST">
            @csrf
            <!-- Task -->
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="task">Task</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="task" id="task">
            </div>
            <!-- Comment -->
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="comment">Comment</label>
              <input class="border py-2 px-3 text-grey-darkest" type="text" name="comment" id="comment">
            </div>
            <!-- Seriousness -->            
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="seriousness">Seriousness</label>
              <div class="flex justify-between">
                <div class="flex items-center mr-4">
                  <input id="seriousness-radio" type="radio" value="High" name="seriousness" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="seriousness-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">High</label>
                </div>
                <div class="flex items-center mr-4">
                  <input id="seriousness-2-radio" type="radio" value="Medium" name="seriousness" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="seriousness-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Medium</label>
                </div>
                <div class="flex items-center mr-4">
                  <input id="seriousness-3-radio" type="radio" value="Low" name="seriousness" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="seriousness-3-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Low</label>
                </div>
              </div>
            </div>
            <!-- Urgency -->            
            <div class="flex flex-col mb-4">
              <label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="Urgency">Urgency</label>
              <div class="flex justify-between">
                <div class="flex items-center mr-4">
                  <input id="urgency-radio" type="radio" value="High" name="urgency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="urgency-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">High</label>
                </div>
                <div class="flex items-center mr-4">
                  <input id="urgency-2-radio" type="radio" value="Medium" name="urgency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="urgency-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Medium</label>
                </div>
                <div class="flex items-center mr-4">
                  <input id="urgency-3-radio" type="radio" value="Low" name="urgency" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="urgency-3-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Low</label>
                </div>
              </div>
            </div>
            <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
              Create
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

