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

        Product::create([
            'id' => 1,
            'active' => true,
            'id_measure_unit' => 2,
            'id_category' => 1,
            'name' => 'Eau de source',
            'description' => 'eau de source',
            'min_threshold' => 10,
            'max_threshold' => 30
        ]);

        Product::create([
            'id' => 2,
            'active' => true,
            'id_measure_unit' => 5,
            'id_category' => 1,
            'name' => 'Eau 1.5L',
            'description' => 'eau en btl',
            'min_threshold' => 50,
            'max_threshold' => 100
        ]);

        Product::create([
            'id' => 3,
            'active' => true,
            'id_measure_unit' => 2,
            'id_category' => 1,
            'name' => 'Vinaigre',
            'description' => '',
            'min_threshold' => 1,
            'max_threshold' => 3
        ]);

        Product::create([
            'id' => 4,
            'active' => false,
            'id_measure_unit' => 4,
            'id_category' => 1,
            'name' => 'Poison',
            'description' => 'attention danger',
            'min_threshold' => 1,
            'max_threshold' => 3
        ]);

        Product::create([
            'id' => 5,
            'active' => true,
            'id_measure_unit' => 4,
            'id_category' => 1,
            'name' => 'Poisson',
            'description' => '',
            'min_threshold' => 1,
            'max_threshold' => 3
        ]);

        Product::create([
            'id' => 6,
            'active' => true,
            'id_measure_unit' => 1,
            'id_category' => 1,
            'name' => 'Steack congelé',
            'description' => '',
            'min_threshold' => 60,
            'max_threshold' => 100
        ]);

        Product::create([
            'id' => 7,
            'active' => true,
            'id_measure_unit' => 1,
            'id_category' => 2,
            'name' => 'Sopalin',
            'description' => 'moelleu',
            'min_threshold' => 20,
            'max_threshold' => 60
        ]);

        Product::create([
            'id' => 8,
            'active' => true,
            'id_measure_unit' => 5,
            'id_category' => 1,
            'name' => 'Coca 1.5L',
            'description' => 'coca en btl',
            'min_threshold' => 100,
            'max_threshold' => 500
        ]);


        $faker = Faker::create();
        foreach(range(1, 150) as $index)
        {
            // https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous
            Product::create([
                'active' => $faker->boolean($chanceOfGettingTrue = 75),
                'id_measure_unit' => $faker->numberBetween($min = 1, $max = 5),
                'id_category' => $faker->numberBetween($min = 1, $max = 4),
                'name' => $faker->word,
                'description' => $faker->text,
                'min_threshold' => $faker->numberBetween($min = 0, $max = 10),
                'max_threshold' => $faker->numberBetween($min = 0, $max = 30)
            ]);
        }
    }
}
