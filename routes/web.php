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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('index');
Route::post('/orders', 'OrderController@store')->name('orders.create');
Route::get('/orders/{id}', 'OrderController@show')->where(['id' => '[0-9]+'])->name('orders.show');
Route::post('/orders/pay', 'OrderController@pay')->name('orders.pay');
Route::get('/orders/response/{reference}', 'OrderController@response')->name('orders.response');
