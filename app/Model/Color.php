<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    
    protected $table = 'colors';
    protected $fillable = ['user_id', 'name', 'desc'];
}
