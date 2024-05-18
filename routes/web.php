<?php

use App\Http\Controllers\UserController;
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

Route::get('list_customers', function () {
    return view('admin.list_customers');
});

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('kasir.RiwayatTransaksi');
    });
});

Route::prefix('admin')->group(function () {

    Route::get('/', function(){
        return view('admin.index');
    });

});

Route::get('/management-customer', function(){
    return view('kasir.management-customer');
});

Route::get('/home-admin', function () {
    return view('layout.kasir_main');
});

Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/history', function () {
    return view('kasir.RiwayatTransaksi');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/tables', function () {
    return view('tables');
});