<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAksesController extends Controller
{
    public function getAll(){
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/product', 'GET');
        //$request->headers->set('Authorization', $token);
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
