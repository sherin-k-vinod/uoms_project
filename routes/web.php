<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'],function(){

	Route::get('login',['as' =>'login', 'uses'=>'LoginController@login']);
	Route::post('check-login',['as' =>'check.login', 'uses'=>'LoginController@checkLogin']);
	Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
	Route::get('dashboard',['as' =>'dashboard', 'uses'=>'DashboardController@dashboard']);


	Route::group(['prefix'=>'product', 'as'=>'product.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'ProductController@productlist']);
		Route::get('form',['as' =>'form', 'uses'=>'ProductController@productform']);
		Route::post('new',['as' =>'new', 'uses'=>'ProductController@productadd']);
		Route::get('edit/{id}',['as' =>'edit', 'uses'=>'ProductController@productedit']);
		Route::post(' update',['as' =>'update', 'uses'=>'ProductController@productupdate']);
		Route::get('delete/{id}',['as' =>'delete', 'uses'=>'ProductController@productdelete']);

		Route::get('varient-list/{id}',['as' =>'varient.list', 'uses'=>'VarientController@productvarientlist']);
		Route::get('varient-new/{id}',['as' =>'varient.new', 'uses'=>'VarientController@productvarientnew']);
		Route::post('varient-save',['as' =>'varient.save', 'uses'=>'VarientController@productvarientsave']);
		Route::get('varient-edit/{id}',['as' =>'varient.edit', 'uses'=>'VarientController@productvarientedit']);
		Route::post('varient-update',['as' =>'varient.update', 'uses'=>'VarientController@productvarientupdate']);
		Route::get('varient-delete/{id}',['as' =>'varient.delete', 'uses'=>'VarientController@productvarientdelete']);
	});

	Route::group(['prefix'=>'order', 'as'=>'order.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'OrderController@orderlist']);
		Route::get('accept/{id}',['as' =>'accept', 'uses'=>'OrderController@orderaccept']);
		Route::get('quality-ok/{id}',['as' =>'quality.ok', 'uses'=>'OrderController@qualityok']);
		Route::get('quality-fail/{id}',['as' =>'quality.fail', 'uses'=>'OrderController@qualityfail']);
 	});

 	Route::group(['prefix'=>'materials', 'as'=>'materials.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'MaterialController@materiallist']);
		Route::get('form',['as' =>'form', 'uses'=>'MaterialController@materialform']);
		Route::post('new',['as' =>'new', 'uses'=>'MaterialController@materialadd']);
		Route::get('edit/{id}',['as' =>'edit', 'uses'=>'MaterialController@materialedit']);
		Route::post(' update',['as' =>'update', 'uses'=>'MaterialController@materialupdate']);
		Route::get('delete/{id}',['as' =>'delete', 'uses'=>'MaterialController@materialdelete']);
		Route::get('dispatch/{id}',['as' =>'dispatch', 'uses'=>'MaterialController@materialdispatch']);


		Route::get('varient-list/{id}',['as' =>'varient.list', 'uses'=>'MaterialController@varientlist']);
		Route::get('varient-form/{id}',['as' =>'varient.form', 'uses'=>'MaterialController@varientform']);
		Route::post('varient-new/{id}',['as' =>'varient.new', 'uses'=>'MaterialController@varientnew']);
		Route::get('varient-edit/{id}',['as' =>'varient.edit', 'uses'=>'MaterialController@varientedit']);
		Route::post('varient-update/{id}',['as' =>'varient.update', 'uses'=>'MaterialController@varientupdate']);
		Route::get('varient-delete/{id}',['as' =>'varient.delete', 'uses'=>'MaterialController@varientdelete']);
		Route::get('stock-details', ['as' => 'stock.details', 'uses' => 'MaterialController@stockdetails']);
		Route::get('stock-edit/{id}', ['as' => 'stock.edit', 'uses' => 'MaterialController@stockedit']);
		Route::post('stock-update', ['as' => 'stock.update', 'uses' => 'MaterialController@stockupdate']);

   	});

   	Route::group(['prefix'=>'invoice', 'as'=>'invoice.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'InvoiceController@invoicelist']);
		Route::get('details/{id}',['as' =>'details', 'uses'=>'InvoiceController@invoicedetails']);
		Route::get('unit-payment/{id}',['as' =>'unit.payment', 'uses'=>'InvoiceController@unitpayment']);
		Route::get('client-invoice/{id}',['as' =>'client.invoice', 'uses'=>'InvoiceController@clientinvoice']);
    });

});

Route::group(['prefix'=>'client', 'as'=>'client.','namespace'=>'Client'],function(){

	Route::get('login',['as' =>'login', 'uses'=>'LoginController@login']);
	Route::post('check-login',['as' =>'check.login', 'uses'=>'LoginController@checkLogin']);
	Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
	Route::get('dashboard',['as' =>'dashboard', 'uses'=>'DashboardController@dashboard']);

	Route::group(['prefix'=>'orders', 'as'=>'orders.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'OrderController@orderlist']);
		Route::get('new',['as' =>'new', 'uses'=>'OrderController@orderform']);
		Route::post('save',['as' =>'save', 'uses'=>'OrderController@orderadd']);
		Route::get('edit/{id}',['as' =>'edit', 'uses'=>'OrderController@orderedit']);
		Route::post('update',['as' =>'update', 'uses'=>'OrderController@orderupdate']);
		Route::get('delete/{id}',['as' =>'delete', 'uses'=>'OrderController@orderedelete']);
		Route::post('fetch-variants',['as' =>'fetch.variants', 'uses'=>'OrderController@fetchVariants']);
		Route::post('fetch-prize',['as' =>'fetch.prize', 'uses'=>'OrderController@fetchPrize']);
		Route::get('accept/{id}',['as' =>'accept', 'uses'=>'OrderController@orderaccept']);
		Route::get('reject/{id}',['as' =>'reject', 'uses'=>'OrderController@orderreject']);
	});

   	Route::group(['prefix'=>'invoice', 'as'=>'invoice.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'InvoiceController@invoicelist']);
		Route::get('details/{id}',['as' =>'details', 'uses'=>'InvoiceController@invoicedetails']);
 		Route::get('make-payment/{id}',['as' =>'make.payment', 'uses'=>'InvoiceController@makepayment']);
    });
	
 
});

Route::group(['prefix'=>'unit', 'as'=>'unit.','namespace'=>'Unit'],function(){

	Route::get('login',['as' =>'login', 'uses'=>'LoginController@login']);
	Route::post('check-login',['as' =>'check.login', 'uses'=>'LoginController@checkLogin']);
	Route::get('logout',['as'=>'logout','uses'=>'LoginController@logout']);
	Route::get('dashboard',['as' =>'dashboard', 'uses'=>'DashboardController@dashboard']);

	Route::group(['prefix'=>'order', 'as'=>'order.'],function(){
		Route::get('list',['as' =>'list', 'uses'=>'OrderController@orderlist']);
		Route::get('details/{id}',['as' =>'details', 'uses'=>'OrderController@orderdetails']);
		Route::get('accept/{id}',['as' =>'accept', 'uses'=>'OrderController@orderaccept']);
		Route::get('reject/{id}',['as' =>'reject', 'uses'=>'OrderController@orderreject']);
		Route::get('material/{id}',['as' =>'material', 'uses'=>'OrderController@material']);
		Route::get('work/{id}',['as' =>'work', 'uses'=>'OrderController@work']);
		Route::get('quality/{id}',['as' =>'quality', 'uses'=>'OrderController@quality']);
		Route::get('request-payment/{id}',['as' =>'request.payment', 'uses'=>'OrderController@requestpayment']);
		Route::get('pay.unit/{id}',['as' =>'pay.unit', 'uses'=>'OrderController@payunit']);
		Route::get('dispatch-uniform/{id}',['as' =>'dispatch.uniform', 'uses'=>'OrderController@dispatchuniform']);
 	});


});