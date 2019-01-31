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

Route::get('/', 'HomeController@index')->name('home');

Route::get('users', 'UserController@list')->name('users');

Route::get('user/{id}', 'UserController@show')->where('id', '[0-9]+')->name('user');
Route::post('tweet', 'UserController@tweet')->middleware('auth');

Auth::routes();