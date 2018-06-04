<?php

namespace App\Http\Controllers;

use App\StockFlow;
use App\Week;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use PDF;
use App\WeekProduct;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Week $week)
    {
        /*
         * On veut tous les produits actifs, dont : QTE_STOCK - QTE_MAX < 0
         */
//         $arrayProduct = Product::with('category')
//         ->whereRaw('quantity < max_threshold')
//         ->where('active', true)
//         ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $id_week = $week->id;

        $arrayProduct = Product::with('category') // ->with('product')
        ->join('week_products', 'products.id', '=', 'week_products.id_product')
        ->join('measure_units', 'products.id_measure_unit', '=', 'measure_units.id')
        ->whereRaw('quantity < week_products.max_threshold')
        ->where('active', true)
        ->where('week_products.id_week', $id_week)
        ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $total = 0;

        foreach ($arrayProduct as $product) {
            $qte = $product->max_threshold - $product->quantity;
        	$prix = $product->unit_price;
        	$total += $prix * $qte;
        }

        return view ( 'stock.shopping.shop', compact ( 'arrayProduct', 'total', 'week') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks = Week::all();
        return view ( 'stock.shopping.chooseweek', compact ( 'weeks' ) );
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


    /**
     * Export shop list as PDF
     */
    public function pdf(Week $week) {

//         $arrayProduct = Product::with('category')
//         ->whereRaw('quantity < max_threshold')
//         ->where('active', true)
//         ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $id_week = $week->id;

        $arrayProduct = Product::with('category') // ->with('product')
        ->join('week_products', 'products.id', '=', 'week_products.id_product')
        ->join('measure_units', 'products.id_measure_unit', '=', 'measure_units.id')
        ->whereRaw('quantity < week_products.max_threshold')
        ->where('active', true)
        ->where('week_products.id_week', $id_week)
        ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        $pdf = PDF::loadView('stock.shopping.pdf', compact('arrayProduct' , 'week'));
        return $pdf->download('Courses_' . date('Y-m-d') . '.pdf');

    }
}
