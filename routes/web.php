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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'Api\UserController@getApiDataProducts')->name('api.product');
Route::get('/request', 'Api\UserController@getApiDataRequest')->name('api.request');

Route::get('/demo', 'Api\UserController@idApi')->name('demo');


Route::post('/post-data', 'Api\UserController@postApiUpdateData')->name('post-data');

// Route::prefix('api')->namespace('api')->group(function(){
//     Route::get('warehouse', 'Api\UserController@getApiData')->name('api.warehouse');
// });


Auth::routes();

Route::get('/auth', 'Api\UserController@redirectToAuth')->name('api');
Route::get('/oauth2-callback', 'Api\UserController@handleCallback');
