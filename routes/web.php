<?php

//use Illuminate\Support\Facades\Route;

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

Route::get('/transaksi', function(){
    return view('penjualan');
});

//BarangAPI
Route::get('/daftar-barang','BarangController@index')->name('daftar-barang');
Route::get('/tambah-barang','BarangController@create')->name('tambah-barang');
Route::post('/simpan-barang','BarangController@store')->name('simpan-barang');
Route::get('/edit-barang/{id}','BarangController@edit')->name('edit-barang');
Route::post('/update-barang/{id}','BarangController@update')->name('update-barang');
Route::get('/delete-barang/{id}','BarangController@destroy')->name('delete-barang');

//PenjualanAPI
Route::get('/penjualan','PenjualanController@index')->name('penjualan');
Route::get('/tambah-penjualan','PenjualanController@create')->name('tambah-penjualan');
Route::post('/simpan-penjualan','PenjualanController@store')->name('simpan-penjualan');

//DetailPenjualanAPI
Route::get('/detail-penjualan','DetailTransaksiController@index')->name('detail-penjualan');