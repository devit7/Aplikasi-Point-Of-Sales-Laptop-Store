<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merk\StoreRequest;
use App\Http\Requests\Merk\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\Http;

class MerkAksesController extends Controller
{
    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.merk.index', [
                'data' => $data['data']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function getDetail($merk)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
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

    public function getEdit($merk)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.merk.update', ['merk' => $data['data']]);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }

    public function createData(StoreRequest $request)
    {
        $token = session()->get('token');
        $validator = $request->validated();
        $data = [
            'merk_name' => $validator['merk_name'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'POST', $data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Merk berhasil ditambahkan');
            return redirect()->route('merk.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function updateData(UpdateRequest $request, merk $merk)
    {
        $token = session()->get('token');
        $validator = $request->validated();

        $data = [
            'merk_name' => $validator['merk_name'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/merk/' . $merk->id .'?' . http_build_query($data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $request = Request::create($api_url, 'PUT');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Merk berhasil di update');
            return redirect()->route('merk.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($merk)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'DELETE');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}