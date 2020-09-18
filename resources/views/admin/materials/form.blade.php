   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Material Form</h1>
        </div>
      </div>
       <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">New Material</h3>
            <div class="tile-body">
              <form action="{{route('admin.materials.new')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Material name" name="materialName"  ><br>
                  <label class="control-label">Available Stock</label>
                  <input class="form-control" type="text" placeholder="Enter Stock" name="availableStock"><br>
                   </div>
                </div>
                <input type="submit" class="btn btn-primary" value="SAVE" token="{{csrf_token()}}" fetch="{{route('client.orders.fetch.variants')}}">
              </form>
            </div>
            <div class="tile-footer">
             </div>
          </div>
        </div>
         <div class="clearix"></div>
       </div> 
       @endsection