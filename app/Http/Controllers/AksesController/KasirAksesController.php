<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KasirAksesController extends Controller
{
    public function index(){
        

        $dataProduct = $this->getAllProduct();
        $dataMerk = $this->getAllMerk();
        //dd($dataProduct);
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

    public function addToCardSession(Product $product){
        //dd($product);
        $cart = Session::get('cart');

        //check jika id product sudah ada di session
        if($cart && array_key_exists($product['id'], $cart)){
            if($cart[$product['id']]['qty'] >= $product['stock']){
                return redirect()->back()->withErrors('Stock tidak mencukupi');
            }
            $cart[$product['id']]['qty'] += 1;
            session()->put('cart', $cart);
            return redirect()->back();
        }

        $cart[$product['id']] = array(
            'product_id' => $product['id'],
            'product_name' => $product['product_name'],
            'harga_jual' => $product['harga_jual'],
            'qty' => 1
        );

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->back();
    }

}
