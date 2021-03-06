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

        Category::create([
            'id' => 5,
            'cat_name' => 'Maison'
        ]);

//         $faker = Faker::create();
//         foreach(range(1, 10) as $index)
//         {
//             Category::create([
//                 'cat_name' => ucfirst($faker->word),
//             	'cat_desc' => ucfirst($faker->sentence)
//             ]);
//         }

    }
}
