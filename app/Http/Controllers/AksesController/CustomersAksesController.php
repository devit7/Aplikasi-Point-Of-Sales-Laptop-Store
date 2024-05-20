<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersAksesController extends Controller
{
    public function getAll(){
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/customers', 'GET');
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
