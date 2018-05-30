<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\MeasureUnit;
use Illuminate\Http\Request;

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
        $products = Product::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $categories = Category::all()->sortBy('cat_name', SORT_NATURAL|SORT_FLAG_CASE);
        $measures = MeasureUnit::all()->sortBy('measure_name', SORT_NATURAL|SORT_FLAG_CASE);
        return view ( 'stock.products.create', compact ( 'products', 'categories', 'measures' ) );
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //         dd($category);  // Category
        //         dd($category->products); // Collection 0-n

        if($product->category->count()) {
            \Session::flash('flash_message_error','Produit non supprimé, car il est utilisée par des catégories');
            \Session::flash('flash_message_success','Produit désactivé');
            $product->active = false;
            $product->save ();
        }else{
            Category::destroy($category->id);
            \Session::flash('flash_message_success','Produit supprimé');
        }

        return redirect('stock/porduits');
    }
}
