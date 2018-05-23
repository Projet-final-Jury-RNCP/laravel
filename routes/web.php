<?php
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pi', function () {
	phpinfo();
	die();
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return Redirect::to( '/stock');
});

/**
 * Les routes du projet STOCK
 */

// Route::group(['prefix' => 'stock', 'middleware' => 'auth'], function()
Route::group(['prefix' => 'stock'], function()
{

    Route::get('/', function () {
        return view('stock.home');
    });

    Route::get ('categories', 'StockController@create');
    Route::post('categories', 'StockController@store');
    Route::put('categories/{category}', 'StockController@update');
    Route::delete('categories/{category}', 'StockController@destroy');

});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
