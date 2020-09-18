   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Varient Edit Form</h1>
        </div>
      </div>
       <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit Varient</h3>
            <div class="tile-body">
              <form action="{{route('admin.materials.varient.update',$id)}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Name</label>
                   <select name="varient" class="form-control varientSwitch">
                    @foreach($materialproducts as $materialproduct)
                    @foreach($productvarients as $productvarient)
                    @if($materialproduct->varient_id ==  $productvarient->varient_id)
                    <option value="{{$productvarient->varient_id}}" selected="">{{$productvarient->colour}}</option>
                    @else
                    <option value="{{$productvarient->varient_id}}" >{{$productvarient->colour}}</option>
                    @endif
                    @endforeach
                    @endforeach
                  </select>
                  <label class="control-label">Required Size</label>
                  <input class="form-control" type="text" value="{{$materialproduct->required_size}}" name="requiredsize" ><br>
                   </div>
                </div>
                <input type="submit" class="btn btn-primary" value="SAVE" >
              </form>
            </div>
            <div class="tile-footer">
             </div>
          </div>
        </div>
         <div class="clearix"></div>
       </div> 
       @endsection