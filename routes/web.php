<?php

use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\PaymentsController;
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


Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.index');
    });

    // Setting
    Route::get('/setting', function () {
        return view('admin.setting');
    });

    // Laporan
    Route::get('/laporan', function () {
        return view('admin.laporan.index');
    });

    // User
    Route::get('/user', function () {
        return view('admin.user.index');
    });
    Route::get('/user/create', function () {
        return view('admin.user.create');
    });

    // Customer
    Route::get('/customer', function () {
        return view('admin.customer.index');
    });

    // Supplier
    Route::get('/supplier', function () {
        return view('admin.supplier.index');
    });

    // Product
    Route::get('/product', function () {
        return view('admin.product.index');
    });

    // Merk
    Route::get('/merk', function () {
        return view('admin.merk.index');
    });
    Route::get('/merk/create', function () {
        return view('admin.merk.create');
    });
    Route::get('/merk/update', function () {
        return view('admin.merk.update');
    });


    // Payment
    Route::get('/payment', function () {
        return view('admin.payment.index');
    })->name('payment.index');

    Route::get('/payment/create', function () {
        return view('admin.payment.create');
    })->name('payment.create');

    Route::get('/payment/update', function () {
        return view('admin.payment.update');
    })->name('payment.update');
});


Route::prefix('kasir')->group(function () {
    Route::get('/', function () {
        return view('kasir.dashboard');
    });
    Route::get('/transaksi', function () {
        return view('kasir.RiwayatTransaksi');
    });
    Route::get('/customer', function () {
        return view('kasir.management-customer');
    });
});


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/modal-tran', function () {
    return view('kasir.modal-tran');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/tables', function () {
    return view('tables');
});




//Api
Route::get('/u', [UserAksesController::class, 'getAll']);
Route::get('/pay', [PaymentsAksesController::class, 'getAll']);
Route::get('/cus', [CustomersAksesController::class, 'getAll']);
