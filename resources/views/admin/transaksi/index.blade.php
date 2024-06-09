{{-- @dd($data) --}}
@extends('layout.admin_main')
@section('title', 'List Transaksi')
@section('content')

    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    List Transaksi
                </p>
                <p class="text-[#6b6eb4] ">
                    A List of All of the Transaction
                </p>
            </div>
        </div>
        <div class="mt-10">
            <x-tables>
                <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
                    <table class="w-full mt-2  " id="table">
                        <thead class="bg-[#131432]  text-[#6b6eb4] w-full">
                            <tr class="border-b-2 border-[#33356F]">
                                <th class="py-2 text-[#6b6eb4]">No</th>
                                <th class="">Invoice</th>
                                <th class="">Tanggal Order</th>
                                <th class="">Total Yang Harus Dibayarkan</th>
                                <th class="">Kasir</th>
                                <th class="">Customer</th>
                                <th class="">Metode Pembayaran</th>
                                <th class="">Toko</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#6b6eb4] text-center">
                            @forelse ($data as $transaction)
                                {{-- @dd($transaction) --}}
                                <tr class="border-b-2 border-[#33356F]">
                                    <td class="py-2"> {{ $loop->index + 1 }} </td>
                                    <td> {{ $transaction['invoice'] }} </td>
                                    <td> {{ $transaction['order_date'] }} </td>
                                    <td> {{ $transaction['total_semua'] }} </td>
                                    <td> {{ $transaction['user']['nama'] }} </td>
                                    <td>
                                        <img src="https://via.placeholder.com/150" alt="product" class="w-10 h-10">
                                    </td>
                                    <td>asldfj;aslkdfj</td>
                                    <td>asldfj;aslkdfj</td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </x-tables>
        </div>
    </div>

@endsection
