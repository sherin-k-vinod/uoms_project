<?php

namespace App\Http\Controllers\Admin;

class LoginController 
{
    public function login(){
    	return view('admin.login');
    }

    public function checkLogin(){ 
    	$username = request('username');  	
    	$password = request('password');

    	if(auth()->guard('admin')->attempt(['username' => $username,'password'=>$password])){
    		return redirect(route('admin.dashboard'));
    	}
    	else{
    		return redirect(route('admin.login'));
    	}
    }
    public function logout(){
    	auth()->logout();
    	return redirect(route('admin.login'));
    }
}
