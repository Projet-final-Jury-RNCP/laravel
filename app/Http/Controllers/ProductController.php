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
        $this->validate ( $request, [
            'name' => 'required|min:1|max:255',
        ] );
        
        $products = new Product ();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->id_measure_unit = $request->id_measure_unit;
        $products->id_category = $request->id_category;
        $products->min_threshold = $request->min_threshold;
        $products->max_threshold = $request->max_threshold;
        
        if(is_null($products->min_threshold)) {
            $products->min_threshold = 0;
        }
        
        if(is_null($products->max_threshold)) {
            $products->max_threshold = 0;
        }
        
        $products->save ();
        
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
        $this->validate ( $request, [
            'name' => 'required|min:1|max:255',
        ] );
        
        $products = Product::find($request->index);
        $products->active = true;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->id_measure_unit = $request->id_measure_unit;
        $products->id_category = $request->id_category;
        $products->min_threshold = $request->min_threshold;
        $products->max_threshold = $request->max_threshold;
        
        $products->save ();
        \Session::flash('flash_message_success','Produit modifié');
        $products = Product::all ();
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
        //         dd($category);  // Category
        //         dd($category->products); // Collection 0-n
        /*
        if($product->category->count()) {
            \Session::flash('flash_message_error','Produit non supprimé, car il est utilisée par des catégories');
            \Session::flash('flash_message_success','Produit désactivé');
            $product->active = false;
            $product->save ();
        }else{
            Product::destroy($product->id);
            \Session::flash('flash_message_success','Produit supprimé');
        }
        */
        Product::destroy($product->id);

        return redirect('stock/produits');
    }
}
