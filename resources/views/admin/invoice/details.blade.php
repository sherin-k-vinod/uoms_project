 @extends('admin.layout.master')
 @section('content')
 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> invoice details  </h1>
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
                        <th>Product</th>
                        <th>Size</th>
                        <th>Variant</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                     </tr>
                  </thead>
                  <tbody>
                    @foreach($invoicelines as $invoiceline)
                    <tr>
                      <td>{{$loop->iteration}} </td>
                      <td>{{$invoiceline->product->name}}</td> 
                      <td>{{$invoiceline->product->size}}</td>
                      <td>{{$invoiceline->variant->colour}}</td>
                      <td>{{$invoiceline->quantity}}</td>
                      <td>{{$invoiceline->line_total}}</td>
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