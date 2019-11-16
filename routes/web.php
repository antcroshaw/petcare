<?php

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
/*routes for main site pages*/
Route::get('/', 'IndexPageController@index');
Route::get('/prices','PricesPageController@prices');
Route::get('/about','AboutPageController@about');
Route::get('/reviews','ReviewsPageController@reviews');
/*routes for edit pages */
Route::get('/indexedit','HomeController@indexedit');
Route::get('/pricesedit','HomeController@pricesedit');
Route::get('/aboutedit','HomeController@aboutedit');
Route::get('/reviewsedit','HomeController@reviewsedit');
//test again more test for the connection
/*
GET /projects (index)
GET /projects/create (create)
GET /projects/1 (show)
POST /projects (store)
GET /projects/1/edit (edit)
PATCH /projects/1 (update)
DELETE /projects/1 (destroy)
*/

Route::post('/home/indexedit','IndexPageController@store');
Route::post('/home/pricesedit','PricesPageController@store');
Route::post('/home/aboutedit','AboutPageController@store');
Route::post('/home/reviewsedit','ReviewsPageController@store');

Route::get('/home/default/index','DefaultPageController@index');
Route::get('/home/default/prices','DefaultPageController@prices');
Route::get('/home/default/reviews','DefaultPageController@reviews');
Route::get('/home/default/about','DefaultPageController@about');

Route::post('/home/default/{page}','DefaultPageController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::delete('/indexdestroy/{indexpage}','HomeController@indexdestroy');
Route::delete('/pricesdestroy/{pricespage}','HomeController@pricesdestroy');
Route::delete('/aboutdestroy/{aboutpage}','HomeController@aboutdestroy');
Route::delete('/reviewsdestroy/{reviewspage}','HomeController@reviewsdestroy');
