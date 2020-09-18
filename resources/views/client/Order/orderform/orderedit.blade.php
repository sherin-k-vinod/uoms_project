   @extends('client.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Order Form</h1>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit Order</h3>
            <div class="tile-body">
              <form action="{{route('client.orders.update')}}" method="post">
                @csrf
                <div class="form-group">
                  <label class="control-label">Amount</label>
                  <input class="form-control" type="text" placeholder="Enter amount" value="{{$order->amount}}" name="amount"><br>
                  <input type="hidden" name="order_id" value="{{$order->order_id}}">
                  <input type="submit" name="submit" value="SAVE" class="btn btn-primary"> 
                </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">   
         </a>
            </div>
          </div>
        </div>
        
        <div class="clearix"></div>
 
      </div> 
      @endsection
      