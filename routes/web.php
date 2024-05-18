<?php

use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\AksesController\UserAksesController;
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


Route::get('/', function () {
    return view('kasir.RiwayatTransaksi');
});

Route::prefix('admin')->group(function () {
    Route::get('/list_customers', function () {
        return view('admin.list_customers');
    });
    Route::get('/admin', function(){
        return view('admin.index');
    });
    Route::get('/manage_supplier', function(){
        return view('admin.manage_supplier');
    });
    Route::get('/manage_product', function(){
        return view('admin.manage_product');
    });
});

Route::get('/home-admin', function () {
    return view('layout.kasir_main');
});

Route::get('/management_customer', function(){
    return view('kasir.management-customer');
});


Route::get('/login', function () {
    return view('auth.login');
});


Route::get('/RiwayatTransaksi', function () {
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

Route::get('/dashboard-kasir',function(){
    return view('kasir.dashboard');
});


//Api
Route::get('/u', [UserAksesController::class, 'getAll']);
Route::get('/pay', [PaymentsAksesController::class, 'getAll']);
Route::get('/cus', [CustomersAksesController::class, 'getAll']);
