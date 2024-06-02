<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirAksesController extends Controller
{
    public function getAllProduct(){
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $response = app()->handle($request);
        // merubah json ke array
        $dataProduct = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            return dd($dataProduct['data']);
            return view('admin.product.index', [
                'dataProduct' => $dataProduct['data']
                ]);
        }else{
            // dd($response);
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode()
            ], 401);
        }
    }

}
