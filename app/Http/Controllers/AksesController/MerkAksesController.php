<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merk\StoreRequest;
use App\Http\Requests\Merk\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\Http;

class merkAksesController extends Controller
{
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
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
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'GET');
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
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'GET');
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
        $validator = $request->validated();
        $data = [
            'merk_name' => $validator['merk_name'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'merk berhasil ditambahkan');
            return redirect()->route('merk.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }

    public function updateData(UpdateRequest $request, merk $merk)
    {
        $validator = $request->validated();

        $data = [
            'merk_name' => $validator['merk_name'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/merk/' . $merk->id .'?' . http_build_query($data);

        $request = Request::create($api_url, 'PUT');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Data merk berhasil di update');
            return redirect()->route('merk.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($merk)
    {
        $request = Request::create('http://127.0.0.1:8000/api/merk/' . $merk, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('merk.index')->with('success', 'Data berhasil dihapus');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}