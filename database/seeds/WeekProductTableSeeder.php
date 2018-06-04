<?php

use Faker\Factory as Faker;

use App\WeekProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Week;

class WeekProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//         WeekProduct::create([
//             'id_week' => 2,
//             'id_product' => 1,
//             'max_threshold' => 1
//         ]);

//         WeekProduct::create([
//             'id_week' => 2,
//             'id_product' => 11,
//             'max_threshold' => 11
//         ]);

//         WeekProduct::create([
//             'id_week' => 3,
//             'id_product' => 1,
//             'max_threshold' => 31
//         ]);

//         WeekProduct::create([
//             'id_week' => 3,
//             'id_product' => 2,
//             'max_threshold' => 32
//         ]);


        $weeks = Week::all();
        $products = Product::all();

        foreach($weeks as $week) {
            foreach($products as $product) {
                WeekProduct::create([
                    'id_week' => $week->id,
                    'id_product' => $product->id,
                    'max_threshold' => $product->max_threshold +1
                ]);
            }
        }

    }
}