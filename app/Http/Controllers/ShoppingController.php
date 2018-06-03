<?php

namespace App\Http\Controllers;

use App\StockFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
         * On veut tous les produits actifs, dont ?.... quel choix ?.... :
         * QTE_STOCK - QTE_MAX < 0 ?
         * QTE_STOCK - QTE_MIN < 0 ?
         * AUTRE ?...
         */
        $arrayProduct = Product::with('category')
        ->whereRaw('quantity < max_threshold')
        ->where('active', true)
        ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        
        $total = $arrayProduct->sum('unit_price');
        return view ( 'stock.shopping.shop', compact ( 'arrayProduct', 'total') );
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
        //
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
