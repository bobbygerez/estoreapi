<?php

namespace App\Http\Controllers\API\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetItemsController extends Controller
{
    
    public function cat(){

    	return response()->json([
				'cat'    			
    		]);
    }

    public function subCat(){

    }

    public function furtherCat(){


    }

}
