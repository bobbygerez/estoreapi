<?php

namespace App\Http\Controllers\API\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Province;
class CityController extends Controller
{
    

    public function getCities($provCode){

    	return response()->json([
    			'cities' => City::where('provCode', $provCode)->get(),
    			'province' => Province::where('provCode', $provCode)->first()->provDesc
    		]);
    }
}
