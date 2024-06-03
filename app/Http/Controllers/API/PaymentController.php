<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\StoreRequest;
use App\Http\Requests\Payments\UpdateRequest;
use App\Models\Payments;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Payments',
            'data' => Payments::all(),
        ]);
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
        $validator = $request->validated();

        $payment = Payments::create([
            'payment_name' => $validator['payment_name'],
        ]);

        return response()->json([
            'message' => 'Payment berhasil ditambahkan',
            'data' => $payment,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function show(Payments $payment)
    {
        return response()->json([
            'message' => 'Detail Payments',
            'data' => $payment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function edit(Payments $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Payments $payment)
    {
        $validator = $request->validated();

        $payment->update([
            'payment_name' => $validator['payment_name'],
        ]);

        return response()->json([
            'message' => 'Payment berhasil diubah',
            'data' => $payment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payments  $payments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payments $payment)
    {
        $payment->delete();

        return response()->json([
            'message' => 'Payment berhasil dihapus',
        ]);
    }
}