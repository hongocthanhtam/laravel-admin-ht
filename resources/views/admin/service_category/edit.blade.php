@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Edit Service Categorie Type</h1>
        <h4>Edit Form</h4>
        <?php foreach($service_categories as $service_category):?>
        <form class="mt-5" action="{{route('service_category/update',['id'=>$service_category->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="name" value="{{$service_category->name}}">
                @if($errors->has('name'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" rows="3">{{$service_category->content}}</textarea>
                @if($errors->has('content'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="image-current">Image current</label>
                <div>
                    <img src="{{asset('uploads/'.$service_category->image)}}" width="200" heigh="100"/>
                </div>
                <p><strong>Warning:</strong>If you want change this image, you can choose upload file bellow:</p>
            </div>
            <div class="form-group">
                <label>Service category type:</label>
                <select class="form-control" name="service_category" style="height:35px">
                    <?php foreach($services as $service):?>
                        <option value="{{$service->id}}"<?php echo old('service_category', $service->id) == $service_category->service_id ? 'selected' : '' ?>>{{$service->name}}</option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" placeholder="Enter your change place holder">
            </div>
            @if(Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            <?php endforeach;?>
            <button type="submit" class="btn btn-primary float-right">Edit</button>
            <a href="{{ route('service_category') }}" class="btn btn-info float-left">Back</a>
        </form>
    </div>
@endsection