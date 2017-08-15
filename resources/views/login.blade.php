@extends('welcome')

@section('content')
    <h1>Sign in</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="/login" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <label for="rememberMe">Remember me</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection