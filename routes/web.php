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
Route::get('/users','UserController@index')->name('users');
Route::get('/user/{id}','UserController@show')->name('user');
Route::get('/user/edit/{id}','UserController@edit')->name('edit-user');
Route::put('/user/update/{id}','UserController@update')->name('update-user');
Route::delete('/user/destroy/{id}','UserController@destroy')->name('destroy-user');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
