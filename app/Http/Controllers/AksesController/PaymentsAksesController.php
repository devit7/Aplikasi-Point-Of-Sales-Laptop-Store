<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StoreRequest;
use App\Http\Requests\Payments\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function createData(StoreRequest $request)
    {
        $data = $request->validated();
    
        $apiRequest = Request::create('http://127.0.0.1:8000/api/payments', 'POST', $data);
        $response = app()->handle($apiRequest);
        $responseData = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Payment berhasil ditambahkan');
            return redirect()->route('payment.index');
        } else if ($response->getStatusCode() == 422) {
            $errorMessage = $responseData['message'];
            session()->flash('error', $errorMessage);
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
    
    public function updateData(UpdateRequest $request, $payment)
    {
        $data = $request->validated();
    
        $apiRequest = Request::create('http://127.0.0.1:8000/api/payments/' . $payment, 'PUT', $data);
        $response = app()->handle($apiRequest);
    
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Payment berhasil di update');
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($payment)
    {
        $request = Request::create('http://127.0.0.1:8000/api/payments/' . $payment, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('payment.index')->with('success', 'Payment berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
