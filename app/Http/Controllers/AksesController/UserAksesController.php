<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserAksesController extends Controller
{

    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/users', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.user.index', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }


    // public function getDetail($user)
    // {
    //     $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'GET');
    //     $response = app()->handle($request);
    //     $data = json_decode($response->getContent(), true);
    //     if ($response->getStatusCode() == 200) {
    //         return dd($data['data']);
    //     } else {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //         ], 401);
    //     }
    // }
    public function getEdit($user)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/users/'. $user , 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.user.update', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }

    public function createData(StoreRequest $request)
    {
        $token = session()->get('token');
        $validator = $request->validated();
        $data = [
            'nama' => $validator['nama'],
            'username' => $validator['username'],
            'password' => $validator['password'],
            'role' => $validator['role'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/users', 'POST', $data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true); // Fixed typo here
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'User berhasil ditambahkan');
            return redirect()->route('user.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request, User $user)
    {
        $token = session()->get('token');
        $validator = $request->validated();

        $data = [
            'nama' => $validator['nama'],
            'username' => $validator['username'],
            'role' => $validator['role'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/users/' . $user->id . '?' . http_build_query($data);
        $request = Request::create($api_url, 'PUT');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'User Berhasil di Update');
            return redirect()->route('user.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
    public function deleteData($user)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/users/' . $user, 'DELETE');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('user.index')->with('success', 'User Berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }
}
