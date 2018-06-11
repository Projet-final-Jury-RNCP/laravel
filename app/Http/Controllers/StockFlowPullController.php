<?php

namespace App\Http\Controllers;

use App\StockFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class StockFlowPullController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Getting all available products : QTE > 0
        $arrayProduct = Product::with('category')->where('quantity', '>', 0)->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view ( 'stock.flow.pull', compact ( 'arrayProduct' ) );
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
     * @param  \App\StockFlow  $stockFlow
     * @return \Illuminate\Http\Response
     */
    public function show(StockFlow $stockFlow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockFlow  $stockFlow
     * @return \Illuminate\Http\Response
     */
    public function edit(StockFlow $stockFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockFlow  $stockFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockFlow $stockFlow)
    {
        $nbrProductPull = 0;

        foreach ($request->qte as $id_product => $val) {
            $qte_virtual = Product::find($id_product)->quantity;
            $qte_reel = is_numeric($val) ? $val : 0;
            if($qte_reel <= 0 ) {
                $qte_reel = 0;
            }else{

                if($qte_reel > $qte_virtual) {  // we do not go out more than there is in the stock
                    $qte_reel = $qte_virtual;
                }

                $supply = new StockFlow();
                $supply->quantity_rem = $qte_reel;
                $supply->id_product = $id_product;
                $supply->user_id = Auth::user()->getAuthIdentifier();
                $supply->save();
                $nbrProductPull++;
            }
        }

        if($nbrProductPull) {
            \Session::flash('flash_message_success', $nbrProductPull . ' produits sortis');
        }else{
            \Session::flash('flash_message_error','Aucun produit sorti');
        }

        return redirect('stock/sortir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockFlow  $stockFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockFlow $stockFlow)
    {
        //
    }
}
