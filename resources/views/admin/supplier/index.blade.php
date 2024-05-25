@extends('layout.admin_main')
@section('content')
    <div class=" p-3">
        <div class=" flex justify-end p-8">
            <a href="{{ route('suppler.create') }}" class="px-3 md:px-4 py-1 md:py-2 bg-[#aa5800] text-white rounded-lg hover:bg-[#aa5800]"><i class="fa-solid fa-arrow-right-to-bracket"></i> Add Supplier</a>
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
