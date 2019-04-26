@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Show Service Category Type</h1>
        <h4>Show Form</h4>
        <form class="mt-5">
            <?php foreach($service_categories as $service_category):?>
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" value="{{$service_category->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" rows="3" disabled>{{$service_category->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Service category type</label>
                <input type="text" class="form-control" value="<?php echo isset( $service_category->service->name ) ? $service_category->service->name : 'No category'; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <div>
                    <img src="{{asset('uploads/'.$service_category->image)}}" width="200" height="100">
                </div>
            </div>
            <a href="{{ route('service_category') }}" class="btn btn-info float-right">Back</a>
            <?php endforeach;?>
        </form>
    </div>
@endsection