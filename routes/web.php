<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get ( '/', function () {
	$categories = DB::table("categories")->get();
	return view('index', ['categories' => $categories]);
} );

Route::get ( '/pi', function () {
	phpinfo ();
	die ();
} );