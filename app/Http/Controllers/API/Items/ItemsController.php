<?php

namespace App\Http\Controllers\Api\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brgy;
use App\Model\Item;
use App\Model\ItemInfo;
use Illuminate\Pagination\LengthAwarePaginator;
class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Item::create([
                'name' => $request->name,
                'amount' => $request->amount,
                'discount' => 0,
                'quantity' => $request->quantity,
                'short_desc' => $request->short_desc,
                'status' => $request->status
            ]);
        if (count($request->city_ids) > 1) {
            foreach ($request->city_ids as $citymunCode) {
                $brgys = Brgy::where('citymunCode', $citymunCode)->get();
                foreach ($brgys as $brgyCode) {
                    
                    ItemInfo::create([
                            'item_id' => $item->id,
                            'user_id' => $user->id,
                            'store_id' => $request->store_id,
                            'branch_id' => $request->branch_ids
                        ]);

                }
            }
                
        }else{
            foreach ($request->city_ids as $citymunCode) {
                 foreach ($request->brgy_ids as $brgyId) {
               
                }
            }
        }
        
        foreach ($request->images as $image) {
            
            $image = str_replace('data:image/png;base64,', '', $image['dataURL']);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \File::put(storage_path(). '/uploads/' . $imageName, base64_decode($image));
        }
        
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return response()->json([
                'item' => ItemInfo::where('id', $id)->relTable()->first()
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function paginatePage($collection){

       $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

        
    }
}
