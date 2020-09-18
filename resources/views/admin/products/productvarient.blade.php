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
<!--               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 -->           
               <form action="{{route('admin.product.varient.save')}}" method="post" class="varient">
                @csrf
                <script src="{{asset('public/js/jquerytest.min.js')}}"></script>
                <div class="form-group">
                  <label class="control-label">Colour</label>
                  <input class="form-control" type="text" placeholder="Enter colour" name="colour"  id="colour"><br>
                  <label class="control-label">Prize</label>
                  <input class="form-control" type="text" placeholder="Enter prize"   name="prize" id="prize"><br>
                </div>
                </div>
                <input type="hidden" name="product_id" value="{{$id}}">
                <input type="submit" class="btn btn-primary" value="SAVE" id="submit">
              </form>
            </div>
            <div class="tile-footer">
            </div>
          </div>
        </div>
        
        <div class="clearix"></div>
 
      </div> 
      @endsection