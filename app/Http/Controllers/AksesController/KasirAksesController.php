<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaksi\StoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KasirAksesController extends Controller
{
    public function index(Request $request){

        $dataProduct = $this->getAllProduct();
        //jika ada parameter search
        if($request->search){
            $dataProduct = array_filter($dataProduct, function($product) use ($request){
                return strpos($product['product_name'], $request->search) !== false;
            });
        }else if($request->merk){
            $dataProduct = array_filter($dataProduct, function($product) use ($request){
                return $product['merk_id'] == $request->merk;
            });
        }
        //filter hanya status aktif
        $dataProduct = array_filter($dataProduct, function($product){
            return $product['status'] == 'aktif';
        });
        
        $dataMerk = $this->getAllMerk();
        $dataCustomer = $this->getAllCustomer();
        $dataPayment = $this->getAllPayment();
        // dd($dataCustomer);
        return view('kasir.dashboard', [
            'dataProduct' => array_values($dataProduct),
            'dataMerk' => $dataMerk,
            'dataCustomer' => $dataCustomer,
            'dataPayment' => $dataPayment
        ]);

    }

    public function getAllProduct(){
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/products', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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

    public function getAllCustomer(){
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/customers', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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

    // get all payments
    public function getAllPayment(){
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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

    public function getAllToko()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/toko', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return $data['data'];
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function transactionProcess(Request $request){
        $token = session()->get('token');
        //dd($request);
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'customer_id' => 'required|exists:customer,id',
        ]);

        $toko = $this->getAllToko();
        $toko_id = $toko[0]['id'];

        $cart = session('cart');
        $quantities = [];
        $product_id = [];
        $harga_jual = [];
        $harga_asli = [];

        if (is_array($cart)) {
            foreach ($cart as $item) {
                $quantities[] = $item['qty'];
                $product_id[] = $item['product_id'];
                $harga_jual[] = $item['harga_jual'];
                $harga_asli[] = $item['harga_asli'];
            }
        }

        $total_tiap_produk = array_map(function ($qty, $harga_jual) {
            return $qty * $harga_jual;
        }, $quantities, $harga_jual);

        $total_semua = array_sum($total_tiap_produk);

        $dataJson = [
            "user_id" => auth()->user()->id,
            "customer_id" => $request->customer_id,
            "toko_id" => $toko_id,
            "payment_id" => $request->payment_id,
            "quantity" => $quantities,
            "total_tiap_produk" => $total_tiap_produk,
            "harga_jual" => $harga_jual,
            "harga_asli" => $harga_asli,
            "total_semua" => $total_semua,
            "product_id" => $product_id
        ];
        //dd($dataJson);
        $request = Request::create('http://127.0.0.1:8000/api/transaksi', 'POST', $dataJson);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        //dd($response);
        if ($response->getStatusCode() == 201) {
            session()->forget('cart');
            return redirect()->route('kasir.dashboard')->with('success', 'Transaksi Berhasil');
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
            'harga_asli' => $product['harga_asli'],
            'img' => $product['img'],
            'qty' => 1
        );
        //dd($cart);
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function clearCart(){
        session()->forget('cart');
        return redirect()->back();
    }

}
