@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Show User Type</h1>
        <h4>Show Form</h4>
        <form class="mt-5">
            <?php foreach($users as $user):?>
            <div class="form-group">
                <label for="title">Username</label>
                <input type="text" class="form-control" value="{{$user->username}}" disabled>
            </div>
            <div class="form-group">
                <label for="content">Email</label>
                <input type="text" class="form-control" value="{{$user->email}}" disabled>
            </div>
            <?php endforeach;?>
            <a href="{{ route('user') }}" class="btn btn-info float-right">Back</a>
        </form>
    </div>
@endsection