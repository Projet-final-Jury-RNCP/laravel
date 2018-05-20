<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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


        DB::table('users')->delete();

        $u = User::create(array(
            'name'     => 'User management',
            'email'    => 'user.management@yopmail.com',
            'password' => Hash::make('user.management@yopmail.com'),

            'category' => 'management'
        ));

        $u = User::create(array(
            'name'     => 'User responsable_du_stock',
            'email'    => 'user.responsable_du_stock@yopmail.com',
            'password' => Hash::make('user.responsable_du_stock@yopmail.com'),

            'category' => 'responsable_du_stock'
        ));

        $u = User::create(array(
            'name'     => 'User cuisinier',
            'email'    => 'user.cuisinier@yopmail.com',
            'password' => Hash::make('user.cuisinier@yopmail.com'),

            'category' => 'cuisinier'
        ));



        $u = User::create(array(
            'name'     => 'Emanuele Di Carlo',
            'email'    => 'emanueledc@gmail.com',
            'password' => Hash::make('emanueledc@yopmail.com'),

            'category' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Nils Potet',
            'email'    => 'nilspotet@gmail.com',
            'password' => Hash::make('nilspotet@yopmail.com'),

            'category' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Sébastien Jachym',
            'email'    => 'sjachym@yopmail.com',
            'password' => Hash::make('sjachym@yopmail.com'),

            'category' => 'cuisinier'
        ));

    }
}
