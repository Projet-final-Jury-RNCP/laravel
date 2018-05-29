<?php

namespace App\Http\Controllers;

use App\StockSupply;
use App\StockReal;
use Illuminate\Http\Request;
use App\StockFlow;
use Illuminate\Support\Facades\Auth;

class StockSupplyController extends Controller
{
	private $index;
	private $quantity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	$stockSupply= StockReal::with('product.category')->get();
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
    	foreach ($request->qte as $key => $val){
    		if (StockReal::find($key)->quantity == $val) {
    			continue;
    		}else if(StockReal::find($key)->quantity > $val){
    			$supply = new StockFlow();
    			$supply -> quantity_add = $val - StockReal::find($key)->quantity;
    			$supply -> id_product = $key;
    			$supply -> user_id = Auth::user()->getAuthIdentifier();
    			$supply -> save();
    		}else{
    			$supply = new StockFlow();
    			$supply -> quantity_rem = StockReal::find($key)->quantity - $val;
    			$supply -> id_product = $key;
    			$supply -> user_id = Auth::user()->getAuthIdentifier();
    			$supply -> save();
    		}
    	}
    	
    	\Session::flash('flash_message_success','Quantité modifiée');
    	
    	return redirect('stock/approvisionner');
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
