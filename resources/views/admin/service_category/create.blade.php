@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Create Service Category Type</h1>
        <h4>Create Form</h4>
        <form class="mt-5" action="{{route('service_category/store')}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Enter your title">
                @if($errors->has('name'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" placeholder="Enter your content" rows="3">{{{ old('content') }}}</textarea>
                @if($errors->has('content'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>Service category type:</label>
                <select class="form-control" name="service_category" style="height:35px">
                    <?php foreach($services as $service):?>
                        <option value="{{$service->id}}"<?php echo old('service_category', $service->id) == $service->id ? 'selected' : '' ?>>{{$service->name}}</option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" placeholder="Enter your image">
                @if($errors->has('image'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('image') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary float-right">Create</button>
            <a href="{{ route('service_category') }}" class="btn btn-info float-left">Back</a>
        </form>
    </div>
@endsection