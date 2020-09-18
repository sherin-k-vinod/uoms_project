<?php

namespace App\Http\Controllers\Client;

class LoginController 
{
    public function login(){
    	return view('client.login');
    }

    public function checkLogin(){ 
    	$username = request('username');  	
    	$password = request('password');
     	if(auth()->guard('client')->attempt(['username' => $username,'password'=>$password])){
    		return redirect(route('client.dashboard'));
    	}
    	else{
    		return redirect(route('client.login'));
    	}
    }
    public function logout(){
    	auth()->logout();
    	return redirect(route('client.login'));
     }
}
