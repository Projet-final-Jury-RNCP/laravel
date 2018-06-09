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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['as' => 'root', function () {
    return Redirect::to( '/stock');
}]);

Route::get('/pi', function () {
    phpinfo();
    die();
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function() {
    return Redirect::to( '/stock');
});

/**
 * Routes for the STOCK project
 * only accessible when logged in
 */

Route::group(['prefix' => 'stock', 'middleware' => 'auth'], function()
// Route::group(['prefix' => 'stock'], function()
{
    // The index page
//     Route::get('/', function () {
//         return view('stock.home');
//     });
    Route::get('/', ['as' => 'stock', function () {
        return view('stock.home');
    }]);

    /**
     * Stock
     */

    // history : See history of the complete storage (all products in it)
    Route::get('historique', 'StockHistoryController@index');
    Route::post('historique', 'StockHistoryController@store');
    Route::put('historique_update', 'StockHistoryController@update');
    Route::delete('historique/{stockSupply}', 'StockHistoryController@destroy');

    // shopping : check products in shop
    Route::get('shopping', 'ShoppingController@create');
    Route::get('shopping/{week}', 'ShoppingController@index');
    Route::post('shopping', 'ShoppingController@store');
    Route::put('shopping_update', 'ShoppingController@update');
    Route::delete('shopping/{stockSupply}', 'ShoppingController@destroy');

    Route::get('shoppingpdf/{week}', 'ShoppingController@pdf');

    // supplying
    Route::get('approvisionner', 'StockSupplyProvisionController@index');
    Route::post('approvisionner', 'StockSupplyProvisionController@store');
    Route::put('approvisionner_update', 'StockSupplyProvisionController@update');
    Route::delete('approvisionner/{stockSupply}', 'StockSupplyProvisionController@destroy');

    // inventory (for storage control and correcting)
    Route::get('inventorier', 'StockSupplyInventoryController@index');
    Route::post('inventorier', 'StockSupplyInventoryController@store');
    Route::put('inventorier_update', 'StockSupplyInventoryController@update');
    Route::delete('inventorier/{stockSupply}', 'StockSupplyInventoryController@destroy');

    // Remove products from storage
    Route::get('sortir', 'StockFlowPullController@index');
    Route::post('sortir', 'StockFlowPullController@store');
    Route::put('sortir_update', 'StockFlowPullController@update');
    Route::delete('sortir/{stockSupply}', 'StockFlowPullController@destroy');

    // Put back products in storage
    Route::get('retourner', 'StockFlowPushController@index');
    Route::post('retourner', 'StockFlowPushController@store');
    Route::put('retourner_update', 'StockFlowPushController@update');
    Route::delete('retourner/{stockSupply}', 'StockFlowPushController@destroy');


    /**
     * Configuration
     */

    // Product categories
    Route::get('categories', 'CategoryController@create');
    Route::post('categories', 'CategoryController@store');
    Route::put('categories_update', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@destroy');

    // Product units of measurement
    Route::get('mesures', 'MeasureUnitController@create');
    Route::post('mesures', 'MeasureUnitController@store');
    Route::put('mesures_update', 'MeasureUnitController@update');
    Route::delete('mesures/{measureUnit}', 'MeasureUnitController@destroy');

    // weeks
    Route::get('semaines', 'WeeksController@create');
    Route::post('semaines', 'WeeksController@store');
    Route::put('semaines_update', 'WeeksController@update');
    Route::delete('semaines/{week}', 'WeeksController@destroy');

    // Products
    Route::get('produits', 'ProductController@create');
    Route::post('produits', 'ProductController@store');
    Route::put('produits_update', 'ProductController@update');
    Route::delete('produits/{product}', 'ProductController@destroy');

    // Products week
    Route::get('produits/semaines/{week}', 'ProductWeekController@create');
    Route::post('produits/semaines/{week}', 'ProductWeekController@store');
    Route::put('produits/semaines/{week}_update', 'ProductWeekController@update');
    Route::delete('produits/semaines/{week}/{product}', 'ProductWeekController@destroy');

    // The documentation
    Route::get('/documentation', function () {
        return view ('stock.documentation.index');
    });

});

// Users
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
 * the TEST routes
 */
Route::get('/test/seb/dbrelations', 'TestSebController@dbrelations');
Route::get('/test/seb/flashmessage', 'TestSebController@flashmessage');
Route::get('/test/seb/stockreel', 'TestSebController@stockreel');
Route::get('/test/seb/week', 'TestSebController@week');
