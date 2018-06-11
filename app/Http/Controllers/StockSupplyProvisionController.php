<?php

namespace App\Http\Controllers;

use App\StockSupply;
use Illuminate\Http\Request;
use App\StockFlow;
use Illuminate\Support\Facades\Auth;
use App\Product;

class StockSupplyProvisionController extends Controller
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
        // Getting all actives products
        $arrayProduct = Product::with('category')->where('active', true)->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view ( 'stock.supply.provision', compact ( 'arrayProduct' ) );
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
        $nbrProductAdded = 0;

        foreach ($request->qte as $id_product => $val) {
        	$qte_reel = is_numeric($val) ? $val : 0;
        	if($qte_reel <= 0 ) {
        		$qte_reel = 0;
        	}else{

        	    $price = $request->prices[$id_product];
        	    $price = preg_replace('/,/', '.', $price);
        	    $price = is_numeric($price) ? $price : 0;

        	    // Updating product price, with new price if changed
        	    $product = Product::find($id_product);
        	    if($product->unit_price != $price) {
        	        $product->unit_price = $price;
        	        $product->save();
        	    }

        		$supply = new StockSupply();
        		$supply->quantity_add = $qte_reel;
        		$supply->id_product = $id_product;
        		$supply->user_id = Auth::user()->getAuthIdentifier();
        		$supply->unit_price = $price;
        		$supply->save();
        		$nbrProductAdded++;
        	}
        }

        if($nbrProductAdded) {
            \Session::flash('flash_message_success', $nbrProductAdded . ' produits ajoutés');
        }else{
            \Session::flash('flash_message_error','Aucun produit ajouté');
        }

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
