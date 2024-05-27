<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatTransaksiContoller extends Controller
{
    //
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        //dd($data['data'][0]['product'][0]);
        if ($response->getStatusCode() == 200) {
            return view('kasir.RiwayatTransaksi', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}