<?php

namespace App\Http\Controllers;

use App\Product;
use App\StockFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockFlowPushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * On veut tous les produits qui sont sortis (actifs pour simplifier)
         */
        $arrayProduct = Product::with('category')->where('active', true)->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        return view ( 'stock.flow.push', compact ( 'arrayProduct' ) );
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
        $nbrProductPush = 0;

        foreach ($request->qte as $id_product => $val) {
            $qte_virtual = Product::find($id_product)->quantity;
            $qte_reel = is_numeric($val) ? $val : 0;
            if($qte_reel <= 0 ) {
                $qte_reel = 0;
            }else{

                $supply = new StockFlow();
                $supply->quantity_add = $qte_reel;
                $supply->id_product = $id_product;
                $supply->user_id = Auth::user()->getAuthIdentifier();
                $supply->save();
                $nbrProductPush++;
            }
        }

        if($nbrProductPush) {
            \Session::flash('flash_message_success', $nbrProductPush . ' produits retrounés');
        }else{
            \Session::flash('flash_message_error','Aucun produit retrouné');
        }

        return redirect('stock/retourner');
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
