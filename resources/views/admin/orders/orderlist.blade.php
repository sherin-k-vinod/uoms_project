 @extends('admin.layout.master')
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
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                       <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$order->created_at}}</td>
                      <td>{{$order->lines->sum('line_total')}}</td>
                      <td style="color:blue;">{{$order->status_name}}</td>
                       @if($order->status == 0)
                      <td><a href="{{route('admin.order.accept', $order->order_id)}}"><button class=" btn btn-primary">Accept</button></a>
                      </td>
                      @elseif($order->status == 5 || $order->status == 16)
                      <td><a href="{{route('admin.materials.dispatch', $order->order_id)}}"><button class=" btn btn-primary">DISPATCH  MATERIALS</button></a>
                      </td>                      
                      @elseif($order->status == 10)
                      <td><a href="{{route('admin.order.quality.ok', $order->order_id)}}"><button class=" btn btn-primary">QUALITY OK</button></a>
                      <a href="{{route('admin.order.quality.fail', $order->order_id)}}"><button class=" btn btn-danger">QUALITY FAILED</button></a>
                      </td>
                      @elseif($order->status == 15)
                      <td><a href="{{route('admin.materials.stock.details')}}"><button class=" btn btn-primary">CHECK STOCK</button></a>
                      </td>   
                      @else
                      <td></td>
                      @endif
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