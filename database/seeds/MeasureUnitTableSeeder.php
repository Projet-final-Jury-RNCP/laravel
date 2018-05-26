<?php

use Faker\Factory as Faker;

use App\MeasureUnit;
use Illuminate\Database\Seeder;

class MeasureUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        MeasureUnit::create([
            'id' => 1,
            'measure_name' => 'Unitaire',
            'measure_symbol' => 'U'
        ]);

        MeasureUnit::create([
            'id' => 2,
            'measure_name' => 'Litre',
            'measure_symbol' => 'L'
        ]);

        MeasureUnit::create([
            'id' => 3,
            'measure_name' => 'Gramme',
            'measure_symbol' => 'g'
        ]);

        MeasureUnit::create([
            'id' => 4,
            'measure_name' => 'Kilo',
            'measure_symbol' => 'Kg'
        ]);

        MeasureUnit::create([
            'id' => 5,
            'measure_name' => 'Bouteille',
            'measure_symbol' => 'btl'
        ]);



//         $faker = Faker::create();
//         foreach(range(1, 3) as $index)
//         {
//             MeasureUnit::create([
//                 'measure_name' => $faker->word . $index,
//                 //                 'email' => $faker->email,
//             //                 'password' => 'secret'
//             ]);
//         }

//         factory(App\MeasureUnit::class, 50)->create();

            $faker = Faker::create();
            foreach(range(1, 6) as $index)
            {
//                 https://github.com/laracasts/larabook/blob/master/app/database/seeds/UsersTableSeeder.php
//                 User::create([
//                     'username' => $faker->word . $index,
//                     'email' => $faker->email,
//                     'password' => 'secret'
//                 ]);

                // https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous
                MeasureUnit::create([
                    'measure_name' => ucfirst(strtolower($faker->city)),
                    'measure_symbol' => ucfirst(strtolower($faker->countryCode))
                ]);
            }

    }
}
