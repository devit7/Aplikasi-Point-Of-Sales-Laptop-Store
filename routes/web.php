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

Route::get('/', function () {
    return view('kasir.testing');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/history', function () {
    return view('kasir.RiwayatTransaksi');
});


Route::resource('/users', UserController::class);