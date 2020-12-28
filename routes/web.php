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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master_data_barang', function () {
    return view('sb_admin.content.master_data_barang');
});

Route::get('/transaksi_manual', function () {
    return view('sb_admin.content.transaksi_manual');
});

Route::get('/dashboard', function () {
    return view('sb_admin.content.dashboard');
});

Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test');
