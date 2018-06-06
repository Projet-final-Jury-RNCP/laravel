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
        $faker = Faker::create();

        $weeks = Week::all();
        $products = Product::all();

        foreach($weeks as $week) {
            foreach($products as $product) {
                WeekProduct::create([
                    'id_week' => $week->id,
                    'id_product' => $product->id,
//                     'max_threshold' => $product->max_threshold +1
                    'max_threshold' => $faker->numberBetween($min = 0, $max = 30),
                ]);
            }
        }

    }
}