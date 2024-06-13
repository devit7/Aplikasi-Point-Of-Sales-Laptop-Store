<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'GET');
        // dd("request", $request);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        // dd("response", $response);

        $data = json_decode($response->getContent(), true);
        // dd("data", $data['data']);

        if ($response->getStatusCode() == 200) {
            return view('admin.laporan.index', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    // public function cetak()
    // {
    //     // $customers = Customers::all();
    //     //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
    //     //$request->headers->set('Authorization', $token);
    //     $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'GET');
    //     // dd("request", $request);

    //     $response = app()->handle($request);
    //     // dd("response", $response);

    //     $data = json_decode($response->getContent(), true);
    //     // dd("cetak", $data);

    //     $pdf = PDF::loadView('admin/laporan/index', ['data' => $data['data']]);
    //     return $pdf->download('customer-pdf');
    //     // return $pdf->stream();
    // }
}
