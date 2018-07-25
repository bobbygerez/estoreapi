<?php

namespace App\Http\Controllers\API\Brgy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brgy;

class BrgyController extends Controller
{
    
    public function getBrgy($citymunCode){

    	return response()->json([
    			'brgys' => Brgy::where('citymunCode', $citymunCode)->get()
    		]);
    }
}
