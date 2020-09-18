<?php

namespace App\Http\Controllers\Unit;

class LoginController 
{
    public function login(){
    	return view('unit.login');
    }

    public function checkLogin(){ 
    	$username = request('username');  	
    	$password = request('password');

    	if(auth()->guard('unit')->attempt(['username' => $username,'password'=>$password])){
    		return redirect(route('unit.dashboard'));
    	}
    	else{
    		return redirect(route('unit.login'));
    	}
    }
    public function logout(){
    	auth()->logout();
    	return redirect(route('unit.login'));
    }
}
