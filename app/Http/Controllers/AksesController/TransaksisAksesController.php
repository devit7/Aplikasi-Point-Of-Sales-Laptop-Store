<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransaksisAksesController extends Controller
{
    public function getAll(){
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            return view('admin.transaksi.index', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
