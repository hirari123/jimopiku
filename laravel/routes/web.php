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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/user', 'middleware' => 'auth'], function(){
    Route::get('index', 'UserController@index')->name('user.index');
    Route::get('userEdit', 'UserController@userEdit')->name('user.userEdit');
    Route::post('userEdit', 'UserController@userUpdate')->name('user.userUpdate');
});
