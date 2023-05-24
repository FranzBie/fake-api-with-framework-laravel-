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
                    {{ __("ADD FORM") }}
                </div>
                <hr>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('add.student')}}" method="POST">
                        @csrf
                        {{-- name and course --}}
                        <div class="mb-4">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-4">
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="course" type="text" placeholder="Course"value="{{ old('course') }}">
                        </div>
                        {{-- Button --}}
                        <div class="flex items-center justify-between">
                            <button class="dark:bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
                                Add Student
                            </button>
                        </div>
                    </form>
                    <br>
                    <hr>
                    {{-- Table --}}
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Course</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">
                            @foreach ($students as $student)
                            <tr>
                                <td class="px-4 py-2">{{ $student->id }}</td>
                                <td class="px-4 py-2">{{ $student->name }}</td>
                                <td class="px-4 py-2">{{ $student->course }}</td>
                                {{--UPDATE DELETE --}}
                                <td class="px-4 py-2">
                                    <div class="flex">
                                        <a href="{{ route('edit.student', ['id' => Crypt::encryptString($student->id)]) }}" class="dark:bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-2">Edit</a>

                                        <form action="{{ route('delete.student', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dark:bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
                                        </form>
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

