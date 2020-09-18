<?php

namespace App\Http\Controllers\Admin;
use App\Models\Orders;
use App\Models\Orderlines;
use App\Models\Unitorder;
use App\Models\Unitorderline;
use App\Models\Invoiceline;
use App\Models\Invoice;
use App\Models\Stock;

class OrderController  
{

	public function orderlist(){
		$orders = Orders::with('lines')->get();
    $stocks = Stock::all();
		return view('admin.orders.orderlist', compact('orders','stocks'));
	}

	public function orderaccept($id){
		Orders::where('order_id', $id)->update(['status'=> 2]);
		$orders = Orders::all();
		$amount = Orderlines::where('order_id', $id)->get();
    Unitorder::create([
          'order_id' => $id,
          'status' => 0
       ]);
     $orderlines = Orderlines::where('order_id', $id)->get();
    foreach ($orderlines as  $orderline) {
      Unitorderline::create([
          'order_id' => $id,
          'product_id' => $orderline->product_id,
          'variant_id' => $orderline->variant_id,
          'quantity' => $orderline->quantity,
          'line_total' => $orderline->line_total
      ]);
    }
       return redirect()->route('admin.order.list');
	}

  public function qualityok($id){
    Orders::where('order_id', $id)->update(['status'=> 11]);
    Unitorder::where('order_id', $id)->update(['status'=> 10]);
    $orders = Orders::find($id);
    $invoices = Invoice::create([
        'client_id' => $orders->client_id,
        'order_id' => $id,
        'status' => 0
    ]);
    $orderlines = Orderlines::where('order_id', $id)->get();
    foreach ($orderlines as $orderline) {
      Invoiceline::create([
        'invoice_id' => $invoices->invoice_id,
        'order_id' => $id,
        'product_id' => $orderline->product_id,
        'variant_id' => $orderline->variant_id,
        'quantity' => $orderline->quantity,
        'line_total' => $orderline->line_total
      ]);
    }
    return redirect()->route('admin.order.list');
  }
  public function qualityfail($id){
    Orders::where('order_id', $id)->update(['status'=> 12]);
    Unitorder::where('order_id', $id)->update(['status'=> 11]);
    return redirect()->route('admin.order.list');
  }
}

