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

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories', 'CategoriesController');

/**
Route::get('/categories/index', 'CategoryController@index')->name('home');
Route::get('/categories/new', 'CategoryController@create');
Route::post('/categories/add', 'CategoryController@store');
Route::get('categories/{category}/edit', 'CategoryController@edit');
Route::post('categories/{category}/update','CategoryController@update');
Route::get('categories/{category}/delete', 'CategoryController@destroy');
 **/