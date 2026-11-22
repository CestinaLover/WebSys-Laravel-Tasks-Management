<!DOCTYPE html>
<html>
<head>
    <title>Task Completed</title>
</head>
<body>

<h2>Task Completed!</h2>

<p>A task has been marked as done.</p>

<p>
    <strong>Task:</strong> {{ $task->title }}
</p>

<p>
    <strong>Status:</strong> {{ ucfirst($task->status) }}
</p>

<p>
    <strong>Task Date:</strong>
    {{ $task->task_date->format('Y-m-d') }}
</p>

<p>
    This notification was generated automatically
    by the Tasks for Today Management System.
</p>

</body>
</html>
