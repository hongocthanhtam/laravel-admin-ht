@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Create Service Type</h1>
        <h4>Create Form</h4>
        <form class="mt-5" action="{{route('service/store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="icon">Add Icon</label>
                <input type="text" class="form-control" name="icon" value="{{old('icon')}}" placeholder="Enter your icon">
                <p><strong>Note:</strong>If you forgot you can click&nbsp;<strong><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Here</a></strong></p>
                @if($errors->has('icon'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('icon') }}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary float-right">Create</button>
            <a href="{{ route('service') }}" class="btn btn-info float-left">Back</a>
        </form>
    </div>
@endsection