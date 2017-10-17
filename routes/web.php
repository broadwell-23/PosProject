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

Route::get('/logout', function(){
	Auth::logout();
	return redirect('/login');
});

Route::resource('dashboard', 'DashboardController');

Route::get('administrator', 'AdminController@index');
Route::post('administrator', 'AdminController@store');
Route::put('administrator', 'AdminController@update');
Route::delete('administrator', 'AdminController@destroy');