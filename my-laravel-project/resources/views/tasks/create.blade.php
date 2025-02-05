<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
</head>
<body>
    <h1>Create a New Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br><br>

        <label for="is_completed">Completed:</label>
        <select id="is_completed" name="is_completed">
            <option value="0">Pending</option>
            <option value="1">Completed</option>
        </select><br><br>

        <button type="submit">Create Task</button>
    </form>
</body>
</html>
