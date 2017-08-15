@extends('welcome')

@section('content')
    <h1>Change Password</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="/change-password" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="oldPassword">Old password</label>
                    <input type="password" id="oldPassword" name="oldPassword" class="form-control">
                </div>
                <div class="form-group">
                    <label for="newPassword">New password</label>
                    <input type="password" id="newPassword" name="newPassword" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Change password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection