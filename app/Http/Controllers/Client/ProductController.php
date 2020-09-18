<?php

namespace App\Http\Controllers\Client;
use App\Models\Product;
use App\Models\Productvarient;

class ProductController  
{
    public function productlist(){
        $client_id = auth()->guard('client')->user()->client_id;
    	$products= Product::where('client_id', '=', $client_id)->with('client')->get();
     	return view('client.products.list.productlist', compact('products'));
    }
    public function productform(){

    	return view('client.products.list.productform');
    }

    public function productadd(){
    	  Product::create([
        	 'client_id' => auth()->guard('client')->user()->client_id,
        	 'name' =>  request('name'),
        	 'gender' => request('gender'),
        	 'size' => request('size')
        ]);
    	 return redirect()->route('client.product');
    }

    public function productedit($id){
        $product = Product::find($id);
        return view('client.products.list.productedit',compact('product'));
    }

    public function productupdate(){
          Product::where('product_id', request('product_id'))->update(['name' => request('name'), 'gender' => request('gender'), 'size' =>request('size')]);
        $client_id = auth()->guard('client')->user()->client_id;
        $products= Product::where('client_id', '=', $client_id)->get();
        return view('client.products.list.productlist', compact('products'));
    }

    public function productdelete($id){
        Productvarient::where('product_id', $id)->delete();
        $product = Product::find($id)->delete();
        $client_id = auth()->guard('client')->user()->client_id;
        $products= Product::where('client_id', '=', $client_id)->get();
        return view('client.products.list.productlist', compact('products'));
    }
}
