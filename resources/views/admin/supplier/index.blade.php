@extends('layout.admin_main')
@section('content')
    <div class=" p-3">
        <div class=" flex justify-end p-8">
            <button class="px-3 md:px-4 py-1 md:py-2 bg-[#aa5800] text-white rounded-lg hover:bg-[#aa5800]"><i class="fa-solid fa-arrow-right-to-bracket"></i> Add User</button>
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
                    <tr class="border-b-2 border-[#33356F]">
                        <td class="py-2">1</td>
                        <td>Product 1</td>
                        <td>Rp. 100.000</td>
                        <td>10</td>
                        <td></td>
                        <td>
                        <x-modal-detail-transaksi/>
                        <x-alert/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </x-tables>
    </div>
@endsection
