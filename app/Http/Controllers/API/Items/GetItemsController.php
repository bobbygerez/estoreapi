<?php

namespace App\Http\Controllers\API\Items;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Item;

class GetItemsController extends Controller
{
    
    public function getItems(){
    	$request = app()->make('request');
    	$collection = Item::with(['images'])->get();
		$paginate = new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

    	return response()->json([
    		'items' => $paginate
    	]);
    }
    public function cat(){

    	return response()->json([
				'items' 	
    		]);
    }

    public function subCat(){

    }

    public function furtherCat(){


    }

}
