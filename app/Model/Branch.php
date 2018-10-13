<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';


    public function store(){

    	return $this->hasMany('App\Model\Store', 'id', 'store_id');
    }

    
}
