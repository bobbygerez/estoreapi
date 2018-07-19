<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $table = 'items';

    public function province(){

        return $this->hasOne('App\Model\Province', 'provCode', 'provCode');

    }

    public function city(){

        return $this->hasOne('App\Model\City', 'citymunCode', 'citymunCode');
    }

    public function brgy(){
         return $this->hasOne('App\Model\Brgy', 'brgyCode', 'brgyCode');
    }

    public function images(){

    	return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }

    public function category(){
       return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

    public function scopeRelTable($query){
        return $query->with(['images', 'category']);
    }

}
