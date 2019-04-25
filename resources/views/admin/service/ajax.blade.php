@if(Session::has('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <p>{{ Session::get('success') }}</p>
      </div>
  @endif
    <a href="{{route('index')}}"><strong>Home</strong></a>
    <i class="fas fa-arrow-right"></i>
    <a href="{{route('service')}}">Service</a>
    <div class="mt-5">
      <a href="{{route('service/create')}}"><button class="btn btn-success float-left mb-4">Add new</button></a>
    </div>
    <div class="float-right mr-2">
      <div class="pull-right notify">
        <div class="input-group row" id="adv-search">
          <input type="hidden" id="xoa" name="xoa">
          <input type="text" class="form-control" id="search"
          value="{{ request()->session()->get('search') }}"
          onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('admin/service')}}?search='+this.value)"
          placeholder="Search" name="search"
          type="text" id="search"/>
            <div class="input-group-btn">
                <div class="btn-group" role="group">`
                    <div class="dropdown dropdown-lg">
                      <button data-toggle="dropdown" type="submit" class="btn btn-warning dropdown-toggle"
                      onclick="ajaxLoad('{{url('admin/service')}}?search='+$('#xoa').val())">
                          <i class="fa fa-arrow-left " aria-hidden="true"></i>
                      </button>
                      <button type="submit" class="btn btn-primary"
                      onclick="ajaxLoad('{{url('admin/service')}}?search='+$('#search').val())">
                          <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                    </div>
                </div>
            </div>
        </div>
      </div>
  </div>
  <table class="table table-bordered">
    <thead>
    <tr class="table table-success text-white">
      <th scope="col">No.</th>
      <th>Name</th>
      <th>Content</th>
      <th>Icon</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <?php
        $count=1;
        foreach($services as $service):?>
      <tr>
        <td scope="row">{{ $count }}</td>
        <td>{{ $service->name }}</td>
        <td>{{ $service->content }}</td>
        <td><span class="{{ $service->icon }}"></span></td>
        <td>
          <a href="{{route('service/show',['id'=>$service->id])}}">
              <span class='glyphicon glyphicon-eye-open'></span>
          </a>
          <a href="{{route('service/edit',['id'=>$service->id])}}">
              <span class='glyphicon glyphicon-pencil'></span>
          </a>
          <a href="{{route('service/destroy',['id'=>$service->id])}}">
              <span class='glyphicon glyphicon-trash'></span>
          </a>
      </td>
      </tr>
    <?php
      $count++;
      endforeach;
    ?>
    </tbody>
  </table>
  <div>{{ $services->links()}}</div>