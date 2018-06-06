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
        $faker = Faker::create();

        StockFlow::create([
            'created_at' => '2018-05-20',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-25 13:30:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_add' => 1
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26 19:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26 20:59:59',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 7,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 5,
            'quantity_rem' => 2
        ]);

        StockFlow::create([
            'created_at' => '2018-05-26',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 5,
            'quantity_rem' => 2
        ]);

//         foreach(range(1, 10) as $index)
//         {
//             $indexZeroPad = sprintf('%02d', $index);

//             StockFlow::create([
//                 'created_at' => '2018-05-' . $indexZeroPad . ' 11:11:' . $indexZeroPad,
//                 'id_product' => $index,
//                 'quantity_rem' => $faker->numberBetween($min = 1, $max = 10)
//             ]);
//         }

        foreach(range(1, 31) as $index) // all days : coca
        {
            $indexZeroPad = sprintf('%02d', $index);

            StockFlow::create([
                'created_at' => '2018-05-' . $indexZeroPad . ' 23:23:' . $indexZeroPad,
                'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'id_product' => 8,  // coca
                'quantity_add' => $faker->numberBetween($min = 1, $max = 10)
            ]);
        }

        // Retour en stock

        StockFlow::create([
            'created_at' => '2018-05-28 19:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_add' => 3
        ]);

    }
}
