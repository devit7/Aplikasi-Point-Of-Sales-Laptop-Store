@extends('layout.kasir_main')
@section('title', 'Testing')
@section('content')
    <div class="p-8 ">
        <div class="mb-6">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    List Transaksi
                </p>
                <div class="text-[#6b6eb4] flex flex-row ">
                    Show Transaksi List
                </div>
            </div>
        </div>
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-white  p-4 rounded-md">
            <table class="w-full mt-2  " id="table">
                <thead class="bg-[#131432]  text-white">
                    <tr class="border-b-2 border-white">
                        <th class="py-2 text-white">No</th>
                        <th class="text-white">User</th>
                        <th class="text-white">Toko</th>
                        <th class="text-white">Customer</th>
                        <th class="text-white">Payment</th>
                        <th class="text-white">Product</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="text-white text-center">
                    @forelse ($data as $riwayat)
                    @foreach ($riwayat['product'] as $product)
                    <tr class="border-b-2 border-[#33356F]">
                        <td class="py-2">{{ $loop->index + 1 }}</td>
                        <td>{{$riwayat['user']['nama']}}</td>
                        <td>{{ $riwayat['toko']['nama_toko'] }}</td>
                        <td>{{ $riwayat['customer']['customer_name']}}</td>
                        <td>{{ $riwayat['payment']['payment_name']}}</td>
                        <td>{{$product['product_name']}}</td>
                        <td>
                        <x-modal-detail/>
                        </td>
                    </tr>
                    @endforeach

                    @empty
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </x-tables>
    </div>
@endsection

