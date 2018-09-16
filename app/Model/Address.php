<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [
    	'province_id',
    	'city_id',
    	'brgy_id',
    	'street_lot_blk',
    	'longitude',
    	'latitude'
    ];

    public function store(){

    	return $this->morphMany('App\Model\Store', 'addressable');
    }
}
