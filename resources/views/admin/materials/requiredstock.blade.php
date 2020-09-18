 @extends('admin.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Purchse   </h1>
          <p>Table to display purchse  details </p>
          
        </div>
 
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
                      <th>Material Name</th>
                      <th>Current stock</th>
                      <th>Required </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($stockdetails as $stockdetail)
                      <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$stockdetail->material_name}} </td>
                      <td>{{$stockdetail->available_stock}} </td>
                      <td>{{$stockdetail->required_stock}} </td>
                       <td><a href="{{route('admin.materials.stock.edit', $stockdetail->material_id)}}"><button class=" btn btn-primary">ADD STOCK</button></a>
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