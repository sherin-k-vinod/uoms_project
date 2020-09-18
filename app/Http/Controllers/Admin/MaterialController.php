<?php

namespace App\Http\Controllers\Admin;
use App\Models\Productvarient;
use App\Models\Material;
use App\Models\Orders;
use App\Models\Stock;
use App\Models\Orderlines;
use App\Models\Unitorder;
use App\Models\Materialproduct;

class MaterialController  
{
 	public function materiallist(){
 		$materials = Material::all();
 		return view('admin.materials.list', compact('materials'));
 	}

 	public function materialform(){
 		$productvarients = Productvarient::all();
 		return view('admin.materials.form', compact('productvarients'));
 	}

 	public function materialadd(){
 		$material = Material::create([
 			'name' => request('materialName'),
 			'available_stock' => request('availableStock')
 		]);
 		return redirect()->route('admin.materials.list');
 	}

 	public function materialedit($id){
 		$productvarients = Productvarient::all();
 		$materials = Material::find($id);
 		return view('admin.materials.edit', compact(['productvarients', 'materials']));
 	}

 	public function materialupdate(){
 		$material = Material::where('material_id', request('material_id'))->update(['name' => request('materialName'), 
 			'available_stock' => request('availableStock')]);
 		return redirect()->route('admin.materials.list');
 	}
 	
 	public function materialdelete($id){
 		Materialproduct::where('material_id', $id)->delete();
 		Material::where('material_id', $id)->delete();
 		return redirect()->route('admin.materials.list');

 	}
 	public function materialdispatch($id){
    $flag= 0;
    $materials;
    $available_stock;
    $varients = Orderlines::where('order_id', $id)->get(['variant_id', 'quantity']);
     foreach ($varients as $varient) {
       $varientdetails = Productvarient::where('varient_id', $varient->variant_id)->get('colour');
       $materials = Materialproduct::where('varient_id', $varient->variant_id)->get(['material_id', 'required_size']);
        foreach ($varientdetails as $varientdetail){
         foreach ($materials as $material){
           $available_stocks = Material::where('material_id', $material->material_id)->get(['available_stock', 'name']);
             foreach ($available_stocks as $available_stock) {
                if (($varient->quantity * $material->required_size) > $available_stock->available_stock) {
                  Stock::create([
                    'order_id' => $id,
                    'material_id' => $material->material_id,
                    'material_name' => $available_stock->name,
                    'available_stock' => $available_stock->available_stock,
                    'required_stock' => $varient->quantity * $material->required_size,
                    'status' => 0
                  ]);
                  Orders::where('order_id', $id)->update(['status'=>15]);
                  Unitorder::where('order_id', $id)->update(['status' =>15]);
                  $flag = 1;
        
                }
                else{
                      Material::where('material_id', $material->material_id)->update(['available_stock'=>$available_stock->available_stock - $varient->quantity * $material->required_size]);
                      Orders::where('order_id', $id)->update(['status'=>7]);
                      Unitorder::where('order_id', $id)->update(['status' =>6]);
                      return redirect()->route('admin.order.list');
                   } 
               }
           }
       }  
    }
    if($flag==1){
      return redirect()->route('admin.order.list');
    }
  }
  public function varientlist($id){
     $Materialproducts = Materialproduct::where('material_id', $id)->with('varients')->get();
    return view('admin.materials.variantlist', compact('Materialproducts','id'));
  }

  public function varientform($id){
    $productvarients = Productvarient::all();
    return view('admin.materials.variantdetailsform', compact('productvarients','id'));
  }

  public function varientnew($id){
    $varients = request('varient');
      Materialproduct::create([
     'material_id' => $id,
     'varient_id' => $varients,
     'required_size' => request('requiredsize')
     ]);
      return redirect(route('admin.materials.varient.list',$id));
  
  }

  public function varientedit($id){
    $materialproducts = Materialproduct::where('material_product_id', $id)->with('varients')->get();
    $productvarients = Productvarient::all();
    return view('admin.materials.variantedit', compact('materialproducts', 'productvarients', 'id'));

  }

  public function varientupdate($id){
    Materialproduct::where('material_product_id', $id)->update(['varient_id' => request('varient'), 'required_size' =>request('requiredsize')]);
    $materialproducts = Materialproduct::find($id);
    return redirect(route('admin.materials.varient.list',$materialproducts->material_id));
  
  }
    public function varientdelete($id){
      $materialproducts = Materialproduct::find($id);
        $delete = Materialproduct::where('material_product_id', $id)->delete();
    return redirect(route('admin.materials.varient.list',$materialproducts->material_id));
  
      }

  public function stockdetails(){
    $stockdetails = Stock::all();
    return view('admin.materials.requiredstock', compact('stockdetails'));
  }

  public function stockedit($id){
     $materials = Material::find($id);
    return view('admin.materials.stockupdate', compact('materials'));
  }

  public function stockupdate(){
    $material = Material::where('material_id', request('material_id'))->update(['available_stock' => request('availableStock')]);
    $stockdetails = Stock::all();
    foreach ($stockdetails as $stockdetail) {
     Orders::where('order_id', $stockdetail->order_id)->update(['status' => 5]);}
     Stock::where('material_id', request('material_id'))->delete();
     return redirect()->route('admin.materials.stock.details');
    return view('admin.materials.requiredstock', compact('stockdetails'));
  }
}