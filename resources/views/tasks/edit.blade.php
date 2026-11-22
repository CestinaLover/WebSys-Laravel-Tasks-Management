<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>

@include('layouts.navbar')

<h1>Edit Task</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PATCH')

    <p>
        <label>Task Title</label><br>
        <input type="text" name="title"
               value="{{ old('title', $task->title) }}" required>
    </p>

    <p>
        <label>Status</label><br>
        <select name="status">
            <option value="pending"
                @selected(old('status', $task->status) === 'pending')>
                Pending
            </option>
            <option value="done"
                @selected(old('status', $task->status) === 'done')>
                Done
            </option>
        </select>
    </p>

    <p>
        <label>Task Date</label><br>
        <input type="date" name="task_date"
               value="{{ old('task_date', $task->task_date->format('Y-m-d')) }}"
               required>
    </p>

    <button type="submit">Update Task</button>
</form>

</body>
</html>
