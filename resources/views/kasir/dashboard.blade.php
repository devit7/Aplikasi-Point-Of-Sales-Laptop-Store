@extends('layout.kasir_main')
@section('title', 'Dashboard')
@section('content')
<style>
    #card-img:hover {
        transform: scale(1.1);
    }
</style>
    <div class=" text-[#93A2D2] flex flex-row w-full h-full  ">
        <div class="flex flex-col w-full py-6 px-16 min-h-screen overflow-y-auto scrollbar-hide ">
            <div class="flex flex-col ">
                <div class="text-[#93A2D2] flex ">
                    <button class=" h-12 w-12  rounded-l-lg flex items-center justify-center bg-[#1f2949]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                          </svg>                          
                    </button>
                    <input type="text" placeholder="Search Product" class="w-full h-12 px-4 rounded-r-lg bg-[#151e3b]   focus:outline-none">
                </div>
                <div class="flex flex-row py-4 mt-4 gap-4  text-lg font-semibold overflow-x-auto ">
                    <a href="#" class="py-1 rounded-lg px-6 bg-[#aa5800] bg-opacity-10 text-[#e07946]">
                        All
                    </a>
                    <a href="#" class=" py-1 bg-[#151e3b] rounded-lg px-6">
                        Lenovo
                    </a>
                    <a href="#" class=" py-1 bg-[#151e3b] rounded-lg px-6">
                        Acer
                    </a>
                    <a href="#" class=" py-1 bg-[#151e3b] rounded-lg px-6">
                        Asus
                    </a>
                </div>
            </div>
            <div class=" flex flex-col  mt-4">
                <div class="flex flex-row justify-between text-[20px] font-bold  ">
                    Products (12)
                </div>
                <div class="flex flex-wrap gap-6 mt-8 justify-between">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="w-[230px] max-h-[305px] bg-[#151e3b] rounded-lg hover:shadow-2xl  transition duration-300 ">
                            <div class="flex flex-col p-3 text-[#93A2D2] justify-between h-full">
                                <div class="relative  w-full h-full overflow-hidden max-h-[180px]">
                                    <img id="card-img" src="{{ asset('/laptop/phf4ybjk8ttu92ftvkhjfq1zf5tb5a100535.avif') }}"
                                        alt="" class="w-full h-full bg-gray-900 object-cover rounded-lg">
                                    <div
                                        class="absolute top-0 right-0  text-sm text-blue-800 bg-blue-300 rounded-bl-lg px-3 ">
                                        lenovo
                                    </div>
                                </div>
                                <div class="flex flex-col pt-3 justify-between gap-3 h-full">
                                    <div class="flex flex-col justify-between h-full ">
                                        <div class="flex flex-row justify-between text-lg font-semibold">
                                            Lenovo Legion 7i (16'', Gen 9)
                                        </div>
                                        <div class="flex flex-row justify-between">
                                            <div class=" font-bold text-[#e07946]">
                                                Rp. 1.000.000,00
                                            </div>
                                            <div class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                                </svg>
                                                <span>10</span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="font-semibold rounded-md text-blue-300 bg-indigo-800 py-1 text-center hover:bg-blue-300 hover:text-indigo-800 transition duration-300">
                                        Add to Chart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
        <div class="flex flex-col min-h-screen w-[500px] border-l border-[#33356F] bg-[#0C0D1F] ">
            <div class=" h-[100px] flex flex-row justify-center items-center gap-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
                <p class="text-[#93A2D2] text-[20px] font-bold text-center">
                    Current Order
                </p>
            </div>
            <div class="border-y border-[#33356F] h-full">
                <div class="flex flex-col gap-2 p-2 overflow-y-auto scrollbar-hide">
                    <div class="flex flex-row gap-2 justify-between p-2 items-center rounded-md border border-gray-600">
                        <img src="{{ asset('/laptop/phf4ybjk8ttu92ftvkhjfq1zf5tb5a100535.avif') }}" alt=""
                            class="w-20 h-20 rounded-md border border-gray-600">
                        <div class="flex flex-col  w-full ">
                            <p class="text-[#93A2D2] font-semibold">
                                Lenovo Legion 7i (16'', Gen 9)
                            </p>
                            <div class="flex flex-row justify-between">
                                <p class="text-[#e07946] font-semibold">
                                    Rp. 1.000.000,00
                                </p>
                                <p class="text-[#93A2D2]">
                                    2x
                                </p>
                            </div>
                            <div class="flex flex-row justify-between">
                                <p class="text-[#93A2D2]">
                                    Total :
                                </p>
                                <p class="text-green-600 font-semibold">
                                    Rp. 1.000.000,00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-between h-[300px] px-4 py-4">
                <div class=" text-lg text-[#93A2D2]">
                    <div class="flex flex-row justify-between border-b border-dashed py-2 border-gray-600 ">
                        <p class="  ">
                            Total Amount
                        </p>
                        <p class="  ">
                            Rp. 1.000.000,00
                        </p>
                    </div>
                </div>
                <div class="flex flex-col gap-2 justify-between">
                    <x-modals_transaksi />
                    <div class=" text-center rounded-md px-4 py-2 bg-gray-700 text-white hover:bg-gray-800 cursor-pointer">
                        Clear Order
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
