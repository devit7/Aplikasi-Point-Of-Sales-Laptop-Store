<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use Illuminate\Http\Request;

class ProductAksesController extends Controller
{
    public function getAll(){
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $response = app()->handle($request);
        // merubah json ke array
        $data = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            //return dd($data['data']);
            return view('admin.product.index', [
                'data' => $data['data']
                ]);
        }else{
            // dd($response);
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode()
            ], 401);
        }
    }

    public function createData(StoreRequest $request){
        // dd("createData jalan");
        $validator = $request->validated();
        $data = [
            'product_name' => $validator['product_name'],
            'stock' => $validator['stock'],
            'harga_jual' => $validator['harga_jual'],
            'harga_asli' => $validator['harga_asli'],
            'img' => "alskdlaks",
            'supplier_id' => $validator['supplier_id'],
            'merk_id' => $validator['merk_id']
        ];
        $request = Request::create('http://127.0.0.1:8000/api/products', 'POST', $data);
        $response = app()->handle($request);
        // dd($response);
        $data = json_decode($response->getContent(), true);
        if($response->getStatusCode() == 201){
            // dd($data);
            return view('admin.product.create', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode()
            ], 401);
        }
    }

}
