   @extends('admin.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Product Form</h1>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit Product</h3>
            <div class="tile-body">
              <form action="{{route('admin.product.update')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Name</label>
                  <input class="form-control" type="text" placeholder="Enter name" value="{{$product->name}}" name="name"><br>

                  <label class="control-label">Gender </label><br>
                  @if($product->gender == 1)
                  <input  type="radio" value="1" name="gender" class="form-check-input" checked>
                  <label for="male">Male</label><br>
                  <input  type="radio" value="0" name="gender" class="form-check-input" >
                  <label for="Female">Female</label><br><br>
                   @else
                  <input  type="radio" value="1" name="gender" class="form-check-input" >
                  <label for="male">Male</label><br>
                  <input  type="radio" value="0" name="gender" class="form-check-input" checked>
                  <label for="Female">Female</label><br><br>
                  @endif
                  <label class="control-label">Size</label>
                  <input class="form-control" type="number" placeholder="Enter Size" min="38" max="48" name="size" value="{{$product->size}}"><br>
                </div>
                </div>
                <input type="hidden" name="product_id" value="{{$product->product_id}}">
                <input type="submit" class="btn btn-primary" value="SAVE">
              </form>
            </div>
            <div class="tile-footer">
              
          
            
         <!-- </button> -->
         <!-- </a> -->
            </div>
          </div>
        </div>
        
        <div class="clearix"></div>
 
      </div> 
      @endsection