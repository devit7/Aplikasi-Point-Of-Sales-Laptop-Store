<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        //dd($request->validated());
        $validator = $request->validated();

        $dataLogin = [
            'username' => $validator['username'],
            'password' => $validator['password'],
        ];
        if (Auth::attempt($dataLogin)) {

            $user = User::where('username', $request->username)->firstOrFail();
            $token = $user->createToken('token-auth')->plainTextToken;
            //dd($token);
            if (Auth::user()->role == 'admin') {
                return response()->json([
                    'message' => 'Login Berhasil Admin',
                    'data' => Auth::user(),
                    'token' => $token,
                ]);
            } else if (Auth::user()->role == 'kasir') {
                return response()->json([
                    'message' => 'Login Berhasil Kasir',
                    'data' => Auth::user(),
                    'token' => $token,
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Login Gagal',
            ]);
        }

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
