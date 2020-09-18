 @extends('admin.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Materials</h1>
          <p>Table to display Materials details </p>
        </div>
<!--          <a href="">
          <i class="fa fa-lg fa-plus"></i>
            NEW
         </button>
         </a> -->
         <a class="btn btn-primary icon-btn" href="{{route('admin.materials.form')}}"><i class="fa fa-plus"></i>Add Item </a>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Materials Name</th>
                      <th>Size</th>
                      <th>Status</th>
                      <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($materials as $material)
                     <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$material->name}}</td>
                      <td>{{$material->available_stock}}</td>
                      @if($material->available_stock > 0)
                      <td>AVAILABLE</td>
                      @else
                      <td>UNAVAILABLE</td>
                      @endif
                      <td><a class="btn btn-primary" href="{{route('admin.materials.edit', $material->material_id)}}"><i class="fa fa-lg fa-edit"></i>EDIT</a> 
                        <a class="btn btn-secondary" href="{{route('admin.materials.delete', $material->material_id)}}"><i class="fa fa-lg fa-trash"></i>DELETE</a>
                         <a href="{{route('admin.materials.varient.list', $material->material_id)}}"><button class=" btn btn-info">PRODUCTS</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
    