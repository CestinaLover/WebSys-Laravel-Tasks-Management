<!DOCTYPE html>
<html>
<head>
    <title>Tasks for Today</title>
</head>
<body>

@include('layouts.navbar')

<h1>Tasks for Today</h1>

<p>Here are the tasks scheduled for today.</p>

<ul>
    @forelse ($tasks as $task)
        <li>
            {{ $task->title }} - {{ ucfirst($task->status) }}
        </li>
    @empty
        <li>No tasks scheduled for today.</li>
    @endforelse
</ul>

</body>
</html>
