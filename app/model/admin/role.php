<?php
namespace App\model\admin;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function permissions(){

    	return $this->belongsToMany('App\model\admin\permission','permission_role');
    }
}
