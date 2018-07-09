<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FurtherCategory extends Model
{
    
    protected $table = 'further_categories';
    protected $fillable = ['subcategory_id', 'name', 'desc'];
}
