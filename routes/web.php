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

Route::get('admin.list_customers', function () {
    return view('admin.list_customers');
});

Route::get('/', function () {
    return view('kasir.RiwayatTransaksi');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/history', function () {
    return view('kasir.RiwayatTransaksi');
});

<<<<<<< HEAD
=======
Route::get('/template', function () {
    return view('template');
});

>>>>>>> 4c150d1bfd9b1fa95cca241e40641dc33bcac6dc
Route::resource('/users', UserController::class);
