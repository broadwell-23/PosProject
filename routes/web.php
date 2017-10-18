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

Route::get('barang', 'BarangController@index');
Route::get('barang/tambah', 'BarangController@indexTambah');
Route::post('barang/tambah', 'BarangController@store');
Route::get('barang/ubah/{id}', 'BarangController@indexUbah');
Route::put('barang/ubah/{id}', 'BarangController@update');
Route::delete('barang', 'BarangController@destroy');

Route::get('packing', 'PackingController@index');
Route::post('packing', 'PackingController@store');
Route::put('packing', 'PackingController@update');
Route::delete('packing', 'PackingController@destroy');

Route::get('dokumen', 'DokumenController@index');
Route::post('dokumen', 'DokumenController@store');
Route::put('dokumen', 'DokumenController@update');
Route::delete('dokumen', 'DokumenController@destroy');

Route::get('aturan', 'AturanController@index');
Route::post('aturan', 'AturanController@store');
Route::put('aturan', 'AturanController@update');
Route::delete('aturan', 'AturanController@destroy');

Route::get('tag', 'TagController@index');
Route::post('tag', 'TagController@store');
Route::put('tag', 'TagController@update');
Route::delete('tag', 'TagController@destroy');

Route::get('mitra', 'MitraController@index');
Route::post('mitra', 'MitraController@store');
Route::put('mitra', 'MitraController@update');
Route::delete('mitra', 'MitraController@destroy');

Route::get('pesan', 'PesanController@index');
Route::put('pesan', 'PesanController@update');
Route::delete('pesan', 'PesanController@destroy');