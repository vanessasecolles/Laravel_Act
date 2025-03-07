@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold text-center mb-4">Task List</h1>

        <a href="{{ url('/tasks/create') }}" class="bg-blue-500 text-white px-4 py-2 rounded block text-center mb-4">+ Create a New Task</a>

        <h2 class="text-xl font-semibold mt-6">⏳ Pending Tasks</h2>
        @foreach ($tasks as $task)
            @if (!$task->is_completed)
                <div class="flex justify-between items-center bg-gray-200 p-4 rounded-md my-2">
                    <span>{{ $task->title }}</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Mark as Completed</button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach

        <h2 class="text-xl font-semibold mt-6">✅ Completed Tasks</h2>
        @foreach ($tasks as $task)
            @if ($task->is_completed)
                <div class="flex justify-between items-center bg-green-200 p-4 rounded-md my-2">
                    <span>{{ $task->title }} - ✅ Completed</span>
                    <div class="flex space-x-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                        <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Mark as Pending</button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
