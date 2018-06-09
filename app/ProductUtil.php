<?php

namespace App;

use App\Product;

class ProductUtil
{

    public static function createProduct(Product $product, int $idWeek) : int {

//         $product->bi  = 'don';

        $product->save();

        // Add for all weeks
        $weeks = Week::all();
        foreach ($weeks as $week) {

            $max_threshold = 0;
            if($week->id == $idWeek) {
                $max_threshold = $product->max_threshold;
            }

            $wp = new WeekProduct();
            $wp->id_week = $week->id;
            $wp->id_product = $product->id;
            $wp->max_threshold = $max_threshold;
            $wp->save();

        }

        return $product->id;

    }

    public static function updateProduct(Product $product, int $idWeek) : bool {

        $product->save();

        WeekProduct::where(['id_week' => $idWeek, 'id_product' => $product->id])->update(['max_threshold' => $product->max_threshold]);

        return true;

    }

}