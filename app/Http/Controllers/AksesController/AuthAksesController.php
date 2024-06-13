<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

class AuthAksesController extends Controller
{
    public function aksesLogin(LoginRequest $request)
    {
        $validator = $request->validated();
        $request = Request::create('http://127.0.0.1:8000/api/login', 'POST', [
            'username' => $validator['username'],
            'password' => $validator['password']
        ]);

        $response = app()->handle($request);
        $response->getContent();
        if($response->getStatusCode() == 200){
            $response = json_decode($response->getContent());
            //session(['token' => $response->token]);
            if($response->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }else if($response->role == 'kasir'){
                return redirect()->route('kasir.dashboard');
            }
        }

        $response = json_decode($response->getContent());
        return redirect()->back()->withErrors([$response->message]);
    }

    public function aksesLogout()
    {
        $request = Request::create('http://127.0.0.1:8000/api/logout', 'POST');
        $response = app()->handle($request);
        $response->getContent();
        if($response->getStatusCode() == 200){
            session()->forget('token');
            session()->forget('cart');
            auth()->logout();
            return redirect()->route('login');
        }

        return redirect()->back();
    }

}
