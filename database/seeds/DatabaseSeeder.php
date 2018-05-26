<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use MeasureUnitSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // password [ bcrypt( OR Hash::make( ]

        $this->call(UsersTableSeeder::class);

        $this->call(MeasureUnitTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        $this->call(MealsTableSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(StockSupplyTableSeeder::class);
        $this->call(StockFlowTableSeeder::class);

    }
}
