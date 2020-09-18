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
              <form action="{{route('admin.materials.update')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">NAME</label>
                  <input class="form-control" type="text" value="{{$materials->name}}" name="materialName"  ><br>
                  <label class="control-label">STOCK</label>
                  <input class="form-control" type="text" value="{{$materials->available_stock}}" name="availableStock"><br>
                   </div>
                </div>
                 <input type="hidden" name="material_id" value="{{$materials->material_id}}">
                <input type="submit" class="btn btn-primary" value="UPDATE">
              </form>
            </div>
            <div class="tile-footer">
             </div>
          </div>
        </div>
         <div class="clearix"></div>
       </div> 
      @endsection