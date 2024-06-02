<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirAksesController extends Controller
{
    public function index(){
        

        $dataProduct = $this->getAllProduct();
        $dataMerk = $this->getAllMerk();

        return view('kasir.dashboard', [
            'dataProduct' => $dataProduct,
            'dataMerk' => $dataMerk
        ]);

    }

    public function getAllProduct(){
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $response = app()->handle($request);
        // merubah json ke array
        $dataProduct = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            //return dd($dataProduct['data']);
            return $dataProduct['data'];
        }else{
            // dd($response);
            return response()->json([
                'message' => 'Unauthorized',
                'error_code' => $response->getStatusCode()
            ], 401);
        }
    }

    public function getAllMerk(){
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return$data['data'];
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function addToCardSession(Request $request){
        $request->session()->put('cart', $request->all());
        return redirect()->back();
    }

}
