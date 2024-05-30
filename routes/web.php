<?php

use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\AksesController\RiwayatTransaksiContoller;
use App\Http\Controllers\AksesController\TokoAksesController;
use App\Http\Controllers\AksesController\TransaksisAksesController;
use App\Http\Controllers\AksesController\UserAksesController;
use App\Http\Controllers\AksesController\LaporanController;
use App\Http\Controllers\AksesController\ProductAksesController;
use App\Http\Controllers\AksesController\SupplierAksesController;
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
    Route::get('/setting', [TokoAksesController::class, 'getAll'])->name('admin.index');
    // Route::post('/setting', [TokoAksesController::class, 'createData'])->name('admin.store');
    Route::put('/setting/{toko}', [TokoAksesController::class, 'updateData'])->name('admin.update');

    // Laporan
    Route::get('/laporan', [LaporanController::class, 'index']);

    // User
    //Menampilkan semua data user
    Route::get('/user', [UserAksesController::class, 'getAll'])->name('user.index');
    //Menampilkan detail user
    Route::get('/user/show/{user}', [UserAksesController::class, 'getDetail'])->name('user.detail');
    //Menampilkan form create user
    Route::get('/user/create', function () {
        return view('admin.user.create');
    })->name('user.create');
    //Membuat user baru
    Route::post('/user/create', [UserAksesController::class, 'createData'])->name('user.store');


    // Customer
    Route::get('/customer', [CustomersAksesController::class, 'getAll'])->name('admin.customers')->defaults('viewType', 'admin');
    
    // Supplier
    // Route untuk menampilkan semua supplier
    Route::get('/supplier', [SupplierAksesController::class, 'getAll'])->name('supplier.index');
    // Route untuk menampilkan form create supplier
    Route::get('/supplier/create', function () {
        return view('admin.supplier.create');
    })->name('supplier.create');
    // Route untuk membuat supplier baru
    Route::post('/supplier/create', [SupplierAksesController::class, 'createData'])->name('supplier.store');
    // Route untuk menampilkan form edit supplier
    Route::get('/supplier/edit/{supplier}', [SupplierAksesController::class, 'getEdit'])->name('supplier.edit');
    // Route untuk memperbarui data supplier
    Route::put('/supplier/update/{supplier}', [SupplierAksesController::class, 'updateData'])->name('supplier.updateCoy');
    Route::delete('/supplier/{supplier}',[SupplierAksesController::class, 'deleteData'])->name('supplier.delete');
    

    // Product
    Route::get('/product', [ProductAksesController::class, 'getAll'])->name('admin.product.index');

    Route::post('/product', [ProductAksesController::class, 'createData'])->name('admin.product.store');
    Route::get('/product/create', function () {
        return view('admin.product.create');
    })->name('admin.product.create');
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
    Route::get('/payment', [PaymentsAksesController::class, 'getAll'])->name('payment.index');
    Route::get('/payment/create', function () {
        return view('admin.payment.create');
    })->name('payment.create');
    Route::get('/payment/edit/{payment}', [PaymentsAksesController::class, 'getEdit'])->name('payment.edit');
    Route::put('/payment/update/{payment}', [PaymentsAksesController::class, 'updateData'])->name('payment.update');
    Route::post('/payment', [PaymentsAksesController::class, 'createData'])->name('payment.store');
    Route::delete('/payment/{payment}', [PaymentsAksesController::class, 'deleteData'])->name('payment.destroy');
    
    // Create product
    Route::get('/product/create', function () {
        return view('admin.product.create');
    });
    // Edit product
    Route::get('/product/update', function () {
        return view('admin.product.update');
    });
    Route::get('/payment/create', function () {
        return view('admin.payment.create');
    });
});

Route::prefix('kasir')->group(function () {
    Route::get('/', function () {
        return view('kasir.dashboard');
    });
    Route::get('/2', function () {
        return view('kasir.dashboard-old');
    });
    Route::get('/transaksi', function () {
        return view('kasir.RiwayatTransaksi');
    });
    Route::get('/riwayat', [RiwayatTransaksiContoller::class, 'getAll'])->name('Riwayat.index');
    Route::get('/riwayat/{transaksi}', [RiwayatTransaksiContoller::class, 'getDetail'])->name('Riwayat.detail');


    Route::get('/customer', [CustomersAksesController::class, 'getAll'])->name('management-customer.index');
    Route::get('/customer/show/{customer}', [CustomersAksesController::class, 'getDetail'])->name('management-customer.detail');
    Route::get('/customer/create', function () {
        return view('kasir.management-customer.create');
    });

    Route::get('/customer/edit/{customer}', [CustomersAksesController::class, 'getEdit'])->name('management-customer.edit');
    Route::put('/customer/update/{customer}', [CustomersAksesController::class, 'updateData'])->name('management-customer.update');
    // Route for update form
    // Route::get('/customer/{id}/edit', [CustomersAksesController::class, 'edit'])->name('management-customer.edit');
    Route::post('/customer', [CustomersAksesController::class, 'createData'])->name('management-customer.store');
    Route::delete('/customer/{customer}', [CustomersAksesController::class, 'deleteData'])->name('management-customer.delete');
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

