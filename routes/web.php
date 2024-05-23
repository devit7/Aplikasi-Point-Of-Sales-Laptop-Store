<?php

use App\Http\Controllers\AksesController\CustomersAksesController;
use App\Http\Controllers\AksesController\PaymentsAksesController;
use App\Http\Controllers\AksesController\TransaksisAksesController;
use App\Http\Controllers\AksesController\UserAksesController;
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
    Route::get('/setting', function () {
        return view('admin.setting');
    });

    // Laporan
    Route::get('/laporan', function () {
        return view('admin.laporan.index');
    });

    // User
    Route::get('/user', [UserAksesController::class, 'getAll'])->name('user.index');
    Route::get('/user/{user}', [UserAksesController::class, 'getDetail'])->name('user.detail');
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
    Route::get('/payment', [PaymentsAksesController::class, 'getAll'])->name('payment.index');
    // Route to show the form for creating a new payment
    Route::get('/payment/create', function() {
        return view('admin.payment.create');
    })->name('payments.create');
    // Route to store a new payment
    Route::post('/payment', [PaymentsAksesController::class, 'createData'])->name('payment.store');
    // Route to show the form for editing an existing payment
    Route::get('/payment/{id}/edit', function($id) {
        $controller = new PaymentsAksesController();
        $response = $controller->getDetail($id);
        if ($response->getStatusCode() == 200) {
            $responseContent = json_decode($response->getContent());
            if (isset($responseContent->data)) {
                $payment = $responseContent->data;
                return view('admin.payment.update', compact('payment'));
            } else {
                return redirect()->route('payment.index')->with('error', 'Invalid response structure.');
            }
        } else {
            return redirect()->route('payment.index')->with('error', 'Unable to fetch payment details.');
        }
    })->name('payment.edit');
    // Route to update an existing payment
    Route::put('/payment/{id}', [PaymentsAksesController::class, 'updateData'])->name('payment.update');
    // Route to delete an existing payment
    Route::delete('/payment/{id}', [PaymentsAksesController::class, 'deleteData'])->name('payment.destroy');

    
    // Create product
    Route::get('/product/create', function () {
        return view('admin.product.create');
    });
    // Edit product
    Route::get('/product/update', function () {
        return view('admin.product.update');
    });
});

Route::prefix('kasir')->group(function () {
    Route::get('/', function () {
        return view('kasir.dh2');
    });
    Route::get('/2', function () {
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
