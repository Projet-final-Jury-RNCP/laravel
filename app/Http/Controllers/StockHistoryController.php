<?php

namespace App\Http\Controllers;

use App\StockFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\StockSupply;

class StockHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $builderStockFlow = StockFlow::with('product')
        ->addSelect('*')
        ->addSelect(DB::raw('"Sortie" as typestock'))
        ;

        $builderStockHistory = StockSupply::with('product')
        ->addSelect('*')
        ->addSelect(DB::raw('"Appro" as typestock'))
        ;

        $arrayStockHistory = $builderStockHistory

        ->unionAll($builderStockFlow)

        ->orderBy('created_at', 'DESC')

        ->get()
        ;

        $arrayDatePrice = DB::select('SELECT DATE_FORMAT(created_at, "%Y-%m") AS date, SUM(unit_price * quantity_add) AS price FROM stock_supplies GROUP BY 1 ORDER BY 1 DESC');

        return view ( 'stock.history.history', compact ( 'arrayStockHistory', 'arrayDatePrice' ) );
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
