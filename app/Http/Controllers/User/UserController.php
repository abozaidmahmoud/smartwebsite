<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function get_login_view(){
        return view('user/login');       
    }

    function login(){
    	$remember=Request()->has('remember')?true:false;//define session time for user login
    	if(auth()->attempt(['email'=>Request('email'),'password'=>Request('password')],$remember)){

    		return view('home'); 
    	}
    	else{
            session()->flash('invalid_login','Invalid Email Or Password');
    		return back();
    	}
    }

}
