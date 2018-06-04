<?php

use Faker\Factory as Faker;

use App\Week;
use Illuminate\Database\Seeder;

class WeekTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Week::create([
            'id' => 1,
            'name' => 'Semaine sport classique'
        ]);

        Week::create([
            'id' => 2,
            'name' => 'Semaine congé de xxx'
        ]);

        Week::create([
            'id' => 3,
            'name' => 'Semaine congé de noël'
        ]);

        Week::create([
            'id' => 4,
            'name' => 'Semaine caviar pour tous'
        ]);

    }
}
