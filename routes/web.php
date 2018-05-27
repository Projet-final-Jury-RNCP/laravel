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
//     return view('welcome');
    return Redirect::to( '/stock');
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
 *
 */

Route::group(['prefix' => 'stock', 'middleware' => 'auth'], function()
// Route::group(['prefix' => 'stock'], function()
{

    Route::get('/', function () {
        return view('stock.home');
    });

        /**
         * Stock
         */

        // Consulter : IN/OUT

        // Approvisionner
        Route::get('approvisionner', 'StockSupplyController@index');
        Route::post('approvisionner', 'StockSupplyController@store');
        Route::put('approvisionner_update', 'StockSupplyController@update');
        Route::delete('approvisionner/{stockSupply}', 'StockSupplyController@destroy');

        // Inventaire



        /**
         * Configuration
         */

        // Catégories
        Route::get('categories', 'CategoryController@create');
        Route::post('categories', 'CategoryController@store');
        Route::put('categories_update', 'CategoryController@update');
        Route::delete('categories/{category}', 'CategoryController@destroy');

        // Mesures

        // Produits


});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
{

    Route::get('/user', ['as' => 'user', 'uses' => 'UserController@index']);
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/create', 'UserController@store');
    Route::get('/user/{user}/edit', 'UserController@edit');
    Route::put('/user/{user}', 'UserController@update');
    Route::delete('/user/{user}', 'UserController@destroy');

});

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


/**
 * Les routes de TEST
 */
Route::get('/test/seb/dbrelations', 'TestSebController@dbrelations');
Route::get('/test/seb/flashmessage', 'TestSebController@flashmessage');
Route::get('/test/seb/stockreel', 'TestSebController@stockreel');
