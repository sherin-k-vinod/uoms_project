   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Varient Form</h1>
        </div>
      </div>
       <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">New Varient</h3>
            <div class="tile-body">
              <form action="{{route('admin.materials.varient.new',$id)}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Name</label>
                   <select name="varient" class="form-control varientSwitch" >
                    @foreach($productvarients as $productvarient)
                    <option value="{{$productvarient->varient_id}}">{{$productvarient->colour}}</option>
                    @endforeach
                  </select>
                  <label class="control-label">Required Size</label>
                  <input class="form-control" type="text" placeholder="Enter size" name="requiredsize"><br>
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