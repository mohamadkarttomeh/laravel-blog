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

Route::get('/', 'HomeController@index');
Route::get('/about', "PagesController@about");
Route::get('/contact', "PagesController@contact");
Route::post('/dosend', "PagesController@dosend");
Route::resource('/posts',"PostsController");

Route::post('/comments/{slug}','commentsController@store')->name('comments.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
