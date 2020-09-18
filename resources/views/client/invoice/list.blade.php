  @extends('client.layout.master')
 @section('content')
    
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> INVOICES  </h1>
          <p>Table to display invoice details </p>
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
                    @foreach($invoices as $invoice)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$invoice->created_at}}</td>
                      <td>{{$invoice->client_status_name}}</td>
                      <td><a href="{{route('client.invoice.details',$invoice->invoice_id)}}"><button class=" btn btn-primary">DETAILS</button></a>
                      @if($invoice->client_status_name == 'INVOICE RECIEVED')
                      <a href="{{route('client.invoice.make.payment',$invoice->invoice_id)}}"><button class=" btn btn-secondary">MAKE PAYMENT</button></a>
                      @endif                      
                      @if($invoice->status_name == 'PAYMENT SEND TO UNIT')
                      <a href="#"><button class=" btn btn-info">SEND INVOICE</button></a>
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