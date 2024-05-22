<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
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
            return view('admin.customer.index', [
                'data' => $data['data']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function getDetail($customer){
        $request = Request::create('http://127.0.0.1:8000/api/customer' . $customer, 'GET');
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return $response;
        } else {
            return view();
        }
    }

    public function createData(Request $request){
        $validator = $request->validated();
        $data = [
            'customer_name' => $validator['customer_name'],
            'customer_email' => $validator['customer_email'],
            'customer_phone' => $validator['customer_phone'],
            'customer_address' => $validator['customer_address'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/customer', 'POST', $data);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200){
            return $response;
        } else {
            return view();
        }
    }

    public function updateData(Request $request, $customer){
        $validator = $request->validated();
        $data = [
            'customer_name' => $validator['customer_name'],
            'customer_email' => $validator['customer_email'],
            'customer_phone' => $validator['customer_phone'],
            'customer_address' => $validator['customer_address'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/customer'.$customer, 'PUT', $data);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200){
            return $response;
        } else {
            return view();
        }
    }

    public function deleteData($customer){
        $request = Request::create('http://127.0.0.1:8000/api/customer'.$customer, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return view();
        }
    }
}
