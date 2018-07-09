<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    protected $table = 'sub_categories';
    protected $fillable = ['category_id', 'name', 'desc'];

    public function furtherCategories(){

    	return $this->hasMany('App\Model\FurtherCategory', 'subcategory_id', 'id');
    }
}
