<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RiwayatTransaksiContoller extends Controller
{
    //
    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        //dd($data['data'][0]['product'][0]);
        //  dd($data);
        if ($response->getStatusCode() == 200) {
            return view('kasir.riwayat-transaksi', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
    public function getDetail($transaksi)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/transiksi/' . $transaksi, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return dd($data['data']);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }
}
