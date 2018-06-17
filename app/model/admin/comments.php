<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    public function post(){
    	return $this->hasOne('App\model\admin\post','id','post_id');
    }

    public function user(){
    	return $this->hasOne('App\User','id','user_id');
    }
}

