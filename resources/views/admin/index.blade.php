@extends('layout.admin_main')
@section('title', 'Dashboard Admin')
@section('content')
    <div class=" flex flex-col  gap-5 place-items-center min-h-screen min-w-full text-white p-2 pt-12">

        <div class=" gap-9 flex flex-row w-full px-5 ">

            <div class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row gap-5 items-center justify-center p-4">
                    <div class=" flex flex-shrink-0 font-bold text-xl bg-[#25c72d3a] rounded-full p-1">
                        <img class="  size-10" src=" {{ asset('foto/dollar-logo.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class=" text-white font-semibold">
                            {{ 'Rp' . number_format($totalProfit, 2, ',', '.') }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Pendapatan Bersih
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 place-items-center p-4 ">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#ffff0036] rounded-full p-1">
                        <img class="  size-10" src=" {{ asset('foto/dollar-logo-yellow.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class=" text-white font-semibold">
                            {{ 'Rp' . number_format($totalOriginalPrice, 2, ',', '.') }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Pendapatan Kotor
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4 ">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#1dae224c] rounded-full p-1">
                        <img class="  size-10" src=" {{ asset('foto/sold-product.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalProductSold }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Produk Terjual
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#2b23bc3c] rounded-full p-1">
                        <img class="  size-10" src=" {{ asset('foto/transaction.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalTransaction }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Transaksi
                        </p>
                    </div>
                </div>
            </div>


        </div>

        <div class=" gap-9 flex flex-row w-full px-5 ">

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#b326ae48] rounded-full p-1">
                        <img class=" size-10" src=" {{ asset('foto/product.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalProduct }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Produk
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#d5462d41] rounded-full p-1 overflow-clip">
                        <img class=" size-10" src=" {{ asset('foto/people.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalCustomer }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Kustomer
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#db6e264e] rounded-full p-1 overflow-clip">
                        <img class="  size-10" src=" {{ asset('foto/cashier.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalCashier }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Kasir
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col bg-[#1C1D42] w-full max-w-sm rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-60 gap-5 items-center p-4">
                    <div class="flex flex-shrink-0 font-bold text-xl bg-[#66b8ff3e] rounded-full p-1 overflow-clip">
                        <img class="  size-10" src=" {{ asset('foto/brand.png') }} ">
                    </div>
                    <div class="text-[#4E6196] text-base text-center w-full">
                        <p class="text-white font-semibold">
                            {{ $totalMerk }}
                        </p>
                        <p class=" text-xs font-light">
                            Total Merk
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class=" gap-9 flex flex-row w-full px-5">

            <div class="flex flex-col bg-[#1c1d42fc] w-full rounded overflow-hidden shadow-lg border border-[#33356F]">
                <div class=" flex flex-row min-w-72 min-h-60 gap-5 items-center p-4">
                    <div id="container" class=" w-full font-bold bg-[#1C1D42] text-xl text-center p-1">
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const dailyTransactionCounts = @json($dailyTransactionData);
                                const daysInMonth = Object.keys(dailyTransactionCounts);
                                const transactionCounts = Object.values(dailyTransactionCounts);
                                const maxTransactionCount = Math.max(...transactionCounts);

                                console.log("dailyTransactionCounts = " + dailyTransactionCounts);
                                console.log("daysInMonth = " + daysInMonth);
                                console.log("transactionCounts = " + transactionCounts);
                                console.log("maxTransactionCount = " + maxTransactionCount);

                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'line',
                                        backgroundColor: '#1C1D42',
                                        color: 'white',
                                        lineColor: 'white'
                                    },
                                    title: {
                                        text: 'Grafik Transaksi Pada Bulan {{ Carbon\Carbon::now()->locale('id')->translatedFormat('F Y') }}',
                                        style: {
                                            color: '#FFFFFF' // Change font color to blue
                                        }
                                    },
                                    xAxis: {
                                        categories: daysInMonth,
                                        labels: {
                                            style: {
                                                color: 'white'
                                            }
                                        },
                                        title: {
                                            text: 'Tanggal ke-',
                                            style: {
                                                color: 'white' // Change font color to blue
                                            }
                                        }
                                    },
                                    yAxis: {
                                        min: 0,
                                        max: maxTransactionCount + 10,
                                        labels: {
                                            style: {
                                                color: 'white'
                                            }
                                        },
                                        title: {
                                            text: 'Jumlah Transaksi',
                                            style: {
                                                color: 'white' // Change font color to blue
                                            }
                                        }
                                    },
                                    legend: {
                                        title: {
                                            style: {
                                                color: 'white'
                                            }
                                        },
                                        itemStyle: {
                                            color: 'white'
                                        }
                                    },
                                    series: [{
                                        name: 'Transaksi',
                                        data: transactionCounts,
                                        color: 'orange'
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>

            <div class=" w-full max-w-xl rounded overflow-hidden shadow-lg bg-[#1C1D42] border border-[#33356F] ">

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

                @foreach ($topProducts as $product)
                    <div class="flex px-2 py-2 items-center justify-between ">
                        <div class="w-5/12 flex items-center">
                            <img class="w-6 sm:w-10 mr-2 self-center" alt="away-logo"
                                src="{{ asset('/storage/image_product/' . $product->img) }}">
                            <div class="flex flex-col">
                                <p class="text-sm font-bold"> {{ $product->product_name }} </p>
                                <p class="hidden sm:block font-medium text-[#4E6196]"> {{ $product->merk_name }} </p>
                            </div>
                        </div>
                        <p class="w-1/6 text-lg sm:text-xl font-bold text-right pr-6"> {{ $product->total_quantity_sold }}
                        </p>
                    </div>
                @endforeach
            </div>

        </div>
    @endsection
