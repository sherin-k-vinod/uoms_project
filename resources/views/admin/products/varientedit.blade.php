   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Edit Varient </h1>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit Varient</h3>
            <div class="tile-body">
              <form action="{{route('admin.product.varient.update')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Colour</label>
                  <input class="form-control" type="text" placeholder="Enter colour" name="colour" value="{{$varient->colour}}"  ><br>
                  <label class="control-label">Prize</label>
                  <input class="form-control" type="text" placeholder="Enter prize"   name="prize" value="{{$varient->prize}}"><br>
                </div>
                </div>
                <input type="hidden" name="product_id" value="{{$varient->product_id}}">
                <input type="hidden" name="varient_id" value="{{$varient->varient_id}}">
                <input type="submit" class="btn btn-primary" value="SAVE">
              </form>
            </div>
            <div class="tile-footer">
            </div>
          </div>
        </div>
        
        <div class="clearix"></div>
 
      </div> 
      @endsection