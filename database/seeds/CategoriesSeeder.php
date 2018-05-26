<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
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
            Category::create([
                'cat_name' => ucfirst($faker->word),
            	'cat_desc' => ucfirst($faker->sentence)
            ]);
        }
    }
}
