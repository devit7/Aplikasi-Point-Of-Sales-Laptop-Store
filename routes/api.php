<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MerkController;
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

Route::apiResources([
    '/toko' => TokoController::class,
    '/suppliers' => SupplierController::class,
    '/merk' => MerkController::class,
    '/products' => ProductController::class,
]);