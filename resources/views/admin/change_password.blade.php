@extends('admin.master')
@section('content')
    @if(Session::has('change_pass_fail'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        <p>{{ Session::get('change_pass_fail') }}</p>
    </div>
    @endif
    <div class="container">
        <div class="float-center">
            <h3 for="change_password">Change Password Form</h3>
        </div>
        <br>
        <br>
        <form action="{{ route('change_password/change') }}" method="POST" class="float-center">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="current_password" class="float-left">Current Password</label>
                <input type="password" name="current_password" class="form-control" placeholder="Enter your current password">
            </div>
            <div class="form-group">
                <label for="new_password" class="float-left">New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="Enter your new password">
            </div>
            <div class="form-group">
                <label for="confirm_new_password" class="float-left">Confirm New Password</label>
                <input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm new password">
            </div>
            <button type="submit" class="btn btn-primary float-right">Change password</button>
        </form>
    </div>
@endsection