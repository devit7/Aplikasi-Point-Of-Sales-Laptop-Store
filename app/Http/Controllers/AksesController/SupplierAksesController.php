<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\Supplier\StoreRequest;
use App\Http\Requests\Supplier\UpdateRequest;
use Illuminate\Http\Request;

class SupplierAksesController extends Controller
{
    public function getAll()
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);//mengexecute query
        $data = json_decode($response->getContent(), true); //json_decode merubah json ke array assosiative
        if ($response->getStatusCode() == 200) {
            return view('admin.supplier.index', [
                'data' => $data['data'],
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
    public function getEdit($supplier)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/suppliers/' . $supplier, 'GET');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.supplier.update', [
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
        $validated = $request->validated();

        $data = [
            'supplier_name' => $validated['supplier_name'],
            'no_hp' => $validated['no_hp'],
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'alamat' => $validated['alamat'],
        ];

        $request = Request::create('http://127.0.0.1:8000/api/suppliers', 'POST', $data);
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        // dd($response->getStatusCode());
        if ($response->getStatusCode() == 201) {
            session()->flash('success', 'Supplier Berhasil ditambahkan');
            return redirect()->route('supplier.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request, Supplier $supplier)
    {
        $token = session()->get('token');
        $validatedData = $request->validated();
        $data = [
            'supplier_name' => $validatedData['supplier_name'],
            'no_hp' => $validatedData['no_hp'],
            'nama_perusahaan' => $validatedData['nama_perusahaan'],
            'alamat' => $validatedData['alamat'],
        ];
        $api_url = 'http://127.0.0.1:8000/api/suppliers/' . $supplier->id . '?' . http_build_query($data);
        $request = Request::create($api_url, 'PUT');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        //dd($request);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Data Supplier Berhasil di update');
            return redirect()->route('supplier.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }

    public function deleteData($supplier)
    {
        $token = session()->get('token');
        $request = Request::create('http://127.0.0.1:8000/api/suppliers/' . $supplier, 'DELETE');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('supplier.index')->with('success', 'Data berhasil delete');
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ]);
        }
    }
}

