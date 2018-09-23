<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function address(){

    	return $this->morphMany('App\Model\Address', 'addressable');
    }

    public function branches(){

    	return $this->belongsTo('App\Model\Branch');
    }

    public function scopeRelTable($query){

    	return $query->with(['branches', 'address'])->get();
    }
}
