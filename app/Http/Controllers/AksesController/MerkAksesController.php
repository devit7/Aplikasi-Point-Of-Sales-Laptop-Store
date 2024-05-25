<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerkAksesController extends Controller
{
    public function getAll(){
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            //return dd($data['data']);
            return view('admin.merk.index', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
