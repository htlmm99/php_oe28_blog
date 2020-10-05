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
    Route::group(['namespace' => 'Client'], function() {
        Route::get('/lang/{lang}', 'LangController@changeLanguage')->name('lang');
        Route::get('/', 'HomeController@index');
    });
});
