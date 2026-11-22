<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

@include('layouts.navbar')

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
