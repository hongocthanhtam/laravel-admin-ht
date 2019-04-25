<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('css/lg-style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="login-page">
  <div class="form">
    <form action="{{ route('register/store') }}" method="POST" class="register-form">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <label for="username">Username</label>
      <input type="text" name="username" placeholder="Enter your username" value="{{ old('username') }}"/>
        @if($errors->has('username'))
            <div class="alert alert-danger alert-block">
              <span type="button" class="close" data-dismiss="alert">×</span>	
                {{ $errors->first('username') }}
            </div>
        @endif
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="Enter your password" value="{{ old('password') }}"/>
        @if($errors->has('password'))
            <div class="alert alert-danger alert-block">
              <span type="button" class="close" data-dismiss="alert">×</span>
                {{ $errors->first('password') }}
            </div>
        @endif
      <label for="confirm-password">Confirm password</label>
      <input type="password" name="confirm_password" placeholder="Enter your confirm password" value="{{ old('confirm_password') }}"/>
         @if($errors->has('confirm_password'))
            <div class="alert alert-danger alert-block">
              <span type="button" class="close" data-dismiss="alert">×</span>
                {{ $errors->first('confirm_password') }}
            </div>
        @endif
      <label for="email">Email</label>
      <input type="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}"/>
        @if($errors->has('email'))
            <div class="alert alert-danger alert-block">
              <span type="button" class="close" data-dismiss="alert">×</span>
                {{ $errors->first('email') }}
            </div>
        @endif
      <button type="submit">Create</button>
      <p class="message">You have an Account ?<a href="{{ route('login') }}">Sign in</a></p>
    </form>
  </div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="{{asset('js/lg-js.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>