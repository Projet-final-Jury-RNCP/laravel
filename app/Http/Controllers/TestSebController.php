<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\StockReal;
use App\StockFlow;
use App\StockSupply;
use App\Week;
use App\WeekProduct;
use Illuminate\Support\Facades\DB;

class TestSebController extends Controller
{

    public function dbrelations(Request $request)
    {

        $id_category = 1;
//         $id_category = 2;
//         $id_category = 100;
        $category = Category::find($id_category);   // Category

//         dump($category); dd(); // null | Category

        echo "category id:" . $category->id . " cate_name:" . $category->cat_name . PHP_EOL;

//         echo '<pre>';
//         var_dump($category);
//         echo '</pre>';

//         (new Dumper)->dump($category);

        dump($category);
        dump($category->products());    // HasMany
//         dump($category->products()->get(0));    // Argument 1 passed to Illuminate\Database\Grammar::columnize() must be of the type array, integer given
//         dump($category->products()->get([0]));    // SQLSTATE[42S22]: Column not found: 1054 Unknown column '0' in 'field list' (SQL: select `0` from `products` where `products`.`id_category` = 1 and `products`.`id_category` is not null)
        dump($category->products()->getResults());  // Collection
        dump($category->products);  // Collection
        dump(count($category->products));

        echo "---------- PRODUIT ";

        $product = Product::first(); // Product
        dump($product);
        dump($product->category()); // BelongsTo
        dump($product->category()->getResults());   // null
//         dump($product->category()->cat_name); // null
//         dump($product->cat_name);   // null
        dump($product->category()->get());  // Collection
//         dump($product->category->cat_name); // Trying to get property 'cat_name' of non-object
//         dump($product->category()->cat_name); // Undefined property: Illuminate\Database\Eloquent\Relations\BelongsTo::$cat_name
//         dump($product->category()[0]->cat_name); // Cannot use object of type Illuminate\Database\Eloquent\Relations\BelongsTo as array
//         dump($product->category->cat_name); // Trying to get property 'cat_name' of non-object
        dump($product->category); // Category






        //         dd($category->products());
        //         dd($category->products()[0]);   // Cannot use object of type Illuminate\Database\Eloquent\Relations\HasMany as array
//         dd($category->products()->getResults()); // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'products.category_id' in 'where clause' (SQL: select * from `products` where `products`.`category_id` = 1 and `products`.`category_id` is not null)

        //         \Illuminate\Database\Eloquent\Relations\HasMany;

        //         $hasMany = new Illuminate\Database\Eloquent\Relations\HasMany;
        //         $hasMany->


        dd('EOF');



    }


    public function flashmessage(Request $request)
    {
        $request->session()->flash('flash_message_success', __('Thanks for your comment. It will appear when an administrator has validated it.<br>Once you are validated your other comments immediately appear.'));

        \Session::flash('flash_message_success','Office successfully added.'); //<--FLASH MESSAGE
        \Session::flash('flash_message_error','Office successfully NO added.'); //<--FLASH MESSAGE

//         return redirect('/stock/categories');
        return redirect('/home');
    }

    public function stockreel(Request $request)
    {
//         $stocks = StockReal::all();

//         dd($stocks[0]->product());
//         dd($stocks[0]->product()->category());

//         dd($stocks[0]->product());  // HasOne
//         dd($stocks[0]->product);    // Product  ok avec le StockReal hasOne('App\Product', 'id')    // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'products.id_product' in 'where clause' (SQL: select * from `products` where `products`.`id_product` = 1 and `products`.`id_product` is not null limit 1)
//         dd($stocks[0]->product()->getResults());    // Product
//         dd($stocks[0]->product()->get());   // Collection


//         https://www.amitmerchant.com/Laravel-Eager-Loading-Load-Vs-With/     Laravel Eager Loading - load() Vs. with()
//         https://laravel-news.com/eloquent-eager-loading                      Optimize Laravel Eloquent Queries with Eager Loading

//         $stocks = StockReal::all();
//         $stocks->load('product.category');                       // force le chargement des dependances

//         $stocks = StockReal::get();                             // eager loading
        $stocks = StockReal::with('product.category')->get();   // eager loading

//         foreach ($stocks as $stock) {

// //             dump($stock);
//             echo $stock->id_product . ' QTE:' . $stock->quantity . $stock->product . ' (';

//         }

//         die();


//         $stocks = StockSupply::with('product.category')->get();   // eager loading
//         $stocks = StockFlow::with('product.category')->get();   // eager loading

        return $stocks;
    }


    public function week(Request $request)
    {
        // https://laravel.sillo.org/les-relations-avec-eloquent-12/

//         $r = Week::all();   // Collection
//         $r = Week::with('products')->get(); // Collection:Week avec relation "products" Collection:WeekProduct
//         $r = Week::with('products')->with('product')->get();    // Call to undefined relationship [product] on model [App\Week].
//         $r = Week::with('products', 'product')->get();    // Call to undefined relationship [product] on model [App\Week].
//         $r = Week::with('products')->get()->with('product'); // Method Illuminate\Database\Eloquent\Collection::with does not exist.
//         $r = Week::with('productss')->get(); // SQLSTATE[42S22]: Column not found: 1054 Unknown column 'week_products.id' in 'on clause' (SQL: select `products`.*, `week_products`.`id_week` from `products` inner join `week_products` on `week_products`.`id` = `products`.`id` where `week_products`.`id_week` in (1, 2, 3))
//         $r = Week::with('productsss')->get();




//         257 Execute	select * from `weeks`
//         257 Execute	select * from `week_products` where `week_products`.`id_week` in (1, 2, 3)
//         257 Execute	select `products`.*, `week_products`.`id_week` as `pivot_id_week`, `week_products`.`id_product` as `pivot_id_product` from `products` inner join `week_products` on `products`.`id` = `week_products`.`id_product` where `week_products`.`id_week` in (1, 2, 3)
        // Collection:Week + relation"productsss"Collection:WeekProduct + relation"productss"Collection:Product
//         $r = Week::with('productsss')->with('productss')->get();
//         $r = Week::where('id', 3)->get();
//         $r = Week::where('id', 3)->with('productsss')->with('productss')->get();
//         dd($r);


//         $r = WeekProduct::all();    // Collection
//         $r = WeekProduct::with('week')->get();    // Collection
//         $r = WeekProduct::with('week')->with('product')->get();    // Collection
//         415 Execute	select * from `week_products`
//         415 Execute	select * from `products` where `products`.`id` in (1, 2, 11)
//         $r = WeekProduct::with('product')->get();    // Collection:WeekProduct + relation"product":Product
//         $r = WeekProduct::with('product')->where('id_week', 2)->get();    // Collection:WeekProduct + relation"product":Product
//         dd($r);

//         $weekProducts = WeekProduct::with('product')->where('id_week', 2)->get();
//         foreach( $weekProducts as $weekProduct) {
//             dump($weekProduct->product());  // HasOne
//             dump($weekProduct->product);    // Product
//             dump($weekProduct->product->name);    // "Eau de source"
//         }

        $r = WeekProduct::find(array('id_week' => '11', 'id_product' => '11'));
//         "id_week" => 3
//         "id_product" => 2
        $wp = $r[0];
        $wp->max_threshold++;
        $wp->save();
        dump($r);


//         $r = DB::table('products')
//         ->join('week_products', 'week_products.id_product', '=', 'products.id')
//         ->select('week_products.max_threshold', 'products.*')
//         ->get();
//         dd($r); // Collection:array (row)
    }

}
