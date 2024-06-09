<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

// use App\Http\Controllers\AksesController\SupplierController;
// use App\Http\Controllers\MerkController;
// use App\Http\Controllers\AksesController\merkAksesController as aksesMerk;
// use App\Http\Controllers\AksesController\SupplierAksesController as AksesSup;
// use App\Http\Controllers\SupplierController as supKon;
// use DateTime;

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
            'data' => Product::with(['supplier', 'merk'])->orderBy('product_name', 'asc')->get(),
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

        $img_product_name = null;
        if ($request->hasFile('img')) {
            $img_product = $request->file('img');
            $img_product_name = time() . '.' . $img_product->getClientOriginalExtension();
            $img_product->storePubliclyAs('image_product', $img_product_name, 'public');
        }

        $product = Product::create([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $img_product_name,
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
            'status' => 'aktif',
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
            'data' => Product::with(['supplier', 'merk'])->findOrFail($product->id),
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
        // dd($request, $product);
        $validated = $request->validated();
        // dd("validated API", $validated, "productAPI", $product);

        $img_product_name = $product->img;
        if ($request->hasFile('img_product')) {
            $img = $request->file('img_product');
            $img_product_name = time() . '.' . $img->getClientOriginalExtension();
            $img->storePubliclyAs('image_product', $img_product_name, 'public');

            Storage::delete('public/logos/' . $product->img);
        }

        $product->update([
            'product_name' => $validated['product_name'],
            'stock' => $validated['stock'],
            'harga_jual' => $validated['harga_jual'],
            'harga_asli' => $validated['harga_asli'],
            'img' => $img_product_name,
            'supplier_id' => $validated['supplier_id'],
            'merk_id' => $validated['merk_id'],
            'status' => $validated['status'],
        ]);

        // $product->update([
        //     'product_name' => $product['product_name'],
        //     'stock' => $product['stock'],
        //     'harga_jual' => $product['harga_jual'],
        //     'harga_asli' => $product['harga_asli'],
        //     'img' => $product['img'],
        //     'supplier_id' => $product['supplier_id'],
        //     'merk_id' => $product['merk_id'],
        // ]);

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
        $product->update([
            'status' => 'tidak aktif',
        ]);

        return response()->json([
            'message' => 'Product berhasil dihapus',
        ], 200);
    }
}
