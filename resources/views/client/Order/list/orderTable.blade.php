 @extends('client.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Orders  </h1>
          <p>Table to display Order details </p>
        </div>
        <a href="{{route('client.orders.new')}}">
         <button type="submit" class=" btn btn-primary">
           NEW
         </button>
         </a>
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
                      <th>Completion Date</th>
                      <th>Completion Time</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$order->created_at}}</td>
                      <td>{{$order->status_name}}</td>
                      <td>{{$order->unitorder->expected_completion_date}}</td>
                      <td>{{$order->unitorder->expected_completion_time}}</td>
                       @if($order->status_name == 'NEW')
                       <td><a href="{{route('client.orders.edit', $order->order_id)}}"><button class=" btn btn-primary">EDIT</button></a>
                        <a href="{{route('client.orders.delete', $order->order_id)}}"><button class=" btn btn-danger">DELETE</button></a></td>
                        @elseif($order->status_name == 'UNIT ACCEPTED')
                        <td>
                          <a href="{{route('client.orders.accept', $order->order_id)}}"><button class=" btn btn-primary">ACCEPT</button></a>
                          <a href="{{route('client.orders.reject', $order->order_id)}}"><button class=" btn btn-danger">REJECT</button></a>
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
    