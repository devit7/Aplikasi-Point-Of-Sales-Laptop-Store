@extends('layout.admin_main')
@section('title', 'Customer List')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Testing Modal Transaksi
                </p>
                <p class="text-[#6b6eb4] ">
                    A List of All of the Customers
                </p>
            </div>
            <div class=" flex flex-row ">
                <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                    class="flex flex-row  items-center gap-2  px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>Create Transaction</span>
                </a>
            </div>
            <!-- Main modal -->
            <div id="default-modal" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="rounded-lg shadow relative bg-gray-800">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-5  rounded-t ">
                            <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                                Confirm
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="default-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6 border-y border-gray-600">
                            <p class="text-gray-500 text-base leading-relaxed dark:text-gray-400">
                                With less than a month to go before the European Union enacts new consumer privacy laws for
                                its citizens, companies around the world are updating their terms of service agreements to
                                comply.
                            </p>
                            <p class="text-gray-500 text-base leading-relaxed dark:text-gray-400">
                                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May
                                25 and is meant to ensure a common set of data rights in the European Union. It requires
                                organizations to notify users as soon as possible of high-risk data breaches that could
                                personally affect them.
                            </p>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex justify-center items-center space-x-4 p-5 rounded-b">
                            <button data-modal-toggle="default-modal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                            <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Yes, I'm sure
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10">
            
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
@endpush
