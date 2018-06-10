<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\MeasureUnit;
use Illuminate\Http\Request;
use App\StockFlow;
use App\StockSupply;

use App\Week;
use App\WeekProduct;
use App\ProductUtil;

class ProductWeekController extends Controller
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
    public function create($id_week)
    {

        $products = Product::all()->sortBy('name', SORT_NATURAL|SORT_FLAG_CASE);
        $categories = Category::all()->sortBy('cat_name', SORT_NATURAL|SORT_FLAG_CASE)->where('active', true);
        $measures = MeasureUnit::all()->sortBy('measure_name', SORT_NATURAL|SORT_FLAG_CASE);

        $week = Week::findOrFail($id_week);
        $weekproducts = WeekProduct::with('product')->where('id_week', $id_week)->get();    // Collection:WeekProduct + relation"product":Product
//         dd($weekProducts);

        return view ( 'stock.products.createweek', compact ( 'products', 'categories', 'measures', 'week', 'weekproducts' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id_product = 0; // $request->index;
        $id_week = $request->id_week;

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

            // https://laravel.com/docs/5.6/validation
            // A Note On Optional Fields
            // By default, Laravel includes the TrimStrings and ConvertEmptyStringsToNull

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

//         if(is_null($product->description)) {
//             $product->description = "";
//         }
        $product->unit_price = $request->price;

//         $product->save();

//         $id_product = $product->id;




//         // Add for all weeks
//         $weeks = Week::all();
//         foreach ($weeks as $week) {

//             $max_threshold = 0;
//             if($week->id == $id_week) {
//                 $max_threshold = $request->max_threshold;
//             }

// //         WeekProduct::where(['id_week' => $id_week, 'id_product' => $id_product])->update(['max_threshold' => $request->max_threshold]);
//             $wp = new WeekProduct();
//             $wp->id_week = $week->id;
//             $wp->id_product = $id_product;
//             $wp->max_threshold = $max_threshold;
//             $wp->save();

//         }

        ProductUtil::createProduct($product, $id_week);

        \Session::flash('flash_message_success', 'Produits créé : ' . $product->name);

        return redirect('stock/produits/semaines/' . $id_week);
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

    	$id_product = $request->index;
    	$id_week = $request->id_week;

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

            // https://laravel.com/docs/5.6/validation
            // A Note On Optional Fields
            // By default, Laravel includes the TrimStrings and ConvertEmptyStringsToNull

        ] );

//         $this->validate ( $request, [
//             'name' => 'required|min:1|max:255',
//         ] );

        $product = Product::find($id_product);
//         $product->active = true;
//         $product->name = $request->name;
//         $product->description = $request->description;
//         $product->id_measure_unit = $request->id_measure_unit;
//         $product->id_category = $request->id_category;
//         $product->min_threshold = $request->min_threshold;
// //         $product->max_threshold = $request->max_threshold;
//         $product->unit_price = $request->price;
//         $product->save();

// //         $wp = WeekProduct::find(array('id_week' => $id_week, 'id_product' => $id_product))->first();
// //         $wp->max_threshold = $request->max_threshold;
// //         $wp->save();
//         WeekProduct::where(['id_week' => $id_week, 'id_product' => $id_product])->update(['max_threshold' => $request->max_threshold]);


        $product->max_threshold = $request->max_threshold;

        ProductUtil::updateProduct($product, $id_week);

        \Session::flash('flash_message_success','Produit modifié : ' . $product->name);

        return redirect('stock/produits/semaines/' . $id_week);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Week $week, Product $product)
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

//         $id_week = $week->id;
//         $id_product = $product->id;

//         $countFlow = StockFlow::where('id_product', '=', $product->id)->count();
//         $countSupply = StockSupply::where('id_product', '=', $product->id)->count();

//         $nbProductsExternalUsed = $countFlow + $countSupply;

//         if($nbProductsExternalUsed > 0) {
//             \Session::flash('flash_message_error','Produit non supprimé, car il est utilisé dans le stock');
//             \Session::flash('flash_message_success','Produit désactivé : ' . $product->name);
//             $product->active = false;
//             $product->save ();
//         }else{
//             WeekProduct::where(['id_week' => $id_week, 'id_product' => $id_product])->delete();
//             Product::destroy($product->id);
//             \Session::flash('flash_message_success','Produit supprimé : ' . $product->name);
//         }


        $id_week = $week->id;
        $msg = ProductUtil::deleteProduct($product, $week);
        \Session::flash('flash_message_success', $msg);

        return redirect('stock/produits/semaines/' . $id_week);
    }
}
