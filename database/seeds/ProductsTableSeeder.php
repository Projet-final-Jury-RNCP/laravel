<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach(range(1, 10) as $index)
        {
            // https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous
            Product::create([
                'id_measure_unit' => 1,
                'id_category' => 1,
                'name' => $faker->word,
                'description' => $faker->text,
                'min_threshold' => $faker->numberBetween($min = 0, $max = 10),
                'max_threshold' => $faker->numberBetween($min = 0, $max = 30)
            ]);
        }
    }
}
