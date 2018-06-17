<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\tag;
class TagController extends Controller
{
    
    public function index()
    {
    
         //search with id or name    
         if(request()->has('search')){
            $tags=tag::where('id',request('search'))
                     ->Orwhere('name','Like','%'.request('search').'%')
                     ->paginate(8);

        }
        else{
            $tags=tag::paginate(8);
        }
        return view('admin/tag/show',compact('tags'));
  
    }

  
    public function create()
    {
        return view('admin/tag/tag');
    }

   
    public function store(Request $request)
    {
          $this->validate(request(),[
            'name'=>'required',
            'slug'=>'required'
        ]);

        $tag=new tag();
        $tag->name=request('name');
        $tag->slug=request('slug');
        $tag->save();
        return redirect(route('tag.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
      
       $tag=tag::where('id',$id)->first();
       return view('admin/tag/edit',compact("tag"));
    }

   
    public function update(Request $request, $id)
    {
          $this->validate(request(),[
            'name'=>'required',
            'slug'=>'required',
        ]);
        $tag=tag::find($id);
        $tag->name=request('name');
        $tag->slug=request('slug');
        $tag->save();
        return redirect(route('tag.index'));

    }

   
    public function destroy($id)
    {
        tag::find($id)->delete();
        return redirect(route('tag.index'));

    }

    public function search(){
        $term=request('term');
        $tags=tag::where('name','Like','%'.$term.'%')->get();
        if(count($tags)==0){
            $searchresult[]='no result found';
        }
       else{
            foreach($tags as $tag){
                $searchresult[]=$tag->name;
            }
       }
        return $searchresult;
    }

    
}
