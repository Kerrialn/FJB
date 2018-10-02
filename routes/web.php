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


Route::get('/', 'AppController@index');
Route::post('/search', 'AppController@search')->name('search');
Route::get('/job/{id}', 'AppController@job')->name('job');
Route::get('/test', 'AppController@test')->name('test');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('create');
Route::post('/update', 'HomeController@update_user')->name('user.update');
Route::post('/create', 'HomeController@createVac')->name('create.vacancy');
Route::post('/upload', 'HomeController@upload_cv')->name('upload.cv');
Route::post('/bookmark/{id}', 'HomeController@bookmark_job')->name('bookmark.job');
Route::get('/vacancy-edit/{id}', 'HomeController@edit_vacancy')->name('edit.vacancy');
Route::post('/save-edit/{id}', 'HomeController@update_vacancy')->name('save.edit.vacancy');

Route::post('/remove-bookmark/{id}', 'HomeController@remove_bookmark')->name('remove.bookmark');
Route::post('/delete-vacancy/{id}', 'HomeController@delete_vacancy')->name('delete.vacancy');
Route::post('/delete', 'HomeController@delete_cv')->name('delete.cv');
Route::post('/allow/{id}', 'HomeController@allow_post')->name('allow.job');
Route::post('/reject/{id}', 'HomeController@reject_post')->name('reject.job');
Route::post('/apply/{id}', 'HomeController@apply')->name('apply.job');
Route::get('/logout', 'Auth\LoginController@logout');