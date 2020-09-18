 @extends('admin.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Products</h1>
          <p>Table to display Product details </p>
        </div>
         <a href="{{route('admin.product.form')}}">
         <button type="submit" class=" btn btn-primary">
           NEW
         </button>
         </a>
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
                      <th>Product Name</th>
                      <th>Gender</th>
                      <th>Size</th>
                      <th>Actions</th>
                       <!-- <th>Start date</th> -->
                      <!-- <th>Salary</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->gender_name}}</td>
                      <td>{{$product->size}}</td>
                      <td><a href="{{route('admin.product.edit',$product->product_id)}}"><button class=" btn btn-primary">EDIT</button></a>
                        <a href="{{route('admin.product.delete',$product->product_id)}}"><button class=" btn btn-danger">DELETE</button></a>
                        <a href="{{route('admin.product.varient.list',$product->product_id)}}"><button class=" btn btn-secondary">VARIENTS</button></a>
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
    