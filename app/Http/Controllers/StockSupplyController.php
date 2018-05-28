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
//     	dd($request->qte);	
    	
    	foreach ($request->qte as $key => $val){
			$supply = new StockFlow();
			$supply -> quantity_add = $val;
			$supply -> id_product = $key;
			$supply -> user_id = Auth::user()->getAuthIdentifier();
			$supply -> save();
    	}
    	
//     	return var_dump(json_decode($request->data));
//     	echo json_decode($request->_token, true);
//     	exit();

//     	foreach($request->request as $key => $val) 
//     	{

//     		if (strpos($key, 'index') !== false){
// //     			echo 'Field name : '.$key .', Value : '.$val.'<br>';
//     			$this->index=$val;
//     		}else if (strpos($key, 'qte') !== false){
// //     			echo 'Field name : '.$key .', Value : '.$val.'<br>';
//     			$this->quantity = $val;
    			
//     			if (!empty($this->index) && !empty($this->quantity)) {
//     				$supply = StockFlow::find($this->index);
//     				$supply->quantity_add = $this->quantity;
//     			}
// //     			echo $this->index."<br>";
// //     			echo $this->quantity."<br>";
//     			$this->index="";
//     			$this->quantity="";
//     		}
//     	}
    	
//     	exit();
//     	$supply = new StockFlow();
//     	$supply->id_product = $request->index;
//     	$supply->quantity_add= $request->quantity_add;
    	
//     	$supply->save ();
    	\Session::flash('flash_message_success','Quantité modifiée');
//     	$category = Category::all ();
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
