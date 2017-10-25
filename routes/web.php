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

Route::get('/', 'WebController@index')->name('home');
Route::post('/', 'WebController@store');

Auth::routes();

Route::get('/logout', function(){
	Auth::logout();
	return redirect('/login');
});

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('administrator', 'AdminController@index')->name('administrator');
Route::post('administrator', 'AdminController@store');
Route::put('administrator', 'AdminController@update');
Route::delete('administrator', 'AdminController@destroy');

Route::get('barang', 'BarangController@index')->name('barang');
Route::get('barang/tambah', 'BarangController@indexTambah')->name('tambah.barang');
Route::post('barang/tambah', 'BarangController@store');
Route::get('barang/ubah/{id}', 'BarangController@indexUbah')->name('ubah.barang');
Route::put('barang/ubah/{id}', 'BarangController@update');
Route::delete('barang', 'BarangController@destroy');

Route::get('packing', 'PackingController@index')->name('packing');
Route::post('packing', 'PackingController@store');
Route::put('packing', 'PackingController@update');
Route::delete('packing', 'PackingController@destroy');

Route::get('dokumen', 'DokumenController@index')->name('dokumen');
Route::post('dokumen', 'DokumenController@store');
Route::put('dokumen', 'DokumenController@update');
Route::delete('dokumen', 'DokumenController@destroy');

Route::get('aturan', 'AturanController@index')->name('aturan');
Route::post('aturan', 'AturanController@store');
Route::put('aturan', 'AturanController@update');
Route::delete('aturan', 'AturanController@destroy');

Route::get('transportasi', 'TransportasiController@index')->name('transportasi');
Route::post('transportasi', 'TransportasiController@store');
Route::put('transportasi', 'TransportasiController@update');
Route::delete('transportasi', 'TransportasiController@destroy');

Route::get('tag', 'TagController@index')->name('tag');
Route::post('tag', 'TagController@store');
Route::put('tag', 'TagController@update');
Route::delete('tag', 'TagController@destroy');

Route::get('mitra', 'MitraController@index')->name('mitra');
Route::post('mitra', 'MitraController@store');
Route::put('mitra', 'MitraController@update');
Route::delete('mitra', 'MitraController@destroy');

Route::get('pesan', 'PesanController@index')->name('pesan');
Route::put('pesan', 'PesanController@update');
Route::delete('pesan', 'PesanController@destroy');