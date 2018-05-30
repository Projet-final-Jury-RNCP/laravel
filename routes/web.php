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

    // Consulter
    // Acheter
    // TODO

    // Approvisionner
    Route::get('approvisionner', 'StockSupplyProvisionController@index');
    Route::post('approvisionner', 'StockSupplyProvisionController@store');
    Route::put('approvisionner_update', 'StockSupplyProvisionController@update');
    Route::delete('approvisionner/{stockSupply}', 'StockSupplyProvisionController@destroy');

    // Inventorier
    Route::get('inventorier', 'StockSupplyInventoryController@index');
    Route::post('inventorier', 'StockSupplyInventoryController@store');
    Route::put('inventorier_update', 'StockSupplyInventoryController@update');
    Route::delete('inventorier/{stockSupply}', 'StockSupplyInventoryController@destroy');

    // Sortir
    Route::get('sortir', 'StockFlowPullController@index');
    Route::post('sortir', 'StockFlowPullController@store');
    Route::put('sortir_update', 'StockFlowPullController@update');
    Route::delete('sortir/{stockSupply}', 'StockFlowPullController@destroy');

    // Retourner
    Route::get('retourner', 'StockFlowPushController@index');
    Route::post('retourner', 'StockFlowPushController@store');
    Route::put('retourner_update', 'StockFlowPushController@update');
    Route::delete('retourner/{stockSupply}', 'StockFlowPushController@destroy');


    /**
     * Configuration
     */

    // Catégories
    Route::get('categories', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');
    Route::put('categories_update', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@destroy');

    // Mesures
    Route::get('mesures', 'MeasureUnitController@create');
    Route::post('mesures', 'MeasureUnitController@store');
    Route::put('mesures_update', 'MeasureUnitController@update');
    Route::delete('mesures/{measureUnit}', 'MeasureUnitController@destroy');

    // Produits
    Route::get('produits', 'ProductController@create');
    Route::post('produits', 'ProductController@store');
    Route::put('produits_update', 'ProductController@update');
    Route::delete('produits/{product}', 'ProductController@destroy');

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
