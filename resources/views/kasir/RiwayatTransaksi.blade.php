@extends('layout.kasir_main')
@section('title', 'Testing')
@section('content')
    <div class="p-8 ">
        <div class="mb-6">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Add Product
                </p>
                <div class="text-[#6b6eb4] flex flex-row ">
                    Manage your prduct
                </div>
            </div>
        </div>
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
            <table class="w-full mt-2  " id="table">
                <thead class="bg-[#131432]  text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#33356F]">
                        <th class="py-2 text-[#6b6eb4]">No</th>
                        <th class="text-[#6b6eb4]">User</th>
                        <th class="text-[#6b6eb4]">Toko</th>
                        <th class="text-[#6b6eb4]">Customer</th>
                        <th class="text-[#6b6eb4]">Payment</th>
                        <th class="text-[#6b6eb4]">Product</th>
                        <th class="text-[#6b6eb4]">Action</th>
                    </tr>
                </thead>
                <tbody class="text-[#6b6eb4] text-center">
                    <tr class="border-b-2 border-[#33356F]">
                        <td class="py-2">1</td>
                        <td>Product 1</td>
                        <td>Rp. 100.000</td>
                        <td>10</td>
                        <td >
                            
                        </td>
                        <td></td>
                        <td>
                        <x-modal-detail-transaksi/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </x-tables>
    </div>
@endsection

