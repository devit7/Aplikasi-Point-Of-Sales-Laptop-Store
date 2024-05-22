<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsAksesController extends Controller
{
    public function getAll()
    {
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'GET');
        //$request->headers->set('Authorization', $token);
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
        //tidak makek guzzle
        //$token = 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/payments' . $payment, 'GET');
        //$request->headers->set('Authorization', $token);
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
        //return 'createData';
        //static data
        $validator = $request->validated();
        $data = [
            'payment_name' => $validator['payment_name'],
        ];
        //dd($data);
        //tidak makek guzzle
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/payments', 'POST', $data);
        //$request->headers->set('Authorization', $token);
        //dd($request);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function updateData(Request $request, $payment)
    {
        //return 'updateData';
        $validator = $request->validated();
        $data = [
            'payment_name' => $validator['payment_name'],
        ];
        //dd($data);
        //tidak makek guzzle
        $token = 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/payments'.$payment, 'PUT', $data);
        //$request->headers->set('Authorization', $token);
        //dd($request);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return $response;
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($payment)
    {   
        //return 'deleteData';
        //tidak makek guzzle
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/payments'.$payment, 'DELETE');
        //$request->headers->set('Authorization', $token);
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return $response;
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
}
