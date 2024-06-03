<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customers;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'message' => 'List Customers',
            'data' => Customers::all(),
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
        $validator = $request->validated();

        $customer = Customers::create([
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ]);

        return response()->json([
            'message' => 'Customers berhasil ditambahkan',
            'data' => $customer,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        return response()->json([
            'message' => 'Detail Customers',
            'data' => $customer,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customers, $id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Customers $customer)
    {
        $validator = $request->validated();

        $customer->update([
            'customer_name' => $validator['customer_name'],
            'email' => $validator['email'],
            'no_hp' => $validator['no_hp'],
            'alamat' => $validator['alamat'],
        ]);

        return response()->json([
            'message' => 'Customers berhasil diubah',
            'data' => $customer,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customers berhasil dihapus',
        ], 200);
    }
}
