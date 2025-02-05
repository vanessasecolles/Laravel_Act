<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $task->title }}" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $task->description }}</textarea><br><br>

        <label for="is_completed">Completed:</label>
        <select id="is_completed" name="is_completed">
            <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Pending</option>
            <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Completed</option>
        </select><br><br>

        <button type="submit">Update Task</button>
    </form>
</body>
</html>
