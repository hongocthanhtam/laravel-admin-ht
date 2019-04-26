@if(Session::has('loginsuccess'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <p>{{ Session::get('loginsuccess') }}</p>
</div>
@endif
@if(Session::has('change_pass_success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <p class="text-white">{{ Session::get('change_pass_success') }}</p>
</div>
@endif
@if(Session::has('havelogin'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <p>{{ Session::get('havelogin') }}</p>
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
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#"><i class="fa fa-file"></i></a> -->
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="#"><i class="fa fa-bell"></i></a> -->
                </li>
            </ul>
            <div class="float-right mt-3">
                <a href="{{route('logout')}}" class="btn btn-default btn-sm text-right">
                    <span class="glyphicon glyphicon-log-out"></span> Log out
                </a>
            </div>
            <div class="float-right mt-4 mr-3">
                Hello <span class="font-weight-bold">{{Auth::user()->username}}</span>
            </div>
        </div>
    </div>
</nav>