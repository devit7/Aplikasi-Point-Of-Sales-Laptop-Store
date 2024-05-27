@extends('layout.admin_main')
@section('content')
    <div class=" p-3">
        <div class=" flex justify-end p-8">
<<<<<<< HEAD
            <a href="{{ route('supplier.create') }}" class="px-3 md:px-4 py-1 md:py-2 bg-[#aa5800] text-white rounded-lg hover:bg-[#aa5800]"><i class="fa-solid fa-arrow-right-to-bracket"></i> Add Supplier</a>
        </div>
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
            <table class="w-full mt-2  " id="table">
                <thead class="bg-[#131432]  text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#33356F]">
                        <th class="py-2 text-[#6b6eb4]">No</th>
                        <th class="text-[#6b6eb4]">Nama Supplier</th>
                        <th class="text-[#6b6eb4]">No. HP</th>
                        <th class="text-[#6b6eb4]">Nama Perusahaan</th>
                        <th class="text-[#6b6eb4]">Alamat</th>
                        <th class="text-[#6b6eb4]">Action</th>
                    </tr>
                </thead>
                <tbody class="text-[#6b6eb4] text-center">
                @forelse ($data as $supplier)
                    <tr class="border-b-2 border-[#33356F]">
                    <td class="py-2">{{ $loop->index + 1 }}</td>
                    <td>{{ $supplier['supplier_name'] }}</td>
                    <td>{{ $supplier['no_hp'] }}</td>
                    <td>{{ $supplier['nama_perusahaan'] }}</td>
                    <td>{{ $supplier['alamat'] }}</td>
                        <td class="flex flex-row gap-3">
                        <a href="{{ route('supplier.edit', [ 'supplier' => $supplier['id'] ]) }}" class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                        <x-admin.modal_hapus_supplier id="{{ $supplier['id'] }}" nama="{{  $supplier['supplier_name'] }}" />
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No data available</td>
=======
            <button class="px-3 md:px-4 py-1 md:py-2 bg-[#aa5800] text-white rounded-lg hover:bg-[#aa5800]"><i
                    class="fa-solid fa-arrow-right-to-bracket"></i> Add User</button>
        </div>
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
                <table class="w-full mt-2  " id="table">
                    <thead class="bg-[#131432]  text-[#6b6eb4]">
                        <tr class="border-b-2 border-[#33356F]">
                            <th class="py-2 text-[#6b6eb4]">No</th>
                            <th class="text-[#6b6eb4]">Nama Supplier</th>
                            <th class="text-[#6b6eb4]">No. HP</th>
                            <th class="text-[#6b6eb4]">Nama Perusahaan</th>
                            <th class="text-[#6b6eb4]">Alamat</th>
                            <th class="text-[#6b6eb4]">Action</th>
>>>>>>> b0d6f8cb92e08c747b1690a6d16f367221ee1730
                        </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4] text-center">
                        @forelse ($data as $supplier)
                            <tr class="border-b-2 border-[#33356F]">
                                <td class="py-2">{{ $loop->index + 1 }}</td>
                                <td>{{ $supplier['supplier_name'] }}</td>
                                <td>{{ $supplier['no_hp'] }}</td>
                                <td>{{ $supplier['nama_perusahaan'] }}</td>
                                <td>{{ $supplier['alamat'] }}</td>
                                <td class="flex flex-row gap-3">
                                    <x-modal-detail-transaksi />
                                    <x-alert />
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
@endsection
