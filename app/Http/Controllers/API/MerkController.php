<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merk\StoreRequest;
use App\Http\Requests\Merk\UpdateRequest;
use App\Models\Merk;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Merk',
            'data' => Merk::orderBy('merk_name', 'asc')->get(),
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

        $merk = Merk::create([
            'merk_name' => $validated['merk_name'],
        ]);

        return response()->json([
            'message' => 'Merk berhasil ditambahkan',
            'data' => $merk,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Merk $merk)
    {
        return response()->json([
            'message' => 'Detail Merk',
            'data' => $merk,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Merk $merk)
    {
        $validated = $request->validated();

        $merk->update([
            'merk_name' => $validated['merk_name'],
        ]);

        return response()->json([
            'message' => 'Merk berhasil diubah',
            'data' => $merk,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merk $merk)
    {
        $merk->delete();

        return response()->json([
            'message' => 'Merk berhasil dihapus',
        ], 200);
    }

    //tidak perlu membuat function controller lagi, cukup memakai yang sudah ada diatas
    // public function getMerk()
    // {
    //     return Merk::all();
    // }
}
