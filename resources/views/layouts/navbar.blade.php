<nav style="padding: 12px 0; border-bottom: 1px solid #ccc; margin-bottom: 20px;">

    <a href="{{ route('home') }}">Home</a> |
    <a href="{{ route('tasks') }}">Task List</a> |
    <a href="{{ route('profile') }}">Profile</a> |
    <a href="{{ route('about') }}">About</a>

    @auth
        | <a href="{{ route('tasks.create') }}">New Task</a>

        | Logged in as {{ Auth::user()->full_name }}

        | <form action="{{ route('logout') }}"
                method="POST"
                style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        | <a href="{{ route('login') }}">Login</a>
    @endauth

</nav>
