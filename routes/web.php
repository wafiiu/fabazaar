<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Main Route
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// Route orders
Route::group(['middleware' => ['auth', 'role:customer']], function() {
    // Route::get('orders', 'App\Http\Controllers\DashboardController@orders')->name('dashboard.orders');
    Route::resource('orders', 'App\Http\Controllers\PurchaseController');
    Route::post('/search', 'App\Http\Controllers\MarketController@show')->name('category.show');
    Route::post('/seller', 'App\Http\Controllers\MarketController@store')->name('category.store');
});

// Route inventory
Route::group(['middleware' => ['auth', 'role:supplier']], function() {
    // Route::get('/inventory', 'App\Http\Controllers\DashboardController@inventory')->name('dashboard.inventory');
    Route::resource('inventory', 'App\Http\Controllers\ItemController');
    Route::get('/listorders', 'App\Http\Controllers\OrderController@index')->name('inventory.orders');
});

//Route category
Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('admincategory', 'App\Http\Controllers\CategoryController');
    Route::get('/listcustomers', 'App\Http\Controllers\AdminController@customers')->name('admin.customers');
    Route::get('/listsuppliers', 'App\Http\Controllers\AdminController@suppliers')->name('admin.suppliers');
    Route::post('/userdetails', 'App\Http\Controllers\AdminController@details')->name('admin.details');
});
// Route::post('/createitem', 'App\Http\Controllers\ItemController@store');

require __DIR__.'/auth.php';
