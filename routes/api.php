<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::apiResource('/users', UserController::class);
Route::apiResource('/customers', CustomersController::class);
Route::apiResource('/payments', PaymentsController::class);
Route::apiResource('/transaksi', TransaksiController::class);
Route::middleware('auth:sanctum')->group(function () {
<<<<<<< HEAD

=======
    
>>>>>>> 41ff8275a0830073b67b8b1602a9cf3e27c478b3
    // jika role admin
    Route::group(['middleware' => ['UserAkses:admin']], function () {
    });

    // jika role kasir
    Route::group(['middleware' => ['UserAkses:kasir']], function () {
        //Route::apiResource('/customers', CustomersController::class);
        //Route::apiResource('/payments', PaymentsController::class);
        //Route::apiResource('/transaksi', TransaksiController::class);
    });

});
