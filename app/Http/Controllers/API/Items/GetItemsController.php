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
        $items = '';
        if ($request->provId != '') {
            $items = Item::where('provCode', $request->provId )->relTable()->get();

        }else {
            $items = Item::relTable()->get();
        }
        if ($request->cityId != null ) {
            $items = Item::where('citymunCode', $request->cityId )->relTable()->get();
        }
    	
		$paginated = $this->paginatePage($items);

         return response()->json([
            'items' => $paginated
        ]);
    }
    public function cat(){
        $request = app()->make('request');

        $items = Item::where('category_id', $request->catId )->relTable()->get();

    	$paginated = $this->paginatePage($items);

        return response()->json([
            'items' => $paginated,
            'categoryName' => Item::find($request->catId)->name

        ]);
    }

    public function subCat(){

        $request = app()->make('request');

        $items = Item::where('category_id', $request->subId )->relTable()->get();

        $paginated = $this->paginatePage($items);

        return response()->json([
            'items' => $paginated,
            'subcategoryName' => Item::find($request->subId)->name

        ]);

    }

    public function furtherCat(){

        $request = app()->make('request');

        $items = Item::where('category_id', $request->furthCat )->relTable()->get();

        $paginated = $this->paginatePage($items);

        return response()->json([
            'items' => $paginated,
            'furtherCategoryName' => Item::find($request->furthCat)->name

        ]);

    }

    public function paginatePage($collection){

        $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

        
    }

}
