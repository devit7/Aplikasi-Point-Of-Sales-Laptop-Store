@extends('layout.admin_main')

@section('content')
    <div class=" p-7 ">

        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Manage Supplier
                </p>
                <p class="text-[#6b6eb4] ">
                    All Supplier
                </p>
            </div>
            <div class=" flex flex-row ">
                <a href="/admin/supplier/create"
                    class="flex flex-row  items-center gap-2  px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Create New Supplier</span>
                </a>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                <table class="w-full mt-2" id="table">
                    <thead class="bg-[#131432] text-[#6b6eb4]">
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
                                <td class="flex flex-row gap-3 justify-center">
                                    <x-modal_detail id="{{ $supplier['id'] }}">
                                        <div class="flex flex-col w-fit rounded-md p-5 bg-[#1C1D42]">
                                            <span class=" w-96 text-xl mb-8 text-indigo-100 font-bold">Detail
                                                Supplier</span>
                                            <div class="flex items-center space-x-4">
                                                <span class=" text-indigo-200 p-1 font-semibold">Nama Supplier</span>
                                                <hr class="flex-grow border-gray-200">
                                                <span>{{ $supplier['supplier_name'] }}</span>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <span class=" text-indigo-200 p-1 font-semibold">no. HP</span>
                                                <hr class="flex-grow border-gray-200">
                                                <span>{{ $supplier['no_hp'] }}</span>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <span class=" text-indigo-200 p-1 font-semibold">Nama Perusahaan</span>
                                                <hr class="flex-grow border-gray-200">
                                                <span>{{ $supplier['nama_perusahaan'] }}</span>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <span class=" text-indigo-200 p-1 font-semibold">Alamat</span>
                                                <hr class="flex-grow border-gray-200">
                                                <span>{{ $supplier['alamat'] }}</span>
                                            </div>
                                        </div>
                                    </x-modal_detail>
                                    <a href="{{ route('supplier.edit', ['supplier' => $supplier['id']]) }}"
                                        class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    <x-alert id="{{ $supplier['id'] }}" nama="{{ $supplier['supplier_name'] }}"
                                        route="supplier.deleteCoy" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-tables>
    </div>
    </div>
@endsection
