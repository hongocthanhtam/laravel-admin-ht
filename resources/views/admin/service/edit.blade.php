@extends('admin.master')
@section('content')
    <div class="container">
        <h1 for="page-name" class="text-center">Edit Service Type</h1>
        <h4>Edit Form</h4>
        <?php foreach($services as $service):?>
        <form class="mt-5" action="{{route('service/update',['id'=>$service->id])}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="name" value="{{$service->name}}">
                @if($errors->has('name'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control" name="content" rows="3">{{$service->content}}</textarea>
                @if($errors->has('content'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="image-current">Icon Current</label>
                <span class="{{$service->icon}}"></span>
                <p><strong>Warning:</strong>If you want change this icon, you can choose upload icon bellow:</p>
            </div>
            <div class="form-group">
                <label for="icon">Change Icon</label>
                <input type="text" name="icon" class="form-control" placeholder="Change your icon">
                <p><strong>Note:</strong>If you forgot you can click&nbsp;<strong><a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Here</a></strong></p>
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <p>{{ Session::get('error') }}</p>
                    </div>
                @endif
            </div>
            <?php endforeach;?>
            <button type="submit" class="btn btn-primary float-right">Edit</button>
            <a href="{{ route('service') }}" class="btn btn-info float-left">Back</a>
        </form>
    </div>
@endsection