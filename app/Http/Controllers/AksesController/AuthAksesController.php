<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthAksesController extends Controller
{
    public function aksesLogin(Request $request)
    {
        $request = Request::create('http://127.0.0.1:8000/api/login', 'POST', [
            'username' => $request->username,
            'password' => $request->password
        ]);

        $response = app()->handle($request);

        $response->getContent();

        dd($response->getContent());
    }
}
