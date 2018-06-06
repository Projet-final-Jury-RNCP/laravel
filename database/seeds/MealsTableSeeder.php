<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Meal;

class MealsTableSeeder extends Seeder
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
            Meal::create([
//                 'date' => $faker->dateTimeInInterval($startDate = '-30 days', $interval = '+ 1 days', $timezone = null),
                'date' => $faker->dateTimeBetween($startDate = '-15 days', $endDate = 'now', $timezone = null),
                'nb_people' => $faker->numberBetween($min = 1, $max = 60)
            ]);
        }

    }
}
