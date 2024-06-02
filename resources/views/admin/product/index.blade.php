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
                <a href="{{ route('products.create') }}"
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
        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        <div class="mt-10">
            <x-tables>
                <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
                    <table class="w-full mt-2  " id="table">
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
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#6b6eb4] text-center">

                            @forelse ($data as $index => $value)
                                <tr class="border-b-2 border-[#33356F]">
                                    <td class="py-2">{{ $index + 1 }}</td>
                                    <td>{{ $value['product_name'] }}</td>
                                    <td>{{ $value['stock'] }}</td>
                                    <td>{{ $value['harga_jual'] }}</td>
                                    <td>{{ $value['harga_asli'] }}</td>
                                    <td>
                                        <img src="{{ asset('storage/image_product/' . $value['img']) }}" alt="image product"
                                            class="w-10 h-10 mx-auto">
                                    </td>
                                    <td>{{ $value['supplier']['supplier_name'] }}</td>
                                    <td>{{ $value['merk']['merk_name'] }}</td>
                                    <td>
                                        <a href="{{ route('products.show', $value['id']) }}">
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
                                        <a href="{{ route('products.edit', $value['id']) }}">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>

                                            </button>
                                        </a>
                                        <a href="{{ route('products.destroy', $value['id']) }}">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </a>
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
