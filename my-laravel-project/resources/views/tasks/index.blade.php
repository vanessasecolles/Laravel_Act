<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    
    <a href="{{ route('tasks.create') }}">Create a New Task</a>
    <br><br>

    <h1>Task List</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }} - {{ $task->is_completed ? 'Completed' : 'Pending' }}</li>
        @endforeach
    </ul>
</body>
</html>
