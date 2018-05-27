<?php

use Faker\Factory as Faker;

use App\User;
use Illuminate\Database\Seeder;

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
            'name'     => 'Emanuele Di Carlo',
            'email'    => 'emanueledc@yopmail.com',
            'username' => 'edc',
            'password' => Hash::make('edc'),

            'role' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Nils Potet',
            'email'    => 'nilspotet@gmail.com',
            'username' => 'nils',
            'password' => Hash::make('nils'),

            'role' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => 'Sébastien Jachym',
            'email'    => 'sjachym@yopmail.com',
            'username' => 'seb',
            'password' => Hash::make('seb'),

            'role' => 'cuisinier'
        ));

        $u = User::create(array(
            'name'     => "Arnaud L'Ollivier",
            'email'    => 'arno_lol@yopmail.com',
            'username' => 'arno',
            'password' => Hash::make('arno'),

            'role' => 'cuisinier'
        ));





        $u = User::create(array(
            'name'     => 'User management',
            'email'    => 'user.management@yopmail.com',
            'username' => 'management',
            'password' => Hash::make('management'),

            'role' => 'management'
        ));

        $u = User::create(array(
            'name'     => 'User responsable_du_stock',
            'email'    => 'user.responsable_du_stock@yopmail.com',
            'username' => 'stock',
            'password' => Hash::make('stock'),

            'role' => 'responsable_du_stock'
        ));

        $u = User::create(array(
            'name'     => 'User cuisinier',
            'email'    => 'user.cuisinier@yopmail.com',
            'username' => 'cuisinier',
            'password' => Hash::make('cuisinier'),

            'role' => 'cuisinier'
        ));

    }
}
