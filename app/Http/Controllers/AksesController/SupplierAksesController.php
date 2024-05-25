<?php

namespace App\Http\Controllers\AksesController;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreRequest;
use Illuminate\Http\Request;

class SupplierAksesController extends Controller
{
    public function getAll(){
        $request = Request::create('http://127.0.0.1:8000/api/supplier', 'GET');
        $response = app()->handle($request);
        $data = json_decode($response->getContent(), true);
        
        if ($response->getStatusCode() == 200) {
            return view('admin.supplier.index', [
                'data' => $data['data']
            ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
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
}
