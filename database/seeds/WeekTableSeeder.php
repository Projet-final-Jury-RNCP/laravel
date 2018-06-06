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
            'name' => "1er semaine congés d'été (du 2 au 8 juillet 2018)"
        ]);

        Week::create([
            'id' => 3,
            'name' => 'Semaine congelés de noël'
        ]);

        Week::create([
            'id' => 4,
            'name' => 'Semaine caviar pour tous'
        ]);

        Week::create([
            'id' => 5,
            'name' => 'Anniversaire'
        ]);

    }
}
