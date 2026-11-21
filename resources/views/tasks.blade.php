<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<nav>
    <a href="{{ route('home') }}">Home</a> |
    <a href="{{ route('tasks') }}">Task List</a> |
    <a href="{{ route('profile') }}">Profile</a> |
    <a href="{{ route('about') }}">About</a>
</nav>

<h1>All Tasks</h1>

<table border="1" cellpadding="8">
    <tr>
        <th>Task</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    @forelse ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ ucfirst($task->status) }}</td>
            <td>{{ $task->task_date->format('Y-m-d') }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="3">No tasks found.</td>
        </tr>
    @endforelse
</table>

</body>
</html>
