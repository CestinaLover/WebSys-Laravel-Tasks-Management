<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<nav>
    <a href="{{ route('home') }}">Home</a> |
    <a href="{{ route('tasks') }}">Task List</a> |
    <a href="{{ route('profile') }}">Profile</a> |
    <a href="{{ route('about') }}">About</a>
</nav>

<h1>User Profile</h1>

@if ($user)
    <p>Username: {{ $user->username }}</p>
    <p>Full Name: {{ $user->full_name }}</p>
    <p>Email: {{ $user->email }}</p>
@else
    <p>No user found.</p>
@endif

</body>
</html>
