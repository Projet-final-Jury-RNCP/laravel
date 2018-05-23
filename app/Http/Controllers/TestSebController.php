<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class TestSebController extends Controller
{

    public function a(Request $request)
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

}
