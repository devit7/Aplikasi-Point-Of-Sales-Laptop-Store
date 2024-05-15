@extends('layout.kasir_main')
@section('content')
<div class=" p-6">
	<div class="max-w-7xl mx-auto">
		<div class="inline-block min-w-full py-2 align-middle">
			<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
			<div class="bg-[#1C1D42] rounded-md  border border-[#33356F] min-h-[500px]">
            <div class="flex flex-row justify-between px-4 py-6">
                <input type="text" class="w-[300px] bg-[#1C1D42] text-white border-2 border-[#33356F] p-2 rounded-md"
                    placeholder="Search">
                <div class="flex flex-row gap-2">
                    <button class="bg-[#aa5800] text-white px-2  rounded-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div
                        class="flex items-center  rounded-md flex-row gap-2 bg-[#1C1D42] text-[#6b6eb4] border-2 border-[#33356F] px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                        </svg>

                        <select name="" id="" class="bg-[#1C1D42] ">

                            <option value="">Sort by Date</option>
                            <option value="">Semua</option>
                            <option value="">Semua</option>
                            <option value="">Semua</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="border-t-2 border-[#33356F] p-4 ">
                <table class="w-full mt-2 ">
                    <thead class="bg-[#131432]  text-[#6b6eb4]">
                        <tr class="border-b-2 border-[#33356F]">
                            <th class="py-2 text-[#6b6eb4]">No</th>
                            <th class="text-[#6b6eb4]">User</th>
                            <th class="text-[#6b6eb4]">Toko</th>
                            <th class="text-[#6b6eb4]">Customer</th>
                            <th class="text-[#6b6eb4]">Payment</th>
                            <th class="text-[#6b6eb4]">Product</th>
                            <th class="text-[#6b6eb4]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4] text-center">
                        <tr class="border-b-2 border-[#33356F]">
                            <td class="py-2">1</td>
                            <td>Product 1</td>
                            <td>Rp. 100.000</td>
                            <td>10</td>
                            <td >
                                
                            </td>
							<td></td>
							<td>
							<x-modal-detail-transaksi/>
							</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
			</div>
		</div>
	</div>
</div>
@endsection