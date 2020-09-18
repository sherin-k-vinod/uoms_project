<?php

namespace App\Http\Controllers\Admin;
use App\Models\Product;
use App\Models\Productvarient;

class ProductController  
{
    public function productlist(){
    	$products= Product::all(); 
     	return view('admin.products.productlist', compact('products'));
    }
    public function productform(){

    	return view('admin.products.productform');
    }

    public function productadd(){
    	  Product::create([
        	 'name' =>  request('name'),
        	 'gender' => request('gender'),
        	 'size' => request('size')
        ]);
    	 return redirect()->route('admin.product.list');
    }

    public function productedit($id){
        $product = Product::find($id);
        return view('admin.products.productedit',compact('product'));
    }

    public function productupdate(){
          Product::where('product_id', request('product_id'))->update(['name' => request('name'), 'gender' => request('gender'), 'size' =>request('size')]);
        // $client_id = auth()->guard('client')->user()->client_id;
        $products= Product::all();
        return view('admin.products.productlist', compact('products'));
    }

    public function productdelete($id){
        Productvarient::where('product_id', $id)->delete();
        $product = Product::find($id)->delete();
        // $client_id = auth()->guard('client')->user()->client_id;
        $products= Product::all();
        return view('admin.products.productlist', compact('products'));
    }
}
