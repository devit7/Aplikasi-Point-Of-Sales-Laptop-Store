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
                            <th class="py-2">No</th>
                            <th>Nama Supplier</th>
                            <th>No. HP</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $supplier => $sp)
                            <tr class="border-b-2 border-[#33356F]">
                                <td class="py-2">{{ $loop->index +  1 }}</td>
                                <td>{{ $sp['supplier_name'] }}</td>
                                <td>{{ $sp['no_hp'] }}</td>
                                <td>{{ $sp['nama_perusahaan'] }}</td>
                                <td>{{ $sp['alamat'] }}</td>
                                <td class="flex flex-row gap-3 justify-center">
                                    <a href="{{ route('supplier.edit', ['supplier' => $sp['id']]) }}"
                                    class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zM16.862 4.487L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <x-alert id="{{ $sp['id'] }}" nama="{{ $sp['supplier_name'] }}"
                                            route="supplier.deleteCoy"/>
                                </td>
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
