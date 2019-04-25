@if(Session::has('loginsuccess'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <p>{{ Session::get('loginsuccess') }}</p>
</div>
@endif
@if(Session::has('change_pass_success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <p>{{ Session::get('change_pass_success') }}</p>
</div>
@endif
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
        <h3>Welcome to My admin dashboard</h3>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item active"> -->
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-file"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Hello <span class="font-weight-bold">{{Auth::user()->username}}</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('change_password') }}">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>