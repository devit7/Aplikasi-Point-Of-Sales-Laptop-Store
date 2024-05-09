<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $validator = $request->validated();

        $dataLogin = [
            'username' => $validator['username'],
            'password' => $validator['password']
        ];

        if (Auth::attempt($dataLogin)) {
            if (Auth::user()->role == 'admin') {
                return 'hallo admin';
                return redirect('/admin');
            } else if (Auth::user()->role == 'kasir') {
                return 'hallo kasir';
                return redirect('/kasir');
            }
        } else {
            return response()->json([
                'message' => 'Login Gagal'
            ]);
        }

        return redirect()->back();
    }
}
