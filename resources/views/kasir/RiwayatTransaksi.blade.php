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
                    <tr class="border-b-2 border-[#33356F]">
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
                        <x-modal_detail id="{{$riwayat['id']}}">
                            <div class="flex flex-col w-fit rounded-md p-5 bg-[#1C1D42]">
                                <span class=" w-96 text-xl mb-8 text-indigo-100 font-bold">Detail Transaksi</span>
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">User</span>
                                    <hr class="flex-grow border-gray-200">
                                    <span>{{$riwayat['user']['nama']}}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">Toko</span>
                                    <hr class="flex-grow border-gray-200">
                                    <span>{{ $riwayat['toko']['nama_toko'] }}</span>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class=" text-indigo-200 p-1 font-semibold">Atas nama</span>
                                    <hr class="flex-grow border-gray-200">
                                    <span class=" ">{{ $riwayat['customer']['customer_name']}}</span>
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

