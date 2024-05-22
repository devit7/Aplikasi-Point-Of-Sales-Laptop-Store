<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsAksesController extends Controller
{
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.payment.index', [
                'data' => $data['data']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function getDetail($payment)
    {
        $request = Request::create('http://127.0.0.1:8000/api/payments/' . $payment, 'GET');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function createData(Request $request)
    {
        $validated = $request->validate([
            'payment_name' => 'required|string|max:255|unique:payments,payment_name',
        ]);
    
        $data = [
            'payment_name' => $validated['payment_name'],
        ];
    
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'POST', $data);
        $response = app()->handle($request);
        
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Payment berhasil ditambahkan');
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function updateData(Request $request, $payment)
    {
        $validated = $request->validate([
            'payment_name' => 'required|string|max:255',
        ]);
    
        $data = [
            'payment_name' => $validated['payment_name'],
        ];
    
        $request = Request::create('http://127.0.0.1:8000/api/payments/' . $payment, 'PUT', $data);
        $response = app()->handle($request);
        
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Payment berhasil di update');
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($paymentId)
    {
        
        $request = Request::create('http://127.0.0.1:8000/api/payments/' . $paymentId, 'DELETE');
        $response = app()->handle($request);
        
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Payment berhasil dihapus');
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}