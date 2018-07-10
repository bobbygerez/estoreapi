<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }

     public function menus(){
        return $this->belongsToMany('App\Model\Menu', 'menu_user', 'user_id', 'menu_id');
    }
}
