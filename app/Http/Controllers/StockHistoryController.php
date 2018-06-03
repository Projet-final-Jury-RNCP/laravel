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
        /*
         * On veut tous les produits actifs, dont ?.... quel choix ?.... :
         * QTE_STOCK - QTE_MAX < 0 ?
         * QTE_STOCK - QTE_MIN < 0 ?
         * AUTRE ?...
         */
//         $arrayProduct = Product::with('category')
//         ->whereRaw('quantity < max_threshold')
//         ->where('active', true)
//         ->get()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);

        // https://laravel.com/docs/5.6/queries#unions



//         $first = DB::table('stock_flows')
// //         ->whereNull('first_name')
// //         ->get(['url', DB::raw('1 as active')])  // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'url' in 'field list' (SQL: select `url`, 1 as active from `stock_flows`)


//         ->selectSub(function ($query) {
//             $query->selectRaw('1');
//         }, 'active')

//         ;

//         $first = DB::table('stock_flows');
//         dd($first); // Builder

//         $first = DB::table('stock_flows')
//         ->columns = ['created_at']
//         ;
//         dd($first); // array

//         stock_supplies : id created_at	updated_at	user_id	id_product	expiry_date	quantity_add	quantity_rem	unit_price
        $first = DB::table('stock_flows')
        ->select = ['created_at', 'user_id', 'id_product', 'quantity_add', 'quantity_rem', 'unit_price']
        ;
//         dd($first); // array

        $first = DB::table('stock_flows')
        ->addSelect('*')
//         ->addSelect('1 as age') // (select *, `1` as `age` from `stock_flows`) order by `created_at` desc)
        ->addSelect(DB::raw('"flow" as stock')) // (select *, "flow" as stock from `stock_flows`)
        ;



//         $first = DB::table('stock_flows')->get(['*', DB::raw('1 as active')]);
//         dd($first); // Collection

            // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_at' in 'order clause' (SQL: (select (select 1) as `active` from `stock_supplies`) union all (select (select 1) as `active` from `stock_flows`) order by `created_at` desc)

        $arrayStockHistory = DB::table('stock_supplies')
//         ->whereNull('last_name')

//         ->get(['url', DB::raw('0 as active')])


//         ->selectSub(function ($query) {
//             $query->selectRaw('1');
//         }, 'active')

//         ->select = ['created_at', 'user_id', 'id_product', 'quantity_add', 'quantity_rem', 'unit_price']


        ->addSelect('*')
        //         ->addSelect('1 as age') // (select *, `1` as `age` from `stock_flows`) order by `created_at` desc)
        ->addSelect(DB::raw('"supplies" as stock')) // (select *, "flow" as stock from `stock_flows`)



        ->unionAll($first)

        ->orderBy('created_at', 'DESC')   // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'created_date' in 'order clause' (SQL: (select * from `stock_supplies`) union all (select * from `stock_flows`) order by `created_date` desc)

//         ->get()
        ;
//         (select *, "supplies" as stock from `stock_supplies`) union all (select *, "flow" as stock from `stock_flows`) order by `created_at` desc

//         dd($arrayStockHistory);


//         $arrayStockHistory = StockSupply::with('productpourtest')->get();
//         $arrayStockHistory = StockSupply::with('product')->get();



        $builderStockFlow = StockFlow::with('product')
        ->addSelect('*')
        ->addSelect(DB::raw('"Sortie" as typestock'))
        ;
//         dd($builderStockFlow); // Builder

        $builderStockHistory = StockSupply::with('product')
        ->addSelect('*')
        ->addSelect(DB::raw('"Appro" as typestock'))
        ;
//         dd($builderStockHistory); // Builder

        $arrayStockHistory = $builderStockHistory

        ->unionAll($builderStockFlow)

        ->orderBy('created_at', 'DESC')

        ->get()
        ;
        // (select *, "Appro" as typestock from `stock_supplies`) union all (select *, "Sortie" as typestock from `stock_flows`) order by `created_at` desc

//         echo "<pre>";
//         foreach( $arrayStockHistory as $key => $val) {
// //             echo " " . $key . " : "  . $val->id  . PHP_EOL;
//             echo $key . " : "  . $val->id  . PHP_EOL;
// //             echo 'MEAL' . $val->id_meal  . PHP_EOL;
// //             echo 'EXPI' . $val->expiry_date  . PHP_EOL;
// //             dump($val);
//         }
//         echo "</pre>";
//         (select * from `stock_supplies`) union all (select * from `stock_flows`) order by `created_at` desc
//         (select * from `stock_supplies`) union all (select * from `stock_flows`) order by `created_at` desc


//         dd($arrayStockHistory[0]);  // StockSupply
//         dd($arrayStockHistory[0]->product);  // Product
//         dd($arrayStockHistory[0]->product());  // HasOne
//         dd($arrayStockHistory[0]->product->name);
//         dd($arrayStockHistory[0]->product);
//         dd($arrayStockHistory);

        $stockHistory = $arrayStockHistory[0];
//         dd($stockHistory->product);  // Product
//         dd($stockHistory->product());  // HasOne
//         dd($stockHistory->product->name);   // "Coca 1.5L"
//         dd($stockHistory->product->category()); // BelongsTo
//         dd($stockHistory->product->category); // Category
//         dd($stockHistory->product->category->cat_name); // "Alimentaire"


        // Price / month
//         DB::raw($value) // Expression
//         DB::select($query) // array
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
