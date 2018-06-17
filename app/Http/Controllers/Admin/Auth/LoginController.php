<?php

namespace App\Http\Controllers\Admin\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;
    protected $redirectTo = 'admin/home';

   
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }


     protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm(){
        return view('Admin/login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
     
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
       
        return $this->sendFailedLoginResponse($request);
}

    public function logout(){
        auth()->guard('admin')->logout();
       // return redirect(url('admin/login'));
        return view('admin.login');
    }

}
