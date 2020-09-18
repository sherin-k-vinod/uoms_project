 @extends('admin.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Varients  </h1>
          <p>Table to display varient details </p>
        </div>
        <a href="{{route('admin.product.varient.new', $id)}}">
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
                      <th>Colour</th>
                      <th>Prize</th>
                      <!-- <th>Age</th> -->
                      <!-- <th>Start date</th> -->
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($varients as $varient)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$varient->colour}}</td>
                      <td>{{$varient->prize}}</td>
                      <!-- <td>61</td> -->
                      <!-- <td>2011/04/25</td> -->
                      <td><a href="{{route('admin.product.varient.edit', $varient->varient_id)}}"><button class=" btn btn-primary">EDIT</button></a>
                        <a href="{{route('admin.product.varient.delete', $varient->varient_id)}}"><button class=" btn btn-danger">DELETE</button></a></td>
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
    