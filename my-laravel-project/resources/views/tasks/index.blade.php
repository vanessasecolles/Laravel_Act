<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1, h2 {
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .task {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .task.pending {
            background: #fff;
        }
        .task.completed {
            background: #e0f7fa; /* Light Blue for Completed Tasks */
            text-decoration: line-through; /* Cross out completed tasks */
        }
        .task span {
            font-size: 18px;
        }
        .buttons {
            display: flex;
            gap: 5px;
        }
        button, a {
            text-decoration: none;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .edit {
            background-color: #fbc02d;
            color: white;
        }
        .toggle {
            background-color: #0288d1;
            color: white;
        }
        .delete {
            background-color: #d32f2f;
            color: white;
        }
        .success {
            text-align: center;
            color: green;
            font-weight: bold;
        }
        .divider {
            border-bottom: 2px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="{{ route('tasks.create') }}" class="toggle">+ Create a New Task</a>
    <br><br>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <h1>Task List</h1>

    <!-- Pending Tasks Section -->
    <h2>⏳ Pending Tasks</h2>
    @foreach ($tasks as $task)
        @if (!$task->is_completed)
            <div class="task pending">
                <span>{{ $task->title }} - ⏳ Pending</span>
                <div class="buttons">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="edit">Edit</a>
                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="toggle">Mark as Completed</button>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach

    <div class="divider"></div>

    <!-- Completed Tasks Section -->
    <h2>✅ Completed Tasks</h2>
    @foreach ($tasks as $task)
        @if ($task->is_completed)
            <div class="task completed">
                <span>{{ $task->title }} - ✅ Completed</span>
                <div class="buttons">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="edit">Edit</a>
                    <form action="{{ route('tasks.toggle', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="toggle">Mark as Pending</button>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </div>
            </div>
        @endif
    @endforeach
</div>

</body>
</html>
