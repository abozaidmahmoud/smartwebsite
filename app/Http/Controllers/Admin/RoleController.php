<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\role;
use App\model\admin\permission;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles=role::all();
        return view('admin/role/show',compact('roles'));   
    }

    
    public function create()
    {
        $permissions=permission::all();
        return view('admin/role/role',compact('permissions'));
    }

   
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required|unique:roles'
        ]);

        $role=new role();
        $role->name=request('name');
        $role->save();
        $role->permissions()->Sync(Request('permission'));
        return redirect(route('role.index'));
    }

       public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $role=role::where('id',$id)->first();
        $permissions=permission::all();
        return view('admin/role/edit',compact('role','permissions'));
    }

   
    public function update(Request $request, $id)
    {

          $this->validate(request(),[
            'name'=>'required'
        ]);

        $role=role::find($id);

        $role->name=request('name');
        $role->save();
        $role->permissions()->Sync(Request('permission'));
        return redirect(route('role.index'));
       
    }

   
    public function destroy($id)
    {
        role::where('id',$id)->delete();
        return back();
    }
}
