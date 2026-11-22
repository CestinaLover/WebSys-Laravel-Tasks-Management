<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
</head>
<body>

@include('layouts.navbar')

<h1>Add New Task</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <p>
        <label>Task Title</label><br>
        <input type="text" name="title"
               value="{{ old('title') }}" required>
    </p>

    <p>
        <label>Status</label><br>
        <select name="status">
            <option value="pending"
                @selected(old('status') === 'pending')>
                Pending
            </option>
            <option value="done"
                @selected(old('status') === 'done')>
                Done
            </option>
        </select>
    </p>

    <p>
        <label>Task Date</label><br>
        <input type="date" name="task_date"
               value="{{ old('task_date', date('Y-m-d')) }}"
               required>
    </p>

    <button type="submit">Save Task</button>
</form>

</body>
</html>
