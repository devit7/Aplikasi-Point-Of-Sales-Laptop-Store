@extends('layout.admin_main')
@section('title', 'Customer List')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Manage Product
                </p>
                <p class="text-[#6b6eb4] ">
                    A List of All of the Products
                </p>
            </div>

            <div class=" flex flex-row ">
                <a href="{{ url('/admin/product/create/new') }}"
                    class="flex flex-row  items-center gap-2  px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Add New Product</span>
                </a>
            </div>
        </div>
        @if (session()->has('nonaktif'))
            <div class="p-4 mb-4 text-sm text-red-800 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                role="alert">
                <span class="font-medium">{{ session('nonaktif') }}</span>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-800 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        <div class="mt-10">
            <x-tables>
                <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
                    <table class="w-full mt-2 text-start " id="table">
                        <thead class="bg-[#131432]  text-[#6b6eb4]">
                            <tr class="border-b-2 border-[#33356F]">
                                <th class="py-2 text-[#6b6eb4]">No</th>
                                <th class="">Nama</th>
                                <th class="">Stock</th>
                                <th class="">Harga Jual</th>
                                <th class="">Harga Asli</th>
                                <th class="">Img</th>
                                <th class="">Suplier</th>
                                <th class="">Merk</th>
                                <th class="">Status</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#6b6eb4] text-center alig">
                            @forelse ($data as $index => $value)
                                <tr class="border-b-2 border-[#33356F]">
                                    <td class="py-2">{{ $index + 1 }}</td>
                                    <td class="flex-wrap">{{ $value['product_name'] }}</td>
                                    <td>{{ $value['stock'] }}</td>
                                    <td> @currency($value['harga_jual']) </td>
                                    <td> @currency($value['harga_asli']) </td>
                                    <td>
                                        <img src="{{ asset('storage/image_product/' . $value['img']) }}" alt="image product"
                                            class="w-10 h-10 mx-auto">
                                    </td>
                                    <td>{{ $value['supplier']['supplier_name'] }}</td>
                                    <td>{{ $value['merk']['merk_name'] }}</td>
                                    <td>
                                        <p class=" text-center  border rounded-full {{ $value['status'] == 'aktif' ? ' border-green-400 bg-green-900 text-green-400' : ' border-red-400 bg-red-900 text-red-300' }}">
                                            {{ $value['status'] == 'aktif' ? 'Aktif' : 'Nonaktif' }}
                                        </p>
                                    </td>
                                    <td class="flex flex-row gap-2">
                                        <x-modal_detail id="{{ $value['id'] }}">
                                            <div class="flex flex-col w-fit rounded-md p-5 bg-[#1C1D42]">
                                                <span class=" w-96 text-xl mb-8 text-indigo-100 font-bold">Detail
                                                    Product</span>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">No</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $index + 1 }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Nama</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['product_name'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Stock</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['stock'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Harga Jual</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['harga_jual'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Harga Asli</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['harga_asli'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Image</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <img src="{{ asset('storage/image_product/' . $value['img']) }}"
                                                        alt="image product" class="w-10 h-10 mx-auto">
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Supplier</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['supplier']['supplier_name'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Merk</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['merk']['merk_name'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Status</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $value['status'] }}</span>
                                                </div>
                                            </div>
                                        </x-modal_detail>
                                        <a href="/admin/product/update/{{ $value['id'] }}">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                        </a>
                                        <x-alert id="{{ $value['id'] }}" nama="{{ $value['product_name'] }}"
                                            route="products.admin.destroy" type="xButton" />
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
