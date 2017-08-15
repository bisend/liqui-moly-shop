@extends('welcome')

@section('content')
    <h1>Register</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="/register" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <span style="color: red;">{{ $errors->first('email')}}</span>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <span style="color: red;">{{ $errors->first('password')}}</span>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Password confirm:</label>
                    <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection