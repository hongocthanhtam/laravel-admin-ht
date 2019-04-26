@extends('admin.master')
@section('content')
  @if(Session::has('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <p>{{ Session::get('success') }}</p>
      </div>
  @endif
<table class="table table-bordered">
  <thead>
    <tr class="table table-success text-white">
      <th scope="col">No.</th>
      <th>Username</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $count=1;
      foreach($users as $user):
    ?>
    <tr>
      <th scope="row">{{$count}}</th>
      <td>{{$user->username}}</td>
      <td>{{$user->email}}</td>
      <td>
        <a href="{{ route('user/show',['id'=>$user->id])}}"><span class='glyphicon glyphicon-eye-open'></span></a>
        <?php if($user->is_admin == 0):?>
          <a href="{{ route('user/destroy',['id'=>$user->id]) }}"><span class='glyphicon glyphicon-trash'></span></a>
        <?php endif;?>
      </td>
    </tr>
    <?php
      $count++;
      endforeach;
    ?>
  </tbody>
</table>
@endsection