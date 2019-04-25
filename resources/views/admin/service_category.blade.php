@extends('admin.master')
@section('content')
  <div id="content">
  @include('admin.service_category.ajax')
  </div>
  <div class="loading">
  <span>Loading...</span>
  </div>
@endsection