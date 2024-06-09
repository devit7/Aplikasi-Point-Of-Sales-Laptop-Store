<?php

use App\Http\Controllers\AksesController\AuthAksesController;
use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\KasirAksesController;
use App\Http\Controllers\AksesController\MerkAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\AksesController\RiwayatTransaksiContoller;
use App\Http\Controllers\AksesController\TokoAksesController;
use App\Http\Controllers\AksesController\TransaksisAksesController;
use App\Http\Controllers\AksesController\UserAksesController;
use App\Http\Controllers\AksesController\LaporanController;
use App\Http\Controllers\AksesController\ProductAksesController;
use App\Http\Controllers\AksesController\SupplierAksesController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\TransaksiController;
// use App\Http\Controllers\API\ProductController;
// use App\Http\Controllers\API\UserController;
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


Route::middleware(['WebAkses:admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Setting
    Route::get('/setting', [TokoAksesController::class, 'getAll'])->name('admin.index');
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
    Route::get('/user/edit/{user}', [UserAksesController::class, 'getEdit'])->name('user.edit');
    Route::put('/user/edit{user}', [UserAksesController::class, 'updateData'])->name('user.update');
    Route::delete('/supplier/{user}', [UserAksesController::class, 'deleteData'])->name('user.delete');

    // Customer
    Route::get('/customer', [CustomersAksesController::class, 'getAll'])->name('admin.customers')->defaults('viewType', 'admin');

    // Supplier
    Route::get('/supplier', [SupplierAksesController::class, 'getAll'])->name('supplier.index');
    Route::get('/supplier/create', function () {
        return view('admin.supplier.create');
    })->name('supplier.create');
    Route::post('/supplier/create', [SupplierAksesController::class, 'createData'])->name('supplier.store');
    Route::get('/supplier/edit/{supplier}', [SupplierAksesController::class, 'getEdit'])->name('supplier.edit');
    Route::put('/supplier/update/{supplier}', [SupplierAksesController::class, 'updateData'])->name('supplier.updateCoy');
    Route::delete('/supplier/delete/{supplier}', [SupplierAksesController::class, 'deleteData'])->name('supplier.deleteCoy');


    // Product
    Route::get('/product', [ProductAksesController::class, 'getAll'])->name('products.admin.index');
    Route::get('/product/create/new', [ProductAksesController::class, 'getAllToCreate'])->name('products.admin.create');
    Route::post('/product/create', [ProductAksesController::class, 'createData'])->name('products.admin.store');
    Route::get('/product/update/{product}', [ProductAksesController::class, 'productAdminUpdate'])->name('products.admin.edit');
    Route::put('/product/update/{product}', [ProductAksesController::class, 'productAdminMakeUpdate'])->name('products.admin.update');

    Route::delete('/product/destroy/{product}', [ProductAksesController::class, 'deleteData'])->name('products.admin.destroy');

    // Merk
    Route::get('/merk', [MerkAksesController::class, 'getAll'])->name('merk.index');
    Route::get('/merk/create', function () {
        return view('admin.merk.create');
    })->name('merk.create');
    Route::post('/merk', [MerkAksesController::class, 'createData'])->name('merk.store');
    Route::get('/merk/edit/{merk}', [MerkAksesController::class, 'getEdit'])->name('merk.edit');
    Route::put('/merk/update/{merk}', [MerkAksesController::class, 'updateData'])->name('merk.update');
    Route::delete('/merk/{merk}', [MerkAksesController::class, 'deleteData'])->name('merk.destroy');

    // Payment
    Route::get('/payment', [PaymentsAksesController::class, 'getAll'])->name('payment.index');
    Route::get('/payment/create', function () {
        return view('admin.payment.create');
    })->name('payment.create');
    Route::get('/payment/edit/{payment}', [PaymentsAksesController::class, 'getEdit'])->name('payment.edit');
    Route::put('/payment/update/{payment}', [PaymentsAksesController::class, 'updateData'])->name('payment.update');
    Route::post('/payment', [PaymentsAksesController::class, 'createData'])->name('payment.store');
    Route::delete('/payment/{payment}', [PaymentsAksesController::class, 'deleteData'])->name('payment.destroy');

    //Product
    // Route::get('/products/index', [ProductAksesController::class, 'getAll'])->name('products.index');
    // Route::get('/products/show/{product}', [ProductAksesController::class, 'getDetail'])->name('products.show');
    // Route::get('/products/create', [ProductAksesController::class, 'getAllToCreate'])->name('products.create');
    // Route::post('/products/store', [ProductAksesController::class, 'createData'])->name('products.store');
    // Route::get('/products/edit/{product}', function () {
    //     return view('admin.product.update');
    // })->name('products.edit');
    // Route::put('/products/update/{product}', [ProductAksesController::class, 'updateData'])->name('products.update');
    // Route::delete('/products/destroy/{product}', [ProductAksesController::class, 'deleteData']);
});


Route::middleware(['WebAkses:kasir'])->prefix('kasir')->group(function () {
    Route::get('/', [KasirAksesController::class, 'index'])->name('kasir.dashboard');
    Route::get('/2', function () {
        return view('kasir.dashboard-old');
    });
    Route::get('/add-to-cart/{product}', [KasirAksesController::class, 'addToCardSession'])->name('kasir.add-to-cart');
    Route::get('/clear-cart', [KasirAksesController::class, 'clearCart'])->name('kasir.clear-cart');
    Route::post('/transaction-process', [KasirAksesController::class, 'transactionProcess'])->name('kasir.transaction-process');


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
})->name('login');
Route::post('/login', [AuthAksesController::class, 'aksesLogin'])->name('akses.login');
Route::get('/logout', [AuthAksesController::class, 'aksesLogout'])->name('akses.logout');

Route::get('/modal-tran', function () {
    return view('kasir.modal-tran');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/tables', function () {
    return view('tables');
});

Route::get('/mail', [TransaksiController::class, 'testEmial']);

//Api
Route::get('/u', [UserAksesController::class, 'getAll']);
Route::get('/pay', [PaymentsAksesController::class, 'getAll']);
Route::get('/cus', [CustomersAksesController::class, 'getAll']);


