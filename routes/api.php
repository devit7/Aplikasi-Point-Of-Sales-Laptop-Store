<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\TransaksiController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\TokoController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SupplierController;
use App\Http\Controllers\API\MerkController;
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
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/customers', CustomerController::class);
    Route::apiResource('/payments', PaymentController::class);
    Route::apiResource('/transaksi', TransaksiController::class);
    Route::apiResource('/toko', TokoController::class);
    Route::apiResource('/suppliers', SupplierController::class);
    Route::apiResource('/merk', MerkController::class);
    Route::apiResource('/products', ProductController::class);
    // jika role admin
    Route::group(['middleware' => ['UserAkses:admin']], function () {

    });

    // jika role kasir
    Route::group(['middleware' => ['UserAkses:kasir']], function () {

    });
});
