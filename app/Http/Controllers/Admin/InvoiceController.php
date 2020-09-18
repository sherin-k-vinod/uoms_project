<?php

namespace App\Http\Controllers\Admin;
use App\Models\Invoice;
use App\Models\Invoiceline;
use App\Models\Unitorder;

class InvoiceController  
{
    public function invoicelist(){
    	$invoices = Invoice::all();
    	return view('admin.invoice.list', compact('invoices'));
    }
    public function invoicedetails($id){
    	$invoicelines = Invoiceline::where('invoice_id', $id)->with(['product', 'variant'])->get();
     	return view('admin.invoice.details', compact('invoicelines'));
    }
    public function unitpayment($id){
     	Invoice::where('invoice_id', $id)->update(['status' => 2]);
     	$unitorder = Invoice::find($id);
     	Unitorder::where('order_id', $unitorder->order_id)->update(['status' => 13]);
     	return redirect()->route('admin.invoice.list');
    }

    public function clientinvoice($id){
        Invoice::where('invoice_id', $id)->update(['status' => 3, 'client_status' => 1]);
        return redirect()->route('admin.invoice.list');
    }
}
