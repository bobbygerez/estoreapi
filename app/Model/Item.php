<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    
    protected $table = 'items';

    protected $fillable = [

        'name', 'amount', 'short_desc', 'discount', 'status', 'quantity'
        
    ];

    public function itemInfo(){

        return $this->belongsTo('App\Model\ItemInfo');
    }

    public function scopeRelTable($query){
        return $query->with(['itemInfo']);
    }

    public function getCreatedAtAttribute($value){

        return Carbon::parse($value)->toDayDateTimeString();
    }
}
