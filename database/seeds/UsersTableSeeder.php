<?php

use Faker\Factory as Faker;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $u = User::create(array(
            'name'     => 'User management',
            'email'    => 'user.management@yopmail.com',
            'password' => Hash::make('user.management@yopmail.com'),

            'role' => 'management'
        ));

        $u = User::create(array(
            'name'     => 'User responsable_du_stock',
            'email'    => 'user.responsable_du_stock@yopmail.com',
            'password' => Hash::make('user.responsable_du_stock@yopmail.com'),

            'role' => 'responsable_du_stock'
        ));

        $u = User::create(array(
            'name'     => 'User cuisinier',
            'email'    => 'user.cuisinier@yopmail.com',
            'password' => Hash::make('user.cuisinier@yopmail.com'),

            'role' => 'cuisinier'
        ));



        $u = User::create(array(
            'name'     => 'Emanuele Di Carlo',
            'email'    => 'emanueledc@gmail.com',
            'password' => Hash::make('emanueledc@yopmail.com'),

            'role' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Nils Potet',
            'email'    => 'nilspotet@gmail.com',
            'password' => Hash::make('nilspotet@yopmail.com'),

            'role' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Sébastien Jachym',
            'email'    => 'sjachym@yopmail.com',
            'password' => Hash::make('sjachym@yopmail.com'),

            'role' => 'cuisinier'
        ));
    }
}
