<?php

namespace App\Http\Controllers\API\Province;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Province;

class ProvinceController extends Controller
{
    
    public function allProvinces(){

    	return response()->json([
    			'provinces'	=> Province::all()
    		]);
    }
}
