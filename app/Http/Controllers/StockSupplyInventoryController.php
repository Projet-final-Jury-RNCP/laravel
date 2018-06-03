<?php

namespace App\Http\Controllers;

use App\StockSupply;
use App\StockReal;
use Illuminate\Http\Request;
use App\StockFlow;
use Illuminate\Support\Facades\Auth;
use App\Product;

class StockSupplyInventoryController extends Controller
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
        /*
         * On veut tous les produits actifs
         */
        $arrayProduct = Product::with('category')->where('active', true)->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view ( 'stock.supply.inventory', compact ( 'arrayProduct' ) );
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
        $nbrProductChanged = 0;

        foreach ($request->qte as $id_product => $val) {

//     	    $qte_virtual = StockReal::find($id_product)->quantity;
            $qte_virtual = Product::find($id_product)->quantity;
    	    $qte_reel = is_numeric($val) ? $val : 0;
    	    if($qte_reel < 0 ) {
    	        $qte_reel = 0;
    	    }

    	    if($qte_virtual < $qte_reel) {
    	        $supply = new StockSupply();
    	        $supply->quantity_add = $qte_reel - $qte_virtual;
    	        $supply->id_product = $id_product;
    	        $supply->user_id = Auth::user()->getAuthIdentifier();
    	        $supply->save();
    	        $nbrProductChanged++;
    	    }elseif ($qte_virtual > $qte_reel) {
    	        $supply = new StockSupply();
    	        $supply->quantity_rem = $qte_virtual - $qte_reel;
    	        $supply->id_product = $id_product;
    	        $supply->user_id = Auth::user()->getAuthIdentifier();
    	        $supply->save();
    	        $nbrProductChanged++;
    	    }

    	}

    	if($nbrProductChanged) {
    	    \Session::flash('flash_message_success','Quantité modifiée (' . $nbrProductChanged . ' produits modifiés)');
    	}else{
    	    \Session::flash('flash_message_error','Quantité modifiée (aucun changement)');
    	}

    	return redirect('stock/inventorier');
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
