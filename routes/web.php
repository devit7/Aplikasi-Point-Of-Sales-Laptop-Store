<?php

use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\AksesController\TransaksisAksesController;
use App\Http\Controllers\AksesController\UserAksesController;
use App\Http\Controllers\DashboardController;
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
    Route::get('/', [DashboardController::class, 'index']);

    // Setting
    Route::get('/setting', function () {
        return view('admin.setting');
    });

    // Laporan
    Route::get('/laporan', function () {
        return view('admin.laporan.index');
    });

    // User
    // Route::get('/user', function () {
    //     return view('admin.user.index',);
    // })->name('user.index');

    Route::get('/user', [UserAksesController::class, 'getAll'])->name('user.index');
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
    Route::get('/supplier/create', function () {
        return view('admin.supplier.create');
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


    // Payment//
    Route::get('/payment', function () {
        return view('admin.payment.index');
    });
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 9b2896ec23891b4ecf6e01d1088a239dbd9fda7e

    // Create product
    Route::get('/product/create', function () {
        return view('admin.product.create');
    });

    // Edit product
    Route::get('/product/update', function () {
        return view('admin.product.update');
    });
<<<<<<< HEAD

=======
>>>>>>> dca1f859bc79be5eaf6b810e62d8ba51a0c6b69f
>>>>>>> 9b2896ec23891b4ecf6e01d1088a239dbd9fda7e
    Route::get('/payment/create', function () {
        return view('admin.payment.create');
    });
    Route::get('/payment/update', function () {
        return view('admin.payment.update');
    });

    // Transaksi
    Route::get('/transaksi', [TransaksisAksesController::class, 'getAll']);

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
