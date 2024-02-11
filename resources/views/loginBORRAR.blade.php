<div>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="username">User</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Enter</button>
                <a href="#" class="btn btn-secondary">New user</a>
                {{-- <a href="{{ route('register') }}" class="btn btn-secondary">New user</a> --}}
            </div>
        </form>
    </div>
</div>
