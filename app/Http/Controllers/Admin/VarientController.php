<?php

namespace App\Http\Controllers\Admin;
use App\Models\Productvarient;
use App\Models\Materialproduct;
 

class VarientController 
{
    public function productvarientnew($id){
        return view('admin.products.productvarient', compact('id'));
    }
    public function productvarientsave(){
        Productvarient::create([
                    'product_id' => request('product_id'),
                    'colour' => request('colour'),
                    'prize' => request('prize')
        ]);
        $varients = Productvarient::where('product_id', request('product_id'))->get();
        // return view('client.products.list.varientlist', compact('varients'));
        return redirect(route('admin.product.varient.list',request('product_id')));
    }
    public function productvarientlist($id){
        $varients = Productvarient::where('product_id', $id)->get();
        return view('admin.products.varientlist', compact('varients', 'id'));
    }
    public function productvarientedit($id){
    	$varient = Productvarient::find($id);
    	return view('admin.products.varientedit',compact('varient'));
    }
    public function productvarientupdate(){
    	Productvarient::where('varient_id', request('varient_id'))->update(['product_id' => request('product_id'), 'colour' => request('colour'), 'prize' => request('prize')]);
    	return redirect(route('admin.product.varient.list',request('product_id')));

    }
    public function productvarientdelete($id){
    	$product = Productvarient::find($id);
    	Materialproduct::where("varient_id", $id)->delete();
    	Productvarient::where('varient_id', $id)->delete();
    	return redirect(route('admin.product.varient.list',$product->product_id));
    }
}
