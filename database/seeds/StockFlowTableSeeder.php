<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\StockFlow;

class StockFlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        StockFlow::create([
            'created_at' => '2018-05-25 13:00:00',
            'id_product' => 2,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-25 13:30:00',
            'id_product' => 2,
            'quantity_add' => 1
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26 19:00:00',
            'id_product' => 2,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26',
            'id_product' => 7,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26',
            'id_product' => 5,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26',
            'id_product' => 5,
            'quantity_rem' => 2
        ]);


//         $faker = Faker::create();
//         foreach(range(1, 10) as $index)
//         {
//             // https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous
//             StockFlow::create([
//                 'created_at' => '2018-05-26 23:59:00',
//                 'id_product' => $index,
//                 'quantity_rem' => $faker->numberBetween($min = 1, $max = 10)
//             ]);
//         }

        // Retour en stock

        StockFlow::create([
            'created_at' => '2018-05-28 19:00:00',
            'id_product' => 2,
            'quantity_add' => 3
        ]);

    }
}
