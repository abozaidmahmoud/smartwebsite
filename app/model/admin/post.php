<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
   function tags(){
   		return $this->belongsToMany('App\model\admin\tag','post_tags')->withTimestamps();
   } 

    function cateogeries(){
   		return $this->belongsToMany('App\model\admin\cateogery','cateogery_posts')->withTimestamps();
   } 

   public function comments(){
   		return $this->hasMany('App\model\admin\comments','post_id','id');
   }
   // search in post model by slug instead of id
   public function getRouteKeyName(){
   	return 'slug';
   }


}
