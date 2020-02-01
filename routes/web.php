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
Route::post('/categoryInsert','categoryController@categoryInsert')->name('categoryInsert');

//category retrieve

Route::get('/allCategory','categoryController@allCatRead');
Route::get('/viewCategory/{id}','categoryController@viewCategory');

//category delete

Route::get('deleteCategory/{id}','categoryController@deleteCategory');

//category edit
Route::get('editCategory/{id}','categoryController@editCategory');
Route::post('updateCategory/{id}','categoryController@updateCategory');

//post imsert======

Route::post('/postInsert','PostController@postInsert')->name('postInsert');

//post retrieve

Route::get('allPost','PostController@allPost')->name('allPost');
Route::get('/viewPost/{id}','PostController@viewPost');

//post edit and update

Route::get('/editPost/{id}','PostController@editPost');
Route::post('/postUpdate/{id}','PostController@updatePost');

