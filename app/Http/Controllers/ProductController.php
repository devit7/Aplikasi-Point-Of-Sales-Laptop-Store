<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Http\Controllers\AksesController\SupplierController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\AksesController\merkAksesController as aksesMerk;
use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;
use App\Http\Controllers\SupplierController as supKon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Product',
            'data' => Product::orderBy('product_name', 'asc')->get(),
            'tabel_name' => (new Product)->getTable(),
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

        $product = Product::create([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $request['img'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ]);

        return response()->json([
            'message' => 'Product berhasil ditambahkan',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response()->json([
            'message' => 'Detail Product',
            'data' => $product,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->update([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $validated['img'],
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
        ]);

        return response()->json([
            'message' => 'Product berhasil diubah',
            'data' => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'message' => 'Product berhasil dihapus',
        ], 200);
    }

    
    
}
