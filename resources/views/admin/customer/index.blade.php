@extends('layout.admin_main')
@section('title', 'Management Customer')
@section('content')
<div class="p-7">
    <div class="mb-6">
        <div class="flex flex-col">
            <p class="text-[#6b6eb4] text-lg font-semibold">
                List Customer
            </p>
            <p class="text-[#6b6eb4]">
                A List of All of the Customers
            </p>
        </div>
    </div>
    <div class="mt-10">
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                <table class="w-full mt-2" id="table">
                    <thead class="bg-[#131432] text-[#6b6eb4]">
                        <tr class="border-b-2 border-[#33356F]">
                            <th class="py-2 text-[#6b6eb4]">No</th>
                            <th class="text-[#6b6eb4]">Name</th>
                            <th class="text-[#6b6eb4]">Email</th>
                            <th class="text-[#6b6eb4]">Phone</th>
                            <th class="text-[#6b6eb4]">Address</th>
                            <th class="text-[#6b6eb4]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4]">
                        @forelse ($data as $item)
                            <tr class="border-b-2 border-[#33356F] text-left">
                                <td class="py-2">{{ $loop->index + 1 }}</td>
                                <td>{{ $item['customer_name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['no_hp'] }}</td>
                                <td>{{ $item['alamat'] }}</td>
                                <td>
                                    <a href=#>
                                    <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-tables>
    </div>
</div>
@endsection
