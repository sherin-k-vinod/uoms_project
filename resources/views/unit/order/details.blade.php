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
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$order->created_at}}</td>
                       <td>{{$order->status_name}}</td>
                         <td><a href="{{route('unit.order.details', $order->order_id)}}"><button class=" btn btn-primary">DETAILS</button></a>
                         @if($order->status_name == 'NEW')
                        <a href="{{route('unit.order.reject', $order->order_id)}}"><button class=" btn btn-secondary">REJECT</button></a>
                         @endif
                          @if($order->status == 6)
                          <a href="{{route('unit.order.material', $order->order_id)}}"><button class=" btn btn-secondary">MATERISL RECIEVED</button></a>
                          @endif
                          @if($order->status_name == 'MATERIAL RECIEVED')
                          <a href="{{route('unit.order.work', $order->order_id)}}"><button class=" btn btn-secondary">START WORK</button></a>
                          @endif                          
                          @if($order->status_name == 'WORK STARTED')
                          <a href="{{route('unit.order.quality', $order->order_id)}}"><button class=" btn btn-secondary">QUALITY CHECK</button></a>
                          @endif
                          @if($order->status_name == 'QUALITY OK')
                          <a href="{{route('unit.order.request.payment', $order->order_id)}}"><button class=" btn btn-secondary">REQUEST PAYMENT</button></a>
                          @endif                          
                          @if($order->status_name == 'PAYMENT RECIEVED')
                          <a href="{{route('unit.order.dispatch.uniform', $order->order_id)}}"><button class=" btn btn-secondary">DISPATCH UNIFORMS</button></a>
                          @endif
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
    @endsection 