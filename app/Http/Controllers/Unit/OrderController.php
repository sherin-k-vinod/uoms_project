<?php

namespace App\Http\Controllers\Unit;
use App\Models\Unitorderline;
use App\Models\Unitorder;
use App\Models\Orders;
use App\Models\Invoice;

class OrderController 
{
    public function orderlist(){
		$orders = Unitorder::all();
  		return view('unit.order.details', compact('orders'));
	}
	public function orderdetails($id){
		$orderline = Unitorderline::where('order_id', $id)->with(['unitorder', 'product'])->get();
 		return view('unit.order.list', compact('orderline'));
	}

	public function orderaccept($id){
 		Orders::where('order_id', $id)->update(['status'=> 3]);
		Unitorder::where('order_id', $id)->update(['status'=> 1, 'expected_completion_date'=> request('expectedDate'),
	    'expected_completion_time'=> request('expectedTime')]);
 		return redirect()->route('unit.order.list');
	}

	public function orderreject($id){
 		Orders::where('order_id', $id)->update(['status'=> 4]);
		Unitorder::where('order_id', $id)->update(['status'=> 2]);
		return redirect()->route('unit.order.list');
	
	}
	public function material($id){
		Orders::where('order_id', $id)->update(['status'=> 8]);
		Unitorder::where('order_id', $id)->update(['status'=> 7]);
		return redirect()->route('unit.order.list');
	}	
	public function work($id){
		Orders::where('order_id', $id)->update(['status'=> 9]);
		Unitorder::where('order_id', $id)->update(['status'=> 8]);
		return redirect()->route('unit.order.list');
	}	
	public function quality($id){
		Orders::where('order_id', $id)->update(['status'=> 10]);
		Unitorder::where('order_id', $id)->update(['status'=> 9]);
		return redirect()->route('unit.order.list');
	}
    public function requestpayment($id){
        Unitorder::where('order_id', $id)->update(['status' => 12]);
        Invoice::where('order_id', $id)->update(['status' => 1]);
        Orders::where('order_id', $id)->update(['status' => 14]);
        return redirect()->route('unit.order.list');
    }

    public function dispatchuniform($id){
    	Unitorder::where('order_id', $id)->update(['status' => 14]);
    	Orders::where('order_id', $id)->update(['status' => 13]);
    	// Invoice::where('order_id', $id)->update(['status' => 3]);
    	return redirect()->route('unit.order.list');
    }
}
