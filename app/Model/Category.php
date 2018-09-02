<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];

    public function subcategories(){

    	return $this->hasMany('App\Model\SubCategory', 'category_id', 'id');
    }

    public function scopeNewOrder($query){

    	return $query->orderBy('created_at', 'DESC');
    }

    
}
