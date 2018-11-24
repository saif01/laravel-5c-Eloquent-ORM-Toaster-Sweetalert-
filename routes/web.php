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

// extend and yield practice
Route::get('/index', function () {
    return view('test.index');
});
Route::get('/first', function () {
    return view('test.first');
});
Route::get('/second', function () {
    return view('test.second');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/insert-post', 'SaifController@Store');
Route::post('/update-post/{id}', 'SaifController@Update');

Route::get('/delete-post/{id}', 'SaifController@Delete');

Route::get('/edit-post/{id}', 'SaifController@Edit');

Route::get('/all-post', 'SaifController@Allpost')->name('all.post');
