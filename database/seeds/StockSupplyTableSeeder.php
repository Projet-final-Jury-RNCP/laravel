<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\StockSupply;

class StockSupplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        StockSupply::create([
            'created_at' => '2018-04-30',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 6
        ]);

        StockSupply::create([
            'created_at' => '2018-05-20',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 6
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_add' => 10,
            'unit_price' => 15.73
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25 10:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_add' => 5
        ]);

        StockSupply::create([
            'created_at' => '2018-05-26 19:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_add' => 7
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 7,
            'quantity_add' => 12
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 5,
            'quantity_add' => 3
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 5,
            'quantity_add' => 8
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25 12:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 59
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25 14:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 1
        ]);

        StockSupply::create([
            'created_at' => '2018-05-29',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 1
        ]);

        StockSupply::create([
            'created_at' => '2018-05-30',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 5,
        ]);

        StockSupply::create([
            'created_at' => '2018-06-01',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 8,
            'quantity_add' => 1
        ]);

        foreach(range(1, 10) as $index) // coca
        {
            $indexZeroPad = sprintf('%02d', $index);

            StockSupply::create([
                'created_at' => '2018-06-02 ' . $indexZeroPad . ':' . $indexZeroPad . ':' . $indexZeroPad,
                'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'id_product' => 8,
                'quantity_add' => $faker->numberBetween($min = 6, $max = 60),
                'unit_price' => $faker->randomFloat(2, 1.00, 1.25)

            ]);
        }

        for($i = 0; $i<4; $i++) {
            foreach(range(1, 31) as $index)
            {
                $indexZeroPad = sprintf('%02d', $index);

                if($index != 8) {
                    StockSupply::create([
                        'created_at' => '2018-05-' . $indexZeroPad . ' 23:31:' . $indexZeroPad,
                        'user_id' => $faker->numberBetween($min = 1, $max = 4),
                        'id_product' => $faker->numberBetween($min = 1, $max = 100), // $index,
                        'quantity_add' => $faker->numberBetween($min = 1, $max = 10),
                        'unit_price' => $faker->randomFloat(2, 0, 30)
                    ]);
                }
            }
        }

        // Inventaire (suppression de manque)

        StockSupply::create([
            'created_at' => '2018-05-28 19:00:00',
            'user_id' => $faker->numberBetween($min = 1, $max = 4),
            'id_product' => 2,
            'quantity_rem' => 5
        ]);

    }
}
