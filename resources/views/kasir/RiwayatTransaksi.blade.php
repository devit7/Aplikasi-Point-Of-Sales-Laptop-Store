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
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
            <table class="w-full mt-2  " id="table">
                <thead class="bg-[#131432]  text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#6b6eb4]">
                        <th class="py-2 ">No</th>
                        <th class="">User</th>
                        <th class="">Toko</th>
                        <th class="">Customer</th>
                        <th class="">Payment</th>
                        <th class="">Product</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody class="text-[#6b6eb4] text-center">
                    @forelse ($data as $riwayat)
                    @foreach ($riwayat['product'] as $product)
                    
                    <tr class="border-b-2 border-[#33356F]">
                        <td class="py-2">{{ $loop->index + 1 }}</td>
                        <td>{{$riwayat['user']['nama']}}</td>
                        <td>{{ $riwayat['toko']['nama_toko'] }}</td>
                        <td>{{ $riwayat['customer']['customer_name']}}</td>
                        <td>{{ $riwayat['payment']['payment_name']}}</td>
                        <td>{{$product['product_name']}}</td>
                        <td class="flex flex-row gap-2">
                        <x-modal_detail>
                            <div class="flex flex-col rounded-md p-6 bg-white border border-gray-400">
                                <div class="text-center">
                                    <img src="" alt="product" class="w-10 h-10 mx-auto">
                                    <p class="text-lg font-semibold"></p>
                                    <p class="text-sm"></p>
                                    <p class="text-sm"></p>
                                </div>
                                <div class="flex flex-col pb-2  mt-4 border-b-2 border-dashed border-gray-400 ">
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">22-10-2020</p>
                                        <p class="">13:00</p>
                                    </div>
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Transaksi</p>
                                        <p class="">TRX-00</p>
                                    </div>
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Status</p>
                                        <p class="">Sukses</p>
                                    </div>
                                </div>
                                <div class="text-center font-semibold">Tipe Pesanan</div>
                                <div class="flex flex-col pb-2  mt-4 border-b-2 border-dashed border-gray-400 ">
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Daftar Product</p>
                                    </div>
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Laptop ROG ( F05 )</p>
                                        <p class="">Rp. 15.000.000.00</p>
                                    </div>
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Tuf Gaming ( F-A05 )</p>
                                        <p class="">Rp. 21.000.000.00</p>
                                    </div>
                                </div>
                                <div class="flex flex-col pb-2  mt-4  ">
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Total</p>
                                        <p class="">Rp. 35.000.000.00</p>
                                    </div>
                                    <div class="flex flex-row justify-between  ">
                                        <p class="">Metode Pembayaran</p>
                                        <p class="">Tunai</p>
                                    </div>
                                </div>
                                <div class="text-center font-semibold mt-10">
                                    <p>Terima Kasih</p>
                                    <p class=" font-medium">Terus Laris Bersama </p>
                                </div>
                            </div>
                        </x-modal_detail>
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

