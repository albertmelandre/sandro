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
    return view('products.form');
});


Route::get('/products', 'App\Http\Controllers\ProductsController@list');
Route::post('/products/add', 'App\Http\Controllers\ProductsController@add');
Route::get('/products/form', 'App\Http\Controllers\ProductsController@form');
Route::get('/products/delete/{id}', 'App\Http\Controllers\ProductsController@delete');
Route::get('/products/edit/{id}', 'App\Http\Controllers\ProductsController@edit');
