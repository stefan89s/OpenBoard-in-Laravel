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

//Pages routes
Route::get('/delete/{id}', 'PagesController@getDelete');
Route::get('/', 'PagesController@getIndex');

//Posts routes
Route::resource('posts', 'PostController');

//Categories routes
Route::resource('categories', 'CategoriesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
