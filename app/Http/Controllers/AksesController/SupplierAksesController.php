<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests\Supplier\StoreRequest;
use App\Http\Requests\Supplier\UpdateRequest;
use Illuminate\Http\Request;

class SupplierAksesController extends Controller
{
<<<<<<< HEAD
    public function getAll(){
        $request = Request::create('http://127.0.0.1:8000/api/supplier', 'GET');
=======
    public function getAll()
    {
        $request = Request::create('http://127.0.0.1:8000/api/suppliers', 'GET');
>>>>>>> b0d6f8cb92e08c747b1690a6d16f367221ee1730
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
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
        $request = Request::create('http://127.0.0.1:8000/api/supplier/' . $supplier, 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        if ($response->getStatusCode() == 200) {
            return view('admin.supplier.update', [
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
        $validated = $request->validated();
    
        $data = [
            'supplier_name' => $validated['supplier_name'],
            'no_hp' => $validated['no_hp'],
            'nama_perusahaan' =>  $validated['nama_perusahaan'],
            'alamat'=> $validated['alamat']
        ];
    
        $request = Request::create('http://127.0.0.1:8000/api/supplier', 'POST', $data);
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Supplier berhasil ditambahkan');
            return redirect()->route('supplier.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function updateData(UpdateRequest $request,Supplier $supplier)
    {
        dd($request);
        $validatedData = $request->validated();
        $data = [
            'supplier_name' => $validatedData['supplier_name'],
            'no_hp' => $validatedData['no_hp'],
            'nama_perusahaan' =>  $validatedData['nama_perusahaan'],
            'alamat' => $validatedData['alamat']
        ];
        $requestApi = Request::create('http://127.0.0.1:8000/api/supplier/' . $supplier, 'PUT', $data);
        $response = app()->handle($requestApi);
        if ($response->getStatusCode() == 200) {
            session()->flash('success', 'Data customer berhasil diupdate');
            return redirect()->route('admin.supplier.index');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function deleteData($supplier)
    {
        $request = Request::create('http://127.0.0.1:8000/api/supplier/' . $supplier, 'DELETE');
        $response = app()->handle($request);
        if ($response->getStatusCode() == 200) {
            return redirect()->route('supplier.index')->with('success', 'Data berhasil delete');
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ]);
        }
    }
}
