<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\post;
use App\model\admin\tag;
use App\model\admin\cateogery;
use File;
class PostController extends Controller
{
   
    public function index()
    {
      
      //search with id or name    
      if(request()->has('search')){
         $posts=post::where('id',request('search'))
                  ->Orwhere('title','Like','%'.request('search').'%')
                  ->paginate(8);
     }
     else{
         $posts=post::paginate(8);
     }
     return view('admin/post/show',compact('posts'));
    }

  
    public function create()
    {
         $tags=tag::all();
         $cateogeries=cateogery::all();
         return view('admin/post/post',compact('tags','cateogeries'));
    }

   
    public function store(Request $request)
    {
      
       $this->validate(Request(),[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
       ]);
       $image='';
         if(request()->hasfile('image')){
              $image=request('image')->store('public');
        }
        else{
            $image='public/noimg.jpeg';
        }

   
       $post=new post();
       $post->image=$image;
       $post->title=$request->title;
       $post->subtitle=$request->subtitle;
       $post->slug=$request->slug;
       $post->status=$request->status;
       $post->body=strip_tags($request->body);
       $post->save();
       $post->tags()->sync(request('tags'));
       $post->cateogeries()->sync(request('cateogeries'));
       return redirect(route('post.index'));
    }

  
    public function show($id)
    {
       
    }

    public function edit($id)
    {
           $tags=tag::all();
           $cateogeries=cateogery::all();
           $post=post::with('tags','cateogeries')->where('id',$id)->first();
           return view('admin/post/edit',compact("post","tags","cateogeries"));
    }

    public function update(Request $request, $id)
    {
          $this->validate(request(),[
            'title'=>'required',
            'subtitle'=>'required',
            'body'=>'required',
            'slug'=>'required',
        ]);
          $image='';
        if(request()->hasfile('image')){
              $image=request('image')->store('public');
        }
        else{
              $image='public/noimg.jpeg';
        }

        $post=post::find($id);
        $post->image=$image;
        $post->title=request('title');
        $post->subtitle=request('subtitle');
        $post->slug=request('slug');
        $post->status=request('status');
        $post->body=strip_tags(request('body'));
        $post->tags()->sync(request('tags'));
        $post->cateogeries()->sync(request('cateogeries'));
        $post->save();
        return redirect(route('post.index'));
    }

    
    public function destroy($id)
    {
        post::find($id)->delete();
        return redirect(route('post.index'));

    }

    public function search(){
        $term=request('term');
        $posts=post::where('title','Like','%'.$term.'%')
                    ->get();
        if(count($posts)==0){
            $searchresult[]='no result found';
        }
       else{
            foreach($posts as $post){
                $searchresult[]=$post->title;
            }
       }
        return $searchresult;
    }
}
