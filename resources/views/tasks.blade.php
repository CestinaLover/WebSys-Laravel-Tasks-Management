<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

@include('layouts.navbar')

<h1>Task List</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@auth
    <p>
        <a href="{{ route('tasks.create') }}">Add New Task</a>
    </p>
@endauth

<table border="1" cellpadding="8">
    <tr>
        <th>Title</th>
        <th>Status</th>
        <th>Date</th>

        @auth
            <th>Actions</th>
        @endauth
    </tr>

    @forelse ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ ucfirst($task->status) }}</td>
            <td>{{ $task->task_date->format('Y-m-d') }}</td>

            @auth
                <td>
                    <a href="{{ route('tasks.edit', $task) }}">
                        Edit
                    </a>

                    <form action="{{ route('tasks.destroy', $task) }}"
                          method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Archive this task?')">
                            Archive
                        </button>
                    </form>
                </td>
            @endauth
        </tr>
    @empty
        <tr>
            <td colspan="{{ auth()->check() ? 4 : 3 }}">
                No tasks found.
            </td>
        </tr>
    @endforelse
</table>

</body>
</html>
