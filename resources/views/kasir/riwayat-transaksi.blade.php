@extends('layout.kasir_main')
@section('title', 'Riwayat Transaksi')
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
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
            <table class="w-full mt-2  " id="table">
                <thead class="bg-[#131432]  text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#33356F]">
                        <th class="py-2 ">No</th>
                        <th class="">Kasir</th>
                        <th class="">Toko</th>
                        <th class="">Customer</th>
                        <th class="">Payment</th>
                        <th class="">Order Date</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody class="text-[#6b6eb4] text-center">
                    
                    @forelse ($data as $riwayat)
                    
                    <tr class="border-b-2 border-[#33356F]">
                        <td class="py-2">{{ $loop->index + 1 }}</td>
                        <td>{{$riwayat['user']['nama']}}</td>
                        <td>{{ $riwayat['toko']['nama_toko'] }}</td>
                        <td>{{ $riwayat['customer']['customer_name']}}</td>
                        <td>{{ $riwayat['payment']['payment_name']}}</td>
                        <td>{{$riwayat['created_at']}}</td>
                        <td class="flex flex-row gap-2">
                        <x-modal_detail id="{{$riwayat['id']}}">
                        <div class="flex flex-col w-fit rounded-md p-5">
                            <div class=" w-96 pb-5">

                                <span class="  w-96 text-xl mb-8 text-indigo-100 font-bold">Detail Transaksi</span>
                                <div class="flex items-center space-x-4">
                                    <span class=" p-1 font-semibold text-indigo-200">Invoice</span>
                                    <hr class="flex-grow border-indigo-200 opacity-0">
                                    <span class=" text-indigo-200">{{$riwayat['invoice']}}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class=" p-1 font-semibold text-indigo-200">Kasir</span>
                                    <hr class="flex-grow border-indigo-200 opacity-0">
                                    <span class=" text-indigo-200">{{$riwayat['user']['nama']}}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">Toko</span>
                                    <hr class="flex-grow border-gray-200 opacity-0">
                                    <span class=" text-indigo-200">{{ $riwayat['toko']['nama_toko'] }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">Atas nama</span>
                                    <hr class="flex-grow border-gray-200 opacity-0">
                                    <span class=" text-indigo-200">{{ $riwayat['customer']['customer_name']}}</span>
                                </div>
                            </div>
                            <div class=" border-dashed border-indigo-200 border-t-2 border-b-2 py-10">
                                
                                <span class=" w-96 text-l mb-8 text-indigo-100 font-bold">Daftar Produk</span>
                                
                                @php
                                    $totalHarga = 0;
                                @endphp
    
                                @foreach ($riwayat['product'] as $product)
                                @php
                                    $totalHarga += $product['harga_jual'];
                                @endphp
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">{{ $product['product_name']}}</span>
                                    <hr class="flex-grow border-gray-200 opacity-0">
                                    <span class=" text-indigo-200">{{ $product['harga_jual']}}</span>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="flex items-center space-x-4">
                                <span class=" text-indigo-200 p-1 font-semibold">Total</span>
                                <hr class="flex-grow border-gray-200 opacity-0">
                                <span class=" text-indigo-200">{{ $totalHarga }}</span>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class=" text-indigo-200 p-1 font-semibold">Metode Pembayaran</span>
                                <hr class="flex-grow border-gray-200 opacity-0">
                                <span class=" text-indigo-200">{{ $riwayat['payment']['payment_name']}}</span>
                            </div>
                        </div>
                    </x-modal_detail>

                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            </div>
        </x-tables>
    </div>
@endsection

