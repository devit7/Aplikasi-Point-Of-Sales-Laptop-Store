<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaksi\StoreRequest;
use App\Http\Requests\Transaksi\UpdateRequest;
use App\Models\Product;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::with(['user', 'toko', 'customer', 'payment', 'product'])->get();
        return response()->json([
            'message' => 'List Transaksi',
            'data' => $data
        ], 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            // untuk mencegah error pada foreeach so bisa dirollback
            DB::beginTransaction();
            //return 'test';
            $validated = $request->validated();

            $transaksi = Transaksi::create([
                'invoice' => 'INV-' . Str::random(4) . '-' . time(), // 'INV-1234567890
                'user_id' => $validated['user_id'],
                'toko_id' => $validated['toko_id'],
                'order_date' => now(),
                'total_semua' => $validated['total_semua'],
                'customer_id' => $validated['customer_id'],
                'payment_id' => $validated['payment_id'],
            ]);

            foreach ($validated['product_id'] as $key => $value) {
                $transaksi->product()->attach(
                    $value,
                    [
                        'id' => Str::uuid(),
                        'quantity' => $validated['quantity'][$key],
                        'harga_jual' => $validated['harga_jual'][$key],
                        'harga_asli' => $validated['harga_asli'][$key],
                        'total' => $validated['total_tiap_produk'][$key],
                    ],
                );
            }

            // kurangi stok produk
            foreach ($validated['product_id'] as $key => $value) {
                $product = Product::find($value);
                $product->update([
                    'stock' => $product->stock - $validated['quantity'][$key]
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Transaksi Berhasil',
                'data' => $transaksi,
            ], 201);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return response()->json([
            'message' => 'Detail Transaksi',
            'data' => $transaksi->load(['user', 'toko', 'customer', 'payment', 'product']),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Transaksi $transaksi)
    {
        //dd($request->validated(), $transaksi);
        try {
            // untuk mencegah error pada foreeach so bisa dirollback
            DB::beginTransaction();
            //return 'test';
            $validated = $request->validated();

            $transaksiUpdate = Transaksi::where('id', $transaksi->id)->update([
                'invoice' => 'INV-' . Str::random(4) . '-' . time(), // 'INV-dwada-1234567890
                'user_id' => $validated['user_id'],
                'toko_id' => $validated['toko_id'],
                'order_date' => now(),
                'total_semua' => $validated['total_semua'],
                'customer_id' => $validated['customer_id'],
                'payment_id' => $validated['payment_id'],
            ]);

            foreach ($validated['product_id'] as $key => $value) {
                $transaksi->product()->updateExistingPivot(
                    $value,
                    [
                        'id' => Str::uuid(),
                        'quantity' => $validated['quantity'][$key],
                        'harga_jual' => $validated['harga_jual'][$key],
                        'harga_asli' => $validated['harga_asli'][$key],
                        'total' => $validated['total_tiap_produk'][$key],
                    ],
                );
            }

            // kalkulasi stok produk dari transaksi sebelumnya
            $productBefore = $transaksi->product()->get();
            foreach ($productBefore as $key => $value) {
                $product = Product::find($value->id);
                $StockBefore = $value->pivot->quantity + $product->stock;
                $StockAfter = 0;
                if ($validated['quantity'][$key] > $value->pivot->quantity) {
                    $StockAfter = $StockBefore - ($validated['quantity'][$key] - $value->pivot->quantity);
                } else {
                    $StockAfter = $StockBefore + ($value->pivot->quantity - $validated['quantity'][$key]);
                }
                $product->update([
                    'stock' => $StockAfter,
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Update Transaksi Berhasil',
                'data' => $transaksi->fresh() //fresh() untuk mengambil data terbaru
            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();
            return dd($e);
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return response()->json([
            'message' => 'Transaksi Berhasil Dihapus',
        ], 200);

    }
}
