<?php

namespace App\Http\Controllers\Client;
use App\Models\Invoice;
use App\Models\Invoiceline;
use App\Models\Unitorder;

class InvoiceController  
{
    public function invoicelist(){
    	$invoices = Invoice::where('status', '!=', 0)->get();
    	return view('client.invoice.list', compact('invoices'));
    }
    public function invoicedetails($id){
    	$invoicelines = Invoiceline::where('invoice_id', $id)->with(['product', 'variant'])->get();
     	return view('client.invoice.details', compact('invoicelines'));
    }

    public function makepayment($id){
        Invoice::where('invoice_id', $id)->update(['status' => 4, 'client_status' => 2]);
        return redirect()->route('client.invoice.list');
    }
    // public function unitpayment($id){
    //  	Invoice::where('invoice_id', $id)->update(['status' => 2]);
    //  	$unitorder = Invoice::find($id);
    //  	Unitorder::where('order_id', $unitorder->order_id)->update(['status' => 13]);
    //  	return redirect()->route('admin.invoice.list');
    // }

    // public function clientinvoice($id){
    //     Invoice::where('invoice_id', $id)->update(['status' => 3]);
    //     return redirect()->route('admin.invoice.list');
    // }
}
