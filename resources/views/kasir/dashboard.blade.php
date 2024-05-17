@extends('layout.kasir_main')
@section('content')
<div class="p-6">
    <div class="flex items-center justify-center h-20 text-center border-b border-l border-[#33356F]">
        <h1 class="m-0 p-0 text-[15px] font-semibold text-gray-500">Selasa, 12 May 2024 23.04</h1>
        <button class="flex items-center justify-center bg-orange-500 rounded-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
            </svg>
            <p>Checkout(18)</p>
        </button>
    </div>
    <div class="mb-6">
        <div class="flex flex-col">
            <p class="text-lg font-semibold text-[#6b6eb4]">Products List</p>
            <p class="p-0 text-[#6b6eb4]">A List of All of the Products</p>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <div class="min-h-[500px] bg-[#1C1D42] rounded-md border border-[#33356F]">
                    <div class="flex justify-between px-4 py-6">
                        <input type="text" class="w-[300px] bg-[#1C1D42] text-white border-2 border-[#33356F] p-2 rounded-md" placeholder="Search">
                        <div class="flex gap-2">
                            <button class="bg-[#aa5800] text-white px-2 rounded-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                                </svg>
                            </button>
                            <div class="flex items-center gap-2 px-2 bg-[#1C1D42] text-[#6b6eb4] border-2 border-[#33356F] rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                                </svg>
                                <select name="" id="" class="bg-[#1C1D42] text-white">
                                    <option value="">Sort by Date</option>
                                    <option value="">Semua</option>
                                    <option value="">Semua</option>
                                    <option value="">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-t-2 border-[#33356F]">
                        <div class="flex flex-col space-y-4">
                            <div class="flex space-x-4">
                                <div class="block bg-[#131432] rounded-tl-md rounded-br-md shadow-md p-4">
                                    <div class="flex justify-center items-center h-60 mb-4">
                                        <a href="#">
                                            <img src="/foto/macc.png" class="transform scale-150">
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-lg font-semibold">
                                            <a href="#" class="text-white">MacBook Pro 5</a>
                                        </h3>
                                        <p class="text-sm text-gray-400">2.8GHz Processor 1TB Storage 16GB DDR</p>
                                        <div class="flex justify-between items-center mt-4">
                                            <button type="button" class="btn btn-primary flex items-center justify-center w-3/4">
                                                <i class="fa fa-shopping-cart mr-2"></i>
                                                <p>Add to cart</p>
                                            </button>
                                            <button class="flex items-center justify-center w-1/4 bg-[#002D4C] text-[#718695] rounded-full p-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @for($j=1;$j<=5;$j++)
                                @endfor
                            </div>
                            @for($i=1;$i<=5;$i++)
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
