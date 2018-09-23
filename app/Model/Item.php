<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    
    protected $table = 'items';

    public function store(){

        return $this->hasOne('App\Model\Store', 'id', 'store_id');
    }

    public function branch(){

        return $this->hasOne('App\Model\Branch', 'id', 'branch_id');
    }
    public function province(){

        return $this->hasOne('App\Model\Province', 'id', 'provCode');

    }

    public function city(){

        return $this->hasOne('App\Model\City', 'id', 'citymunCode');
    }

    public function brgy(){
         return $this->hasOne('App\Model\Brgy', 'id', 'brgyCode');
    }

    public function images(){

    	return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }

    public function colors(){
        return $this->belongsToMany('App\Model\Color', 'color_item', 'item_id', 'color_id');
    }

    public function category(){
       return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

    public function subCategory(){
       return $this->hasOne('App\Model\SubCategory', 'id', 'subcategory_id');
    }

    public function furtherCategory(){
       return $this->hasOne('App\Model\FurtherCategory', 'id', 'further_category_id');
    }


    public function scopeRelTable($query){
        return $query->with(['images', 'category', 'subCategory', 'furtherCategory', 'colors.images', 'brgy', 'city', 'province', 'store', 'branch']);
    }


    public function getCreatedAtAttribute($value){

        return Carbon::parse($value)->toDayDateTimeString();
    }
}
