<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function addressable(){

    	return $this->morphTo();
    }
}
