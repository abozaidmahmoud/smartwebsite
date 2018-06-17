<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        $permissions=permission::all();
        return view('admin/permission/Show',compact('permissions'));
    }

   
    public function create()
    {
        return view('admin/permission/create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|unique:permissions',
            'for'=>'required'
        ]);

        $permission=new permission();
        $permission->name=request('name');
        $permission->for=request('for');
        $permission->save();
        return redirect(route('permission.index'))->with('message','Permission ( '. request("name") .' ) created Successfully ');
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $permission=permission::find($id);
        return view('admin/permission/Edit',compact('permission'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|unique:permissions',
            'for'=>'required'

        ]);

        $permission=permission::find($id);
        $permission->name=request('name');
        $permission->for=request('for');
        $permission->save();
        return redirect(route('permission.index'))->with('message','Permission  Updated Successfully'  );
    }

   
    public function destroy($id)
    {
        permission::find($id)->delete();
        return back()->with('message','Permission  Deleted Successfully'  );
    }
}
