<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StoreRequest;
use App\Http\Requests\Payments\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Payments;
use Illuminate\Support\Facades\Http;

class PaymentsAksesController extends Controller
{
    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/payments/'.$payment, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return dd($data['data']);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function getEdit($payment)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/payments/'.$payment, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.payment.update', ['payment' => $data['data']]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    public function createData(StoreRequest $request)
    {
        $token = session()->get('token');
        $validator = $request->validated();
        $data = [
            'payment_name' => $validator['payment_name'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'POST', $data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Payment berhasil ditambahkan');
            return redirect()->route('payment.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function updateData(UpdateRequest $request, Payments $payment)
    {
        $token = session()->get('token');
        $validator = $request->validated();

        $data = [
            'payment_name' => $validator['payment_name'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/payments/' . $payment->id .'?' . http_build_query($data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $request = Request::create($api_url, 'PUT');
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

    public function deleteData($payment)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/payments/'.$payment, 'DELETE');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('payment.index')->with('success', 'Payment berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}