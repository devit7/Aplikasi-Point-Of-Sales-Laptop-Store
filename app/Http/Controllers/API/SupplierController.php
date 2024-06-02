<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreRequest;
use App\Http\Requests\Supplier\UpdateRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Supplier',
            'data' => Supplier::orderBy('supplier_name', 'asc')->get(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $toko = Supplier::create([
            'supplier_name' => $validated['supplier_name'],
            'no_hp' => $validated['no_hp'],
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'alamat' => $validated['alamat'],
        ]);

        return response()->json([
            'message' => 'Supplier berhasil ditambahkan',
            'data' => $toko,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return response()->json([
            'message' => 'Detail Supplier',
            'data' => $supplier,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Supplier $supplier)
    {
        $validated = $request->validated();

        $supplier->update([
            'supplier_name' => $validated['supplier_name'],
            'no_hp' => $validated['no_hp'],
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'alamat' => $validated['alamat'],
        ]);

        return response()->json([
            'message' => 'Toko berhasil diubah',
            'data' => $supplier,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return response()->json([
            'message' => 'Supplier berhasil dihapus',
        ], 200);
    }

    //tidak perlu membuat function controller lagi, cukup memakai yang sudah ada diatas
    // public function getSupplier()
    // {
    //     $back = Supplier::all();
    //     return $back;
    // }
}
