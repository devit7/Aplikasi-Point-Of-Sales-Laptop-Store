<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Http;

class CustomersAksesController extends Controller
{
    public function getAll($viewType = 'kasir')
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/customers', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token); // pastikan format token benar
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);

        if ($response->getStatusCode() == 200) {
            $view = ($viewType == 'admin') ? 'admin.customer.index' : 'kasir.management-customer.index';
            return view($view, [
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
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);

        if ($response->getStatusCode() == 200) {
            // return dd($data['data']);
            return view('kasir.management-customer.view', ['customer' => $data['data']]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function getEdit($customer)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);

        if ($response->getStatusCode() == 200) {
            return view('kasir.management-customer.update', ['customer' => $data['data']]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function createData(StoreRequest $request)
    {
        $token = session()->get('token');
        $validator = $request->validated();
        $data = [
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/customers/', 'POST', $data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Customer berhasil ditambahkan');
            return redirect()->route('management-customer.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function updateData(UpdateRequest $request, Customers $customer)
    {
        $token = session()->get('token');
        $validator = $request->validated();

        $data = [
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/customers/' . $customer->id .'?' . http_build_query($data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $request = Request::create($api_url, 'PUT');
        $response = app()->handle($request);

        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Data customer berhasil di update');
            return redirect()->route('management-customer.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($customer)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'DELETE');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);

        if ($response->getStatusCode() == 200) {
            return redirect()->route('management-customer.index')->with('success', 'Data berhasil delete');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}
