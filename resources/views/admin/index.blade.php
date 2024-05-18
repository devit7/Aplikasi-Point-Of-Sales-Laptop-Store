@extends('layout.admin_main')
@section('title', 'Dashboard Admin')
@section('content')
    <div class=" flex flex-col  gap-5 place-items-center min-h-screen min-w-full text-white p-2 pt-12">

        <div class=" gap-10 flex flex-row ">
            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row gap-5 items-center justify-center p-4">
                    <div class=" flex flex-shrink-0 font-bold text-xl bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class=" text-white font-semibold">
                            Rp.1000.000,00
                        </p>
                        <p class=" text-xs font-light">
                            Total Keuntungan
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 place-items-center p-4 ">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class=" text-white font-semibold">
                            Rp.500.000,00
                        </p>
                        <p class=" text-xs font-light">
                            Total Harga Asli Terjual
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4 ">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            2000
                        </p>
                        <p class=" text-xs font-light">
                            Total Produk Terjual
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/transaction.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            500
                        </p>
                        <p class=" text-xs font-light">
                            Total Transaksi
                        </p>
                    </div>
                </div>
            </div>


        </div>

        <div class=" gap-10 flex flex-row ">

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#b326ae48] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/product.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            50.000
                        </p>
                        <p class=" text-xs font-light">
                            Total Produk
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#d5462d41] rounded-full p-1 overflow-clip">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/people.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            398
                        </p>
                        <p class=" text-xs font-light">
                            Total Kustomer
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#dd262650] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/cashier.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            5
                        </p>
                        <p class=" text-xs font-light">
                            Total Kasir
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col bg-[#1C1D42] max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            25
                        </p>
                        <p class=" text-xs font-light">
                            Total Merk
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class=" gap-10 flex flex-row">

            <div class="flex flex-col bg-[#1C1D42] w- rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-72 min-h-60 gap-5 items-center p-4">
                    <div class="w-full font-bold text-xl text-center rounded-full p-1 container">

                    </div>
                </div>
            </div>

            <div class=" min-w-[30rem] max-w-md rounded overflow-hidden shadow-lg bg-[#1C1D42] border border-[#33356F] ">

                <div>
                    <div class="bg-[#FD9D3F] text-base text-black font-semibold text-center">
                        <h1>Top 5 Produk Terjual</h1>
                    </div>
                    <div
                        class="flex bg-[#131432] px-4 py-2 justify-between items-center pr-6 text-center border-y border-[#33356F]">
                        <p>Nama Produk</p>
                        <p>Total Terjual</p>
                    </div>
                </div>

                <div class="flex px-2 py-2 items-center justify-between ">
                    <div class="w-5/12 flex">
                        <img class="w-6 sm:w-10 mr-2 self-center" alt="away-logo"
                            src="https://p2-ofp.static.pub/ShareResource/na/subseries/hero/lenovo-thinkpad-t14-gen3-amd-thunder-black.png">
                        <div class="flex flex-col">
                            <p class="text-sm font-bold">Thinkpad T14 Gen 3</p>
                            <p class="hidden sm:block font-medium text-[#4E6196]">Lenovo</p>
                        </div>
                    </div>
                    <p class="w-1/6 text-lg sm:text-xl font-bold text-right pr-6">123</p>
                </div>

                <div class="flex px-2 py-2 items-center justify-between ">
                    <div class="w-5/12 flex">
                        <img class="w-6 sm:w-10 mr-2 self-center" alt="home-logo"
                            src="https://dlcdnwebimgs.asus.com/gain/50E7C82B-1054-4678-926B-B9FC0EF4D75D/w717/h525/w273">
                        <div class="flex flex-col">
                            <p class="text-sm font-bold">ROG Strix G18</p>
                            <p class="hidden sm:block font-medium text-[#4E6196]">Asus</p>
                        </div>
                    </div>
                    <p class="w-1/6 text-lg sm:text-xl font-bold text-right pr-6">109</p>
                </div>

                <div class="flex px-2 py-2 items-center justify-between ">
                    <div class="w-5/12 flex">
                        <img class="w-6 sm:w-10 mr-2 self-center" alt="home-logo"
                            src="https://dlcdnwebimgs.asus.com/gain/50E7C82B-1054-4678-926B-B9FC0EF4D75D/w717/h525/w273">
                        <div class="flex flex-col">
                            <p class="text-sm font-bold">Nitro 5</p>
                            <p class="hidden sm:block font-medium text-[#4E6196]">Acer</p>
                        </div>
                    </div>
                    <p class="w-1/6 text-lg sm:text-xl font-bold text-right pr-6">109</p>
                </div>

            </div>

        </div>
    @endsection
