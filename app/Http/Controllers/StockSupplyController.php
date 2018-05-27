<?php

namespace App\Http\Controllers;

use App\StockSupply;
use App\StockReal;
use Illuminate\Http\Request;

class StockSupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//     	$stockSupply = StockSupply::all();
    	$stockSupply= StockReal::with('product.category')->get();
//     	dd($stockSupply);
    	return view ( 'stock.supply.index', compact ( 'stockSupply' ) );
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
     * @param  \App\StockSupply  $stockSupply
     * @return \Illuminate\Http\Response
     */
    public function show(StockSupply $stockSupply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockSupply  $stockSupply
     * @return \Illuminate\Http\Response
     */
    public function edit(StockSupply $stockSupply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockSupply  $stockSupply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//     	return var_dump(json_decode($request->data));
//     	echo json_decode($request->_token, true);
//     	exit();
    	foreach($_POST as $key => $val) {
    		
    		echo 'Field name : '.$key .', Value : '.$val.'\n';
    		$data[$key] = $val;
    		
    		if (strpos($a, 'are') !== false){
    			
    		}
    	}
    	
    	exit();
    	$supply= StockSupply::find($request->index);
    	$supply->cat_name = $request->cat_name;
    	$supply->cat_desc = $request->cat_desc;
    	
    	$supply->save ();
    	\Session::flash('flash_message_success','Quantité modifiée');
    	$category = Category::all ();
    	$stockSupply= StockReal::with('product.category')->get();
    	return view ( 'stock.supply.index', compact ( 'stockSupply' ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockSupply  $stockSupply
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockSupply $stockSupply)
    {
        //
    }
}
