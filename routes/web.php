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
    return view('welcome',[
        'categories' => \App\Category::all(),
    ]);
});

Route::get('/jizelle_company', function () {
   return view('jizelle_open', [
       'categories' => \App\Category::all(),
   ]) ;
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/location_error','ProductController@location')->name('location_error');
Route::get('/product/filter', 'ProductController@filter')->name('product/filter');
Route::post('/search', 'ProductController@search')->name('search');
Route::post('/wish_list','WishController@wish_list')->name('wish_list');
Route::get('/wishes', 'WishController@wishes')->name('wishes');

Route::post('/add_cart', 'BasketController@add')->name('add_cart');
Route::post('/delete_cart', 'BasketController@delete')->name('delete_cart');
Route::post('/basket_save','BasketController@send')->name('basket_save');
Route::get('/basket','BasketController@index')->name('basket');
