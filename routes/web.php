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
Route::group(['middleware' => 'locale'], function() {
    Auth::routes();
    Route::group(['namespace' => 'Client'], function() {
        Route::get('/lang/{lang}', 'LangController@changeLanguage')->name('lang');
        Route::get('/home', 'HomeController@index')->name('home');
    });
});
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'middleware' => 'check.admin',
    ], function () {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::get('/user/{name}', 'UserController@index')->name('admin.index');
        Route::patch('/edit/{id}', 'UserController@editAdmin')->name('admin.edit');
        Route::delete('/user/{id}', 'UserController@destroy')->name('user.delete');
});
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'user',
    'middleware' => 'auth',
    ], function () {
        Route::get('/home', 'UserController@index')->name('user');
        Route::get('/profile', 'UserController@edit')->name('user.profile');
        Route::patch('/edit', 'UserController@update')->name('user.edit');
        Route::get('/foryou', 'UserController@index')->name('user.foryou');
});
