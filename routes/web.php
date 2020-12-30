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
Route::get('/catalog/', 'ProductController@index')->name('catalog');
//Route::get('/catalog', function () {
//    return view('catalog.show',[
//        'categories' => \App\Category::all(),
//    ]);
//})->name('catalog');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jizelle_company', function () {
    $cat_id = \Illuminate\Support\Facades\Session::has('category') ? \Illuminate\Support\Facades\Session::get('category') : 15;
    $categories = \App\Category::where('parent_id', $cat_id)->get();

//    return view('catalog.show', ['categories' => $categories, 'id' => $id, 'id2' => $type, 'cat_id' => $cat_id]);
   return view('jizelle_open', [
       'categories' => $categories,
       'id' => null,
       'id2' => null,
       'cat_id' => $cat_id
   ]) ;
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/change_cat' , 'ProductController@change_cat')->name('change_cat');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/location_error','ProductController@location')->name('location_error');
Route::get('/product/filter', 'ProductController@filter')->name('product/filter');
Route::post('/search', 'ProductController@search')->name('search');
Route::post('/wish_list','WishController@wish_list')->name('wish_list');
Route::get('/wishes', 'WishController@wishes')->name('wishes');

Route::get('product/show', 'ProductController@show')->name('product/show');

Route::post('/add_cart', 'BasketController@add')->name('add_cart');
Route::post('/delete_cart', 'BasketController@delete')->name('delete_cart');
Route::post('/basket_save','BasketController@send')->name('basket_save');
Route::get('/basket','BasketController@index')->name('basket');

Route::get('/news','NewsController@index')->name('news');
Route::get('/news/show/{id}','NewsController@show')->name('news/show');

Route::get('/test', function () {
   return view('test');
});
