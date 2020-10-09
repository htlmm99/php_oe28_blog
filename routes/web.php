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
        Route::get('/contact', 'HomeController@contact')->name('contact');
        Route::get('/post', 'PostController@show')->name('post.show');
        Route::get('/user/{emailName}', 'HomeController@userHome')->name('user.home');
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
        Route::resource('/category' , 'CategoryController');
        Route::patch('/post/{id}/accept', 'PostController@accept')->name('admin.post.accept');
        Route::patch('/post{id}/reject', 'PostController@reject')->name('admin.post.reject');
        Route::patch('/post{id}/waiting', 'PostController@waiting')->name('admin.post.waiting');
        Route::get('/post', 'PostController@index')->name('admin.post');
        Route::delete('/post/{id}', 'PostController@destroy')->name('admin.post.destroy');
    });

    Route::group([
    'namespace' => 'Admin',
    'prefix' => 'users',
    'middleware' => 'auth',
    ], function () {
        Route::get('/profile', 'UserController@edit')->name('user.profile');
        Route::patch('/edit', 'UserController@update')->name('user.edit');
        Route::get('/foryou', 'UserController@index')->name('user.foryou');
        Route::resource('/post' , 'PostController')->except('show');
    });
});

