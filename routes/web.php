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
    return view('pages.index');
});

Route::get('/contact','TestController@contact')->name('contact');

Route::get('/about','TestController@about');

Route::get('/student','TestController@student');

Route::get('post','PostController@post');

//category insert====

Route::get('/addCategory','categoryController@addCategory')->name('AddCategory');
Route::post('/CategoryInsert','categoryController@categoryInsert')->name('categoryInsert');
