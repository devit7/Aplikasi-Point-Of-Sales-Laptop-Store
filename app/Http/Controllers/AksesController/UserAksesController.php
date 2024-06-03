<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserAksesController extends Controller
{

    public function getAll(){
        //$token= 'Bearer 3|hsCLwqd8roBQ7zXXHG0WZghmrCe5RuIgGhhOl2Dxc73d7c89';
        $request = Request::create('http://127.0.0.1:8000/api/users', 'GET');
        //$request->headers->set('Authorization', $token);
        $response = app()->handle($request);
        // merubah json ke array
        $data = json_decode($response->getContent(),true);
        if($response->getStatusCode() == 200){
            //return dd($data['data']);
            return view('admin.user.index', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function getDetail($user)
    {
        $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(),true);
        if ($response->getStatusCode() == 200) {
            return dd($data['data']);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
    public function getEdit($user)
    {
        $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.user.update', [
                'data' => $data['data']
            ]);
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
            'nama' => $validator['nama'],
            'username' => $validator['username'],
            'password' => $validator['password'],
            'role' => $validator['role'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/users', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true); // Fixed typo here
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'User berhasil ditambahkan');
            return redirect()->route('user.index');
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request, User $user)
    {
        $request->validated();
        $data = [
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'role' => $request->input('role'),
        ];
        $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'PUT', $data);
        $response = app()->handle($request);
        if($response->getStatusCode() == 200){
            return view('admin.user.update', [
                'data' => $data['data']
                ]);
        }else{
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }
    public function deleteData($user)
    {
        $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('user.index')->with('success', 'user berhasil delete');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}
