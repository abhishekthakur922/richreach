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

/*  Route::get('/', function () {
    return view('welcome');
}); */

Route::match(['get', 'post'], '/register', 'App\Http\Controllers\HomePageController@register')->name('register');
Route::match(['get', 'post'], '/login', 'App\Http\Controllers\HomePageController@login')->name('login');
Route::post('/logout', 'App\Http\Controllers\HomePageController@logout')->name('logout');


/* Post Controller Routes */
Route::match(['get', 'post'], '/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::match(['get', 'post'], '/viewPost/{id}', 'App\Http\Controllers\PostController@view')->name('viewPost');

Route::group(['middleware' => 'user.auth'], function () {   
    Route::match(['get', 'post'], '/addPost', 'App\Http\Controllers\PostController@create')->name('addPost');
    Route::match(['get', 'post'], '/editPost/{id}', 'App\Http\Controllers\PostController@update')->name('editPost');
    Route::delete('/deletePost/{id}', 'App\Http\Controllers\PostController@destroy');
});
/* Post Controller Routes */