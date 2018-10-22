<?php

namespace App\Http\Controllers\Api\Items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\Model\Province;
use App\Model\City;
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


        JWTAuth::setToken($request->token);
        $user = JWTAuth::toUser($request->token);

        $item = Item::create([
                'sku' => $request->sku,
                'name' => $request->name,
                'amount' => $request->amount,
                'discount' => $request->discount,
                'quantity' => $request->quantity,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'status' => $request->status
            ]);

        $user = JWTAuth::toUser($request->token);

        if (count($request->city_ids) > 1) {

            foreach ($request->city_ids as $citymunCode) {
                $brgys = Brgy::where('citymunCode', $citymunCode)->get();
                foreach ($brgys as $brgyCode) {
                    
                    ItemInfo::create([
                            'item_id' => $item->id,
                            'user_id' => $user->id,
                            'store_id' => $request->store_id,
                            'branch_id' => $request->branch_ids,
                            'unit_id' => $request->unit_ids,
                            'category_id' => $request->category_id,
                            'subcategory_id' => $request->subcategory_id,
                            'further_category_id' => $request->further_category_id,
                            'provCode' => Province::where('provCode', $request->provCode)->first()->id,
                            'citymunCode' => City::where('citymunCode', $citymunCode)->first()->id,
                            'brgyCode' => Brgy::where('brgyCode', $brgyCode)->first()->id
                        ]);

                }
            }
                
        }else{

            //One city selected
            foreach ($request->city_ids as $citymunCode) {
                 foreach ($request->brgy_ids as $brgyCode) {

                    ItemInfo::create([
                            'item_id' => $item->id,
                            'user_id' => $user->id,
                            'store_id' => $request->store_id,
                            'branch_id' => $request->branch_ids,
                            'unit_id' => $request->unit_ids,
                            'category_id' => $request->category_id,
                            'subcategory_id' => $request->subcategory_id,
                            'further_category_id' => $request->further_category_id,
                            'provCode' => Province::where('provCode', $request->provCode)->first()->id,
                            'citymunCode' => City::where('citymunCode', $citymunCode)->first()->id,
                            'brgyCode' => Brgy::where('brgyCode', $brgyCode)->first()->id
                        ]);
                }
            }
        }
        
        foreach ($request->images as $image) {
            
            $image = str_replace('data:image/png;base64,', '', $image['dataURL']);
            $image = str_replace(' ', '+', $image);
            $imageName = str_random(10).'.'.'png';
            \File::put(public_path(). '/images/uploads/' . $imageName, base64_decode($image));
        }
        
        return response()->json('asdf');
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

    public function createItemInfo($request){

    }
}
