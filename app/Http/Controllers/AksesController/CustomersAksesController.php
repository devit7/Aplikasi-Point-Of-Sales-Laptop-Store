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

    public function getEdit($customer)
    {
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('kasir.management-customer.update');
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
            return redirect()->route('kasir.management-customer.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    
    // public function edit($id)
    // {
    //     // Make a GET request to the API to fetch the customer data
    //     $request = Request::create('http://127.0.0.1:8000/api/customers/' . $id, 'GET');
    //     $response = app()->handle($request);

    //     // Check if the request was successful
    //     if ($response->getStatusCode() == 200) {
    //         // Decode the response body
    //         $customer = json_decode($response->getContent(), true);

    //         // Ensure the customer data includes the 'id' key
    //         if (!isset($customer['id'])) {
    //             $customer['id'] = $id;
    //         }

    //         // Return the view with the form, passing the customer data
    //         return view('kasir.management-customer.update', ['customer' => $customer]);
    //     } else {
    //         // Redirect to an error page (you need to create this view)
    //         return redirect()->view('errors.api', ['message' => 'Error fetching customer data']);
    //     }
    // }

    public function updateData(UpdateRequest $request, $customer)
    {
        $request->validated([
            'customer_name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ],
            [
                'customer_name.required' => 'Nama customer harus diisi',
                'email.required' => 'Email harus diisi',
                'no_hp.required' => 'No HP harus diisi',
                'alamat.required' => 'Alamat harus diisi',
            ]
        );

        $data = [
            'customer_name' => $request->input('customer_name'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
        ];

        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'PUT', $data);
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
        $request = Request::create('http://127.0.0.1:8000/api/customers/' . $customer, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('management-customer.index')->with('success', 'Data berhasil delete');
        } else {
            return view();
        }
    }
}
