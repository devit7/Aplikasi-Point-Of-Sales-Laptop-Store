<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use \PDF;

class LaporanController extends Controller
{
    public function index() {
        $customers = Customers::all();
        return view('index',['laporan'=>$customers]);
    }

    public function cetak () {
        $customers = Customers::all();
        
        $pdf = PDF ::loadView('costumer_pdf',['laporan'=>$customers]);
        return $pdf->download('laporan-customer-pdf');
    }
}
