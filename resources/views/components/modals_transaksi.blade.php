{{-- <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" --}}
<a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
    class=" w-full text-center rounded-md px-4 py-2 bg-green-700 text-white hover:bg-green-800 cursor-pointer">
    Place Order
</a>
<!-- Main modal -->
<div id="default-modal" aria-hidden="true"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <div class="rounded-md shadow relative bg-[#1C1D42]">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-5  rounded-t ">
                <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                    Transaction Detail
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="default-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col w-full p-6 gap-4  border-y border-[#33356F] font-semibold">
                <p class="text-gray-400 text-sm">
                    CUSTOMER
                </p>
                <div class="flex flex-col w-full gap-4 px-4">
                    <div class="flex flex-row w-full items-center ">
                        <div class="w-40 text-blue-200 ">
                            Customer
                        </div>
                        <div class="w-full ">
                            <select name="payment_method" id="payment_method"
                                class="w-full text-right px-4 py-2 text-gray-400 bg-[#131432] border border-gray-600 rounded">
                                <option disabled selected>Choose Customer</option>
                                <option value="jetsuki">Jetsuki</option>
                                <option value="ayudesu">Ayudesu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">
                    PAYMENT
                </p>
                <div class="flex flex-col w-full gap-4 px-4">
                    <div class="flex flex-row w-full items-center ">
                        <div class="w-40 text-blue-200  ">
                            Total Belanja
                        </div>
                        <div class="w-full ">
                            <input type="text" name="total" id="total"
                                class="w-full text-right px-4 py-2  text-gray-600 bg-[#131432] border border-gray-600 rounded "
                                value="Rp. 100.00.000,00" disabled>
                        </div>
                    </div>
                    <div class="flex flex-row w-full items-center ">
                        <div class="w-40 text-blue-200 ">
                            Metode Pembayaran
                        </div>
                        <div class="w-full ">
                            <button
                                class="text-right px-4 py-2 text-gray-400 bg-[#131432] border border-gray-600 rounded hover:bg-green-700 hover:text-white">
                                OVO
                            </button>
                            <button
                                class="text-right px-4 py-2 text-gray-400 bg-[#131432] border border-gray-600 rounded hover:bg-green-700 hover:text-white">
                                DANA
                            </button>
                            <button
                                class="text-right px-4 py-2 text-gray-400 bg-[#131432] border border-gray-600 rounded hover:bg-green-700 hover:text-white">
                                GOPAY
                            </button>
                            <button
                                class="text-right px-4 py-2 text-gray-400 bg-[#131432] border border-gray-600 rounded hover:bg-green-700 hover:text-white">
                                CASH
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex justify-between items-center space-x-4 p-5 rounded-b">
                <button data-modal-toggle="default-modal" type="button"
                    class="py-2 w-36 text-sm rounded-md font-medium text-center text-white focus:z-10 border  focus:ring-4 focus:outline-none border-red-400 focus:ring-red-300 bg-red-600 hover:bg-red-500 ">
                    No, Cancel
                </button>
                <button type="submit"
                    class="py-2 w-36 text-sm font-medium  rounded-md border  focus:ring-4 focus:outline-none focus:z-10 bg-green-700 text-green-200 border-green-500 hover:text-white hover:bg-green-600 focus:ring-green-600">
                    Accept Transaction
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
@endpush
