<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merk\StoreRequest;
use Illuminate\Http\Request;

class MerkAksesController extends Controller
{
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/merk', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            // dd($data['data'][0]);
            return view('admin.merk.index', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
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
                'message' => 'Unauthorized',
            ]);
        }
    }
    public function createData(StoreRequest $request)
    {
        $validator = $request->validated();
        $data = [
            'merk_name' => $validator['merk_name'],
        ];
        $request = Request::create('http://127.0.0.1:8000/api/merk/', 'POST', $data);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 202) {
            session()->flash('success', 'Merk berhasil ditambahkan');
            return redirect()->route('admin.merk.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }
}
