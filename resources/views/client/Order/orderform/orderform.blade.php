   @extends('client.layout.master')
 @section('content')
  <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Order Form</h1>
        </div>
        
      </div>
      <div>
        <div>
          <div class="tile">
            <h3 class="tile-title">New Order</h3>
            <div class="tile-body">
              <form action="{{route('client.orders.save')}}" method="post">
                @csrf
                <div class="form-group">
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr>  
                        <th>Product</th>
                        <th>Varient</th>
                        <th>Prize</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Add</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                            <select name="product" class="form-control productSwitch" token="{{csrf_token()}}" fetch="{{route('client.orders.fetch.variants')}}">
                                @foreach($products as $product)
                                <option value="{{$product->product_id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>    
                            <select name="variant" class="form-control variant" token="{{csrf_token()}}" fetch="{{route('client.orders.fetch.prize')}}">
                            </select>
                        </td>
                        <td><label class="form-control labelPrize">Prize</label></td>
                        <td>
                            <input type="text" name="quantity" class="form-control quantity">
                        </td>
                        <td><label class="form-control labelTotal">subTotal</label></td>
                        <td><input type="button" name="" value="ADD" class="btn btn-primary"></td>
                        </tr>
                        <input type="hidden" class="hiddenQuantity" name=" hiddenQuantity">
                        <input type="hidden" class="hiddenTotal" name=" hiddenTotal"> 
                        <tr ><td colspan="4"><input type="submit"  value="SAVE" class="btn btn-primary saveBtn"></td><td ></td> <td><label class="form-control grandTotal" >Total</label></td>
                           </tr>
                    </tbody> 
                </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
            </div>
          </div>
        </div>
        <div class="clearix"></div>
      </div> 
      @endsection
      @push('js')
      <script type="text/javascript" src="{{asset('public/js/pages/orders/newOrder.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/js/pages/orders/fetchPrize.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/js/pages/orders/checkLineTotal.js')}}"></script>
      @endpush