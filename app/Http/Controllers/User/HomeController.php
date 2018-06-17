<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\admin\post;
use App\model\admin\cateogery;
use App\model\admin\tag;

class HomeController extends Controller
{
    public function index(){
    	$posts=post::where('status',1)->orderBy('created_at','desc') ->paginate(5); //get only posts which status =1
    	 return view('user/blog',compact('posts'));
    }

    public function cateogery(cateogery $cateogery){
    	$posts= $cateogery->posts(); //get posts in cateogery
    	return view('user/blog',compact('posts'));
    }

    public function tag(tag $tag){
    	$posts= $tag->posts();
    	return view('user/blog',compact('posts'));

    } 
   
}
