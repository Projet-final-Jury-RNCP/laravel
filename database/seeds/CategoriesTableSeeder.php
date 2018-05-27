<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'id' => 1,
            'cat_name' => 'Alimentaire'
        ]);

        Category::create([
            'id' => 2,
            'cat_name' => 'Ustensiles de cuisine'
        ]);

        Category::create([
            'id' => 3,
            'cat_name' => 'Produits ménagers'
        ]);

        Category::create([
            'id' => 4,
            'cat_name' => 'Pharmacie'
        ]);


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
