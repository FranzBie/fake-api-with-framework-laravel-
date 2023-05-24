<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("EDIT STUDENT") }}
                </div>
                <hr>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('update.student', $student->id) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block">Name</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ $student->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="course" class="block">Course</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="course" type="text" name="course" value="{{ $student->course }}">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="dark:bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"  type="submit">
                                Update Student
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
