 @extends('unit.layout.master')
 @section('content')
 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Orders  </h1>
          <p>Table to display Order details </p>
        </div>
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
                        <th>Product</th>
                        <th>Size</th>
                        <th>Variant</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($orderline as $order)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$order->product->name}}</td> 
                      <td>{{$order->product->size}}</td>
                      <td>{{$order->variant->colour}}</td>
                      <td>{{$order->quantity}}</td>
                      <td>{{$order->line_total}}</td>
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
      @if($order->unitorder->status_name == 'NEW')
       <div class="row"> 
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <form action="{{route('unit.order.accept', $order->order_id)}}" method="get">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                        <th><label>DATE</label></th>
                        <th><input type="date" name="expectedDate"></th>
                        <th><label>TIME</label></th>
                        <th><input type="time" name="expectedTime"></th>
                        <th><input type="submit" value="ACCEPT" class="btn btn-primary"></th>
                       </tr>
                  </thead>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
@endsection 