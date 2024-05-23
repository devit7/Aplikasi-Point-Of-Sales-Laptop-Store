<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Http\Request;

class CustomersAksesController extends Controller
{
    public function getAll()
    {
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/customers', 'GET');
        //$request->headers->set('Authorization', $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('kasir.management-customer.index', [
                'data' => $data['data']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function getDetail($customer)
    {
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'GET');
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

    public function createData(StoreRequest $request)
    {
        $validator = $request->validated();
        $data = [
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/customers', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true); // Fixed typo here
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Customer berhasil ditambahkan');
            return redirect()->route('management-customer.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function updateData(UpdateRequest $request, $customer)
    {
        $validator = $request->validated();
        $data = [
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/customers' . $customer, 'PUT', $data);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return view();
        }
    }

    public function deleteData($customer)
    {
        $request = Request::create('http://127.0.0.1:8000/api/customers' . $customer, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return view();
        }
    }
}
