@extends('layout.admin_main')
@section('title', 'Payment List')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Manage Payment
                </p>
                <p class="text-[#6b6eb4]">
                    List Semua Payment Method yang Terdaftar
                </p>
            </div>
            <div class="flex flex-row">
                <a href=/admin/payment/create
                class="flex flex-row items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#e68a2f]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <span>Tambah Payment</span>
                </a>
            </div>
        </div>
        <x-tables>
            <div class="w-full mx-auto bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                <table class="w-full mt-2" id="table">
                    <thead class="bg-[#131432] text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#33356F]">
                        <th class="py-2 text-left px-4">No</th>
                        <th class="text-left px-4">Payment Name</th>
                        <th class="text-left px-4">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4] text-left">
                    @foreach ($data as $index => $payment)
                        <tr class="border-b-2 border-[#33356F]">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="px-4">{{ $payment['payment_name'] }}</td>
                            <td class="px-4 flex items-center gap-2">
                            <a href="{{ route('payment.edit', $payment['id']) }}"type ="button" class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <x-alert id="{{ $payment['id'] }}" nama="{{ $payment['payment_name'] }}" route="payment.destroy" />
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            </x-tables>
        </div>
    </div>

   
@endsection
