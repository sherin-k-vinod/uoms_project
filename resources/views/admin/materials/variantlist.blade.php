 @extends('admin.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Varients</h1>
          <p>Table to display varients suitable the material </p>
        </div>
        <a class="btn btn-primary icon-btn" href="{{route('admin.materials.varient.form',$id)}}"><i class="fa fa-plus"></i>Add Item </a>
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
                      <th>Varient  Name</th>
                      <th>Required Size</th>
                      <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($Materialproducts as $Materialproduct)
                     <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$Materialproduct->varients->colour}} </td>
                      <td>{{$Materialproduct->required_size}} </td>
                      <td><a class="btn btn-primary" href="{{route('admin.materials.varient.edit',$Materialproduct->material_product_id)}}"><i class="fa fa-lg fa-edit"></i>EDIT</a> 
                      <a class="btn btn-secondary" href="{{route('admin.materials.varient.delete',$Materialproduct->material_product_id)}}"><i class="fa fa-lg fa-trash"></i>DELETE</a>
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
    