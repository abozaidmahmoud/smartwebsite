<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class cateogery extends Model
{
    
     public function posts(){
    	return $this->belongsToMany('App\model\admin\post','cateogery_posts')->orderBy('created_at','desc')->paginate(5);
    }

    function getRouteKeyName(){
    	return 'slug';
    }
}
