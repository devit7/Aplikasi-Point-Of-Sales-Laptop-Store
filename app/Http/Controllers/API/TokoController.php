<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Toko\StoreRequest;
use App\Http\Requests\Toko\UpdateRequest;
use App\Models\Toko;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Toko',
            'data' => Toko::orderBy('nama_toko', 'asc')->get(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreRequest $request)
    // {
    //     $validated = $request->validated();

    //     $toko = Toko::create([
    //         'nama_toko' => $validated['nama_toko'],
    //         'logo_toko' => $validated['logo_toko']->getClientOriginalName(),
    //         'alamat' => $validated['alamat'],
    //         'no_hp' => $validated['no_hp'],
    //     ]);

    //     return response()->json([
    //         'message' => 'Toko berhasil ditambahkan',
    //         'data' => $toko,
    //     ], 201);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Toko $toko)
    // {
    //     return response()->json([
    //         'message' => 'Detail Toko',
    //         'data' => $toko,
    //     ], 200);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Toko $toko)
    {
        $validated = $request->validated();
        $logo_toko_name = $toko->logo_toko; //logo lama
        if ($request->hasFile('logo_toko')) {
            $logo_toko = $request->file('logo_toko');
            $logo_toko_name = time() . '.' . $logo_toko->getClientOriginalExtension();
            $logo_toko->storePubliclyAs('logos', $logo_toko_name, 'public');

            Storage::delete('public/logos/' . $toko->logo_toko);
        }

        $toko->update([
            'nama_toko' => $validated['nama_toko'],
            'logo_toko' => $logo_toko_name,
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
        ]);

        return response()->json([
            'message' => 'Toko berhasil diubah',
            'data' => $toko,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Toko $toko)
    // {
    //     $toko->delete();

    //     return response()->json([
    //         'message' => 'Toko berhasil dihapus',
    //     ], 200);
    // }
}
