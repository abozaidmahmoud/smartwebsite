<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\admin;
use App\model\admin\user;
use App\model\admin\role;

class UserController extends Controller
{
    
    public function index()
    {
        $users= admin::all();
        return view('admin/user/show',compact('users'));
    }

   
    public function create()
    {
        $roles=role::all();
        return view('admin/user/user',compact('roles'));
    }

    
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|string|min:3|max:50',
            'email'=>'required|email|unique:admins',
            'phone'=>'required|numeric',
            'password'=>'required|min:3',
            'confirm_password'=>'same:password'
        ]);
        $request['password']=bcrypt(request('password'));
        $user=admin::create(Request()->all()); 
        $user->role()->Sync(request('role'));       
        return redirect(route('user.index'));

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user=admin::find($id);
        $roles=role::all();
        return view('admin/user/edit',compact('user','roles'));
    }

  
    public function update(Request $request, $id)
    {
        $user=$this->validate(request(),[
            'name'=>'required|string|min:3|max:50',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            
           
        ]);
        $user->role()->Sync(request('role'));   
        admin::find($id)->update(request()->except('_token','method'));       
        return redirect(route('user.index'))->with('message','User Updated Successfully');
    }


    public function destroy($id)
    {
        admin::find($id)->delete();
        return back();
    }
}
