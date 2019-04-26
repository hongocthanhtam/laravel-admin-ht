  @if(Session::has('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <p>{{ Session::get('success') }}</p>
      </div>
  @endif
    <div class="mt-5">
      <a href="{{route('service_category/create')}}"><button class="btn btn-success float-left mb-4">Add new</button></a>
    </div>
    <div class="float-right mr-2">
      <div class="pull-right notify">
        <div class="input-group row" id="adv-search">
          <input type="hidden" id="xoa" name="xoa">
          <input type="text" class="form-control" id="search"
          value="{{ request()->session()->get('search') }}"
          onkeydown="if (event.keyCode == 13) ajaxLoad('{{route('service_category')}}?search='+this.value)"
          placeholder="Search" name="search"
          type="text" id="search"/>
            <div class="input-group-btn">
                <div class="btn-group" role="group">`
                    <div class="dropdown dropdown-lg">
                      <button data-toggle="dropdown" type="submit" class="btn btn-warning dropdown-toggle"
                      onclick="ajaxLoad('{{route('service_category')}}?search='+$('#xoa').val())">
                          <i class="fa fa-arrow-left " aria-hidden="true"></i>
                      </button>
                      <button type="submit" class="btn btn-primary"
                      onclick="ajaxLoad('{{route('service_category')}}?search='+$('#search').val())">
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
      <th style="width: 4%">No.</th>
      <th style="width: 14%">Name</th>
      <th style="width: 46%">Content</th>
      <th style="width: 13%">Category Name</th>
      <th style="width: 15%">Image</th>
      <th style="width: 8%">Action</th>
    </tr>
    </thead>
    <tbody>
      <?php 
        $count=1;
        foreach($service_categories as $category):
      ?>
      <tr>
        <td>{{ $count}}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->content }}</td>
        <td>{{ isset( $category->service->name ) ? $category->service->name : 'No category' }}</td>
        <td> <img src="{{ asset('uploads/'.$category->image) }}" width="200" heigh="100"/> </td>
        <td>
          <a href="{{route('service_category/show',['id'=>$category->id])}}">
              <span class='glyphicon glyphicon-eye-open'></span>
          </a>
          <a href="{{route('service_category/edit',['id'=>$category->id])}}">
              <span class='glyphicon glyphicon-pencil'></span>
          </a>
          <a href="{{route('service_category/destroy',['id'=>$category->id])}}">
              <span class='glyphicon glyphicon-trash'></span>
          </a>
      </td>
      </tr>
      <?php $count++;?>
    <?php endforeach;?>
    </tbody>
  </table>
  <div>{{ $service_categories->links()}}</div>