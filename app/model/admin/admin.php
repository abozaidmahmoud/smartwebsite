<?php

namespace App\model\admin;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
    use Notifiable;

    protected $fillable=['name','email','phone','password','status'];

    protected $hidden=['confirm_password'];

    public function role(){
    	return $this->belongsToMany('App\model\admin\role','admin_roles');
    }
}
