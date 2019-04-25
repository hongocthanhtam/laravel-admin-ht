@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Show Service Type</h1>
        <h4>Show Form</h4>
        <form class="mt-5">
            <?php foreach($services as $service):?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{$service->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" rows="3" disabled>{{$service->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <div>
                    <span class="{{$service->icon}}"></span>
                </div>
            </div>
            <a href="{{ route('service') }}" class="btn btn-info float-right">Back</a>
            <?php endforeach;?>
        </form>
    </div>
@endsection