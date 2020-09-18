<?php

namespace App\Http\Controllers\Client;
use App\Models\Orders;
use App\Models\Unitorders;
use App\Models\Product;
use App\Models\Productvarient;
use App\Models\Orderlines;
use App\Models\Unitorderline;
use App\Models\Unitorder;
use App\Models\Invoice;
use Carbon\Carbon;

class OrderController  
{
    public function orderlist(){
    	$client_id = auth()->guard('client')->user()->client_id;
    	$orders= Orders::where('client_id', '=', $client_id)->with('unitorder')->get();
       	return view('client.order.list.orderTable', compact('orders'));
    }

    public function orderform(){
        $products = Product::all();
        $variants = Productvarient::all();
    	return view('client.order.orderform.orderform', compact('products'));
    }
    public function orderadd(){
    	$order = Orders::create([
        	 'client_id' => auth()->guard('client')->user()->client_id,
        	   'status' => 0 
        ]);

        Orderlines::create([
                'order_id' => $order->order_id,
                'product_id' => request('product'),
                'variant_id' => request('variant'),
                'quantity' => request('hiddenQuantity'),
                'line_total' => request('hiddenTotal')
        ]);

        return redirect()->route('client.orders.list');
    }
    public function orderedit($id){
    	$order = Orders::find($id);
    	return view('client.Order.orderform.orderedit', compact('order'));
    }
    public function orderupdate(){
    	Orders::where('order_id', request('order_id'))->update(['amount' => request('amount')]);
    	$client_id = auth()->guard('client')->user()->client_id;
    	$orders= Orders::where('client_id', '=', $client_id)->get();
    	return view('client.order.list.orderTable', compact('orders'));
    }
    public function orderedelete($id){
        Orderlines::find($id)->delete();
    	Orders::find($id)->delete();
    	$client_id = auth()->guard('client')->user()->client_id;
    	$orders= Orders::where('client_id', '=', $client_id)->get();
    	return view('client.order.list.orderTable', compact('orders'));
    }

    public function fetchVariants(){
        $variants = Productvarient::where('product_id',request('product_id'))->get();
        $html='';
        foreach ($variants as  $variant) {
            $html.='<option value="'.$variant->varient_id.'">'.$variant->colour.'</option>';
        }
        return $html;
    }
    public function fetchPrize(){
        $variants = Productvarient::find(request('varient_id'));
        return $variants->prize;
    }

    public function orderaccept($id){
        Orders::where('order_id', $id)->update(['status' => 5]);
        Unitorder::where('order_id', $id)->update(['status' => 5]);
        return redirect()->route('client.orders.list');
    }    
    public function orderreject($id){
        Orders::where('order_id', $id)->update(['status' => 6]);
        Unitorder::where('order_id', $id)->update(['status' => 4]);
        return redirect()->route('client.orders.list');
    }
 

}
