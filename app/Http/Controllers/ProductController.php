<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\MeasureUnit;
use App\Week;
use App\WeekProduct;
use Illuminate\Http\Request;
use App\StockFlow;
use App\StockSupply;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weeks = Week::all();
        return view ( 'stock.products.chooseweek', compact ( 'weeks' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null($request->min_threshold)) {
            $request['min_threshold'] = '0';
        }
        if(is_null($request->max_threshold)) {
            $request['max_threshold'] = '0';
        }
        if(is_null($request->price)) {
            $request['price'] = '0';
        }

        $this->validate ( $request, [
            'name' => 'required|min:1|max:255|unique:products',

            'min_threshold' => 'min:0|digits_between:0,6',
            'max_threshold' => 'min:0|digits_between:0,6',

            // min_threshold <= max_threshold
            'min_threshold' => 'lte:max_threshold',
            'max_threshold' => 'gte:min_threshold',

            'price' => 'min:0|numeric'
        ] );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->id_measure_unit = $request->id_measure_unit;
        $product->id_category = $request->id_category;
        $product->min_threshold = $request->min_threshold;
        $product->max_threshold = $request->max_threshold;

        if(is_null($product->min_threshold)) {
            $product->min_threshold = 0;
        }

        if(is_null($product->max_threshold)) {
            $product->max_threshold = 0;
        }

        $product->unit_price = $request->price;

        $product->save();

        \Session::flash('flash_message_success', 'Produits créé : ' . $product->name);

        return redirect('stock/produits');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	\Session::flash('is_update',$request->index);

        if(is_null($request->min_threshold)) {
            $request['min_threshold'] = '0';
        }
        if(is_null($request->max_threshold)) {
            $request['max_threshold'] = '0';
        }
        if(is_null($request->price)) {
            $request['price'] = '0';
        }

        $this->validate ( $request, [
            'name' => 'required|min:1|max:255', // |unique:products

            'min_threshold' => 'min:0|digits_between:0,6',
            'max_threshold' => 'min:0|digits_between:0,6',

            // min_threshold <= max_threshold
            'min_threshold' => 'lte:max_threshold',
            'max_threshold' => 'gte:min_threshold',

            'price' => 'min:0|numeric'

        ] );

        $product = Product::find($request->index);
        $product->active = true;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->id_measure_unit = $request->id_measure_unit;
        $product->id_category = $request->id_category;
        $product->min_threshold = $request->min_threshold;
        $product->max_threshold = $request->max_threshold;
        $product->unit_price = $request->price;

        $product->save ();

        \Session::flash('flash_message_success','Produit modifié : ' . $product->name);

        return redirect('stock/produits');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Pour être supprimé, il ne doit pas être dans les stocks (supply/flow)

        $id_product = $product->id;

        $countFlow = StockFlow::where('id_product', '=', $product->id)->count();
        $countSupply = StockSupply::where('id_product', '=', $product->id)->count();

        $nbProductsExternalUsed = $countFlow + $countSupply;

        if($nbProductsExternalUsed > 0) {
            \Session::flash('flash_message_error','Produit non supprimé, car il est utilisé dans le stock');
            \Session::flash('flash_message_success','Produit désactivé : ' . $product->name);
            $product->active = false;
            $product->save ();
        }else{
            WeekProduct::where(['id_product' => $id_product])->delete();
            Product::destroy($product->id);
            \Session::flash('flash_message_success','Produit supprimé : ' . $product->name);
        }

        return redirect('stock/produits');
    }
}
