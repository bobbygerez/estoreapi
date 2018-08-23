<?php

namespace App\Http\Controllers\API\Subcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SubCategory;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coll = SubCategory::relTable()->get();
        
        return response()->json([
                'subcategories' => $this->paginatePage($coll)
            ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return response()->json([
                'subcategory' => SubCategory::where('id', $id)->with('categories')->first()
            ]);
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
        
        SubCategory::find($id)->update($request->all());
        return response()->json([
                'subcategories' => SubCategory::with('categories')->get()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        SubCategory::find($id)->delete();
        return response()->json([
                'subcategories' => SubCategory::with('categories')->get()
            ]);
    }

    public function search(){

        $request = app()->make('request');
        $subCat = SubCategory::where('name', 'like', '%'. $request->search . '%')
                            ->with('categories')
                            ->get();
        return response()->json([
                'subcategories' => $subCat
            ]);
    }

    public function paginatePage($collection){

       $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

        
    }
}
