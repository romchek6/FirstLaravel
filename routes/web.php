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

Route::get('/', 'LoginController@index')->name('login');

Route::post('/', 'LoginController@store');

Route::get('/registration', 'RegistrationController@index')->name('registration');

Route::post('/registration', 'RegistrationController@store');

Route::get('/post', 'PostController@index')->name('post.index');
Route::get('/post/create', 'PostController@create');
Route::post('/post', 'PostController@store');
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/post/{post}/edit', 'PostController@edit')->name('post.edit');
Route::patch('/post/{post}', 'PostController@update')->name('post.update');
Route::delete('/post/{post}', 'PostController@destroy')->name('post.delete');

Route::get('/tag', 'TagController@index')->name('tag.index');
Route::get('/tag/create', 'TagController@create');
Route::post('/tag', 'TagController@store');
Route::get('/tag/{tag}', 'TagController@show')->name('tag.show');
Route::get('/tag/{tag}/edit', 'TagController@edit')->name('tag.edit');
Route::patch('/tag/{tag}', 'TagController@update')->name('tag.update');
Route::delete('/tag/{tag}', 'TagController@destroy')->name('tag.delete');



