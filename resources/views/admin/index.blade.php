@extends('layout.admin_main')
@section('title', 'Dashboard Admin')
@section('content')
    <div class=" flex flex-col gap-5 place-items-center min-h-screen min-w-full text-white p-2 mt-24">
        <div class=" gap-10 flex flex-row ">
            <div class="flex flex-col max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row gap-5 place-items-center p-4 ">
                    <div class="font-bold text-xl mb-2 bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png')}} ">
                    </div>
                    <div class=" text-[#4E6196] text-base text-center">
                        <p>
                            Rp.1000.000,00
                        </p>
                        <p>
                            Total Keuntungan
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row gap-5 place-items-center p-4 ">
                    <div class="font-bold text-xl mb-2 bg-[#193248] rounded-full p-1">
                        <img class=" img-fluid size-10" src=" {{ asset('foto/dollar-logo.png')}} ">
                    </div>
                    <div class=" text-[#4E6196] text-base text-center">
                        <p>
                            Rp.500.000,00
                        </p>
                        <p>
                            Total Harga Asli Terjual
                        </p>
                    </div>
                </div>
            </div>

            <div class=" gap-2 flex flex-row">

            </div>
        </div>
    @endsection
