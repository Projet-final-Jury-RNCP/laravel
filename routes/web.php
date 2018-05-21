<?php
use App\Category;

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
	$categories = Category::all ();
	return view ( 'index', [
			'categories' => $categories
	] );
} );

Route::get ( '/pi', function () {
	phpinfo ();
	die ();
} );



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get ( 'stock/create', 'StockController@create' );
Route::post('category', 'StockController@store');

