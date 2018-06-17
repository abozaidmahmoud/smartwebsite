<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\cateogery;
class CateogeryController extends Controller
{
  
    public function index()
    {
        if(request()->has('search')){
            $cateogeries=cateogery::where('id',request('search'))
                                   ->Orwhere('name','Like','%'.request('search').'%')
                                   ->paginate(8);
        }
        else{
            $cateogeries=cateogery::paginate(8);
        }
        return view('admin/cateogery/show',compact('cateogeries'));
       
    }

   
    public function create()
    {
        return view('admin/cateogery/cateogery');        
    }
    
    public function store(Request $request)
    {
        $this->validate(request(),[
            'name'=>'required',
            'slug'=>'required'
        ]);

        $cateogery=new cateogery();
        $cateogery->name=request('name');
        $cateogery->slug=request('slug');
        $cateogery->save();
        return redirect(route('cateogery.index'));

    }

   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
          $cateogery=cateogery::where('id',$id)->first();
          return view('admin/cateogery/edit',compact("cateogery"));
    }

   
    public function update(Request $request, $id)
    {
          $this->validate(request(),[
            'name'=>'required',
            'slug'=>'required',
        ]);
        $cateogery=cateogery::find($id);
        $cateogery->name=request('name');
        $cateogery->slug=request('slug');
        $cateogery->save();
        return redirect(route('cateogery.index'));

    }

   
    public function destroy($id)
    {
        cateogery::find($id)->delete();
        return redirect(route('cateogery.index'));
    }

    public function search(){
        $term=request('term');
        $cateogeries=cateogery::where('name','Like','%'.$term.'%')->get();
        if(count($cateogeries)==0){
            $searchresult[]='no result found';
        }
        else{
            foreach( $cateogeries as $cateogery){
                $searchresult[]=$cateogery->name;
            }
        }

        return $searchresult;
    
    }
}