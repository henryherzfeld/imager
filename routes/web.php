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
})->middleware('guest');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('/posts', 'PostController@index')->name('posts')->middleware('auth');

Route::get('/posts/create/', 'PostController@newPost')->name('posts/create');

Route::get('/posts/create/{post}/{step}', 'PostController@viewstep')->middleware('auth');

Route::post('/posts/{post}/{step}', 'PostController@store')->middleware('auth');

Route::post('/posts/show', 'PostController@show')->name('posts/show')->middleware('auth');

Route::DELETE('/posts/{id}', 'PostController@destroy')->name('posts/delete')->middleware('auth');

Route::get('/wall', 'PostController@wall')->name('wall')->middleware('auth');