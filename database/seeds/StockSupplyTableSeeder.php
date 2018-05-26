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

        StockSupply::create([
            'created_at' => '2018-05-25',
            'id_product' => 2,
            'quantity_add' => 10,
            'unit_price' => 15.73
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25 10:00:00',
            'id_product' => 2,
            'quantity_add' => 5
        ]);

        StockSupply::create([
            'created_at' => '2018-05-26 19:00:00',
            'id_product' => 2,
            'quantity_add' => 7
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'id_product' => 7,
            'quantity_add' => 12
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'id_product' => 5,
            'quantity_add' => 3
        ]);

        StockSupply::create([
            'created_at' => '2018-05-25',
            'id_product' => 5,
            'quantity_add' => 8
        ]);


        $faker = Faker::create();
        foreach(range(1, 10) as $index)
        {
            // https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous
            StockSupply::create([
                'created_at' => '2018-05-25 23:59:59',
                'id_product' => $index,
                'quantity_add' => $index
            ]);
        }

        // Inventaire (suppression de manque)

        StockSupply::create([
            'created_at' => '2018-05-28 19:00:00',
            'id_product' => 2,
            'quantity_rem' => 5
        ]);

    }
}
