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
    Route::get('/payment', [PaymentsAksesController::class, 'getAll'])->name('payment.index');
    Route::get('/payment/create', function() {
        return view('admin.payment.create');
    })->name('payments.create');
    Route::post('/payment', [PaymentsAksesController::class, 'createData'])->name('payment.store');
    Route::get('/payment/{id}/edit', function($id) {
        $controller = new PaymentsAksesController();
        $response = $controller->getDetail($id);
        $payment = json_decode($response->getContent())->data;
        return view('admin.payment.update', compact('payment'));
    })->name('payment.edit');
    Route::put('/payment/{id}', [PaymentsAksesController::class, 'updateData'])->name('payment.update');
    Route::delete('/payment/{id}', [PaymentsAksesController::class, 'deleteData'])->name('payment.destroy');

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
