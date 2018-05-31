<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\MeasureUnit;
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
        if(is_null($request->min_threshold)) {
            $request['min_threshold'] = '0';

        }
        if(is_null($request->max_threshold)) {
            $request['max_threshold'] = '0';
        }
//         dd($request);


        $this->validate ( $request, [
            'name' => 'required|min:1|max:255|unique:products',

            'min_threshold' => 'min:0|digits_between:0,6',
            'max_threshold' => 'min:0|digits_between:0,6',

            // min_threshold <= max_threshold
            'min_threshold' => 'lte:max_threshold',
            'max_threshold' => 'gte:min_threshold',

            // https://laravel.com/docs/5.6/validation
            // A Note On Optional Fields
            // By default, Laravel includes the TrimStrings and ConvertEmptyStringsToNull

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

//         if(is_null($products->description)) {
//             $products->description = "";
//         }

        $products->save ();

        \Session::flash('flash_message_success', 'Produits créé : ' . $products->name);

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
    	\Session::flash('is_update',true);
    	
        if(is_null($request->min_threshold)) {
            $request['min_threshold'] = '0';

        }
        if(is_null($request->max_threshold)) {
            $request['max_threshold'] = '0';
        }
        //         dd($request);


        $this->validate ( $request, [
            'name' => 'required|min:1|max:255', // |unique:products

            'min_threshold' => 'min:0|digits_between:0,6',
            'max_threshold' => 'min:0|digits_between:0,6',

            // min_threshold <= max_threshold
            'min_threshold' => 'lte:max_threshold',
            'max_threshold' => 'gte:min_threshold',

            // https://laravel.com/docs/5.6/validation
            // A Note On Optional Fields
            // By default, Laravel includes the TrimStrings and ConvertEmptyStringsToNull

        ] );

//         $this->validate ( $request, [
//             'name' => 'required|min:1|max:255',
//         ] );

        $product = Product::find($request->index);
        $product->active = true;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->id_measure_unit = $request->id_measure_unit;
        $product->id_category = $request->id_category;
        $product->min_threshold = $request->min_threshold;
        $product->max_threshold = $request->max_threshold;

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
        //         dd($category);  // Category
        //         dd($category->products); // Collection 0-n

//         dd($product);  // Product
//         dd($product->category); // Category
//         dd($product->category->count()); // 14
//         dd($product->category->get());  // Collection 14

//         dd(Category::find($product->id_category));
//         dd(Category::find($product->id_category)->with('products'));
//         dd(Category::find($product->id_category)->with('products')->get());
//         dd(Category::with('products')->where('id', $product->id_category)->get());
//         dd(Category::with('products')->where('id', $product->id_category)->first());
//         dd(Category::with('products')->where('id', $product->id_category)->first()->products());
//         dd(Category::with('products')->where('id', $product->id_category)->first()->products()->count());

//         $nbProductsInCategory = Category::with('products')->where('id', $product->id_category)->first()->products()->count();


        // Pour être supprimé, il ne doit pas être dans les stocks (supply/flow)

        $countFlow = StockFlow::where('id_product', '=', $product->id)->count();
        $countSupply = StockSupply::where('id_product', '=', $product->id)->count();

        $nbProductsExternalUsed = $countFlow + $countSupply;

        if($nbProductsExternalUsed > 0) {
            \Session::flash('flash_message_error','Produit non supprimé, car il est utilisé dans le stock');
            \Session::flash('flash_message_success','Produit désactivé : ' . $product->name);
            $product->active = false;
            $product->save ();
        }else{
            Product::destroy($product->id);
            \Session::flash('flash_message_success','Produit supprimé : ' . $product->name);
        }

        return redirect('stock/produits');
    }
}
