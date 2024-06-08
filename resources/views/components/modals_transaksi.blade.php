{{-- @dd($dataPayment) --}}
{{-- <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" --}}
@if (session()->has('cart'))
    <a href="#" data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
        class="  w-full text-center rounded-md px-4 py-2 bg-green-700 text-white hover:bg-green-800 cursor-pointer">
        Place Order
    </a>
@else
    <a href="#" type="button"
        class="  w-full text-center rounded-md px-4 py-2 bg-red-700 text-white hover:bg-red-800 cursor-pointer">
        Please Add Item to Cart
    </a>
@endif
<!-- Main modal -->
<div id="default-modal" aria-hidden="true"
    class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
        <!-- Modal content -->
        <form id="transaction-form" action="{{ route('kasir.transaction-process') }}" method="POST">
            @csrf
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
                    {{-- Dropdown Customer --}}
                    <div class="flex flex-row w-full items-center px-4 ">
                        <div class="w-40 text-blue-200  ">
                            Customer
                        </div>
                        <div class="sm:col-span-2 dropdown-div relative w-full">
                            <button type="button" id="dropdown-button-customer"
                                class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                <span class="">Choose customer</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="dropdown-menu-customer"
                                class=" hidden absolute z-10 w-full dropdown-menu py-2 shadow-lg col bg-[#131432] ring-black ring-opacity-5 p-1 space-y-1">
                                {{-- Search input Buat Dropdown --}}
                                <input
                                    class="search-input w-full px-2 bg-[#131432] text-gray-400 border rounded  border-gray-300 focus:outline-none"
                                    type="text" placeholder="Search customer" autocomplete="off">
                                {{-- list dropdown --}}
                                @forelse ($dataCustomer as $customer)
                                    <a href="#"
                                        class="dropdown-item justify-start pl-3 flex col-2 text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                        data-value="{{ $customer['id'] }}">
                                        <p class="w-full row">{{ $customer['customer_name'] }}</p>
                                        <p class="w-full row">{{ $customer['email'] }}</p>
                                    </a>
                                @empty
                                    <p class="text-center text-white">No customer</p>
                                @endforelse

                            </div>
                            <input type="hidden" name="customer_id" id="customer-input" value="">
                            <span id="customer-error" class="text-red-500 text-sm"></span>
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
                                    class="w-full text-right px-4 py-2  text-green-600 bg-[#131432] border border-gray-600 rounded disabled:opacity-50"
                                    value="@currency($totalAll)">
                                    <span id="total-error" class="text-red-500 text-sm"></span>
                            </div>
                        </div>
                        <div class="flex flex-row w-full items-center ">
                            <div class="w-40 text-blue-200 ">
                                Metode Pembayaran
                            </div>
                            <div class="dropdown-div sm:col-span-2 relative w-full">
                                <button type="button" id="dropdown-button-payment"
                                    class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                    <span class="w-full text-left">Choose Payment</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu-payment"
                                    class="hidden dropdown-menu absolute z-10 right-0 top-full shadow-lg bg-[#131432] ring-black ring-opacity-5 p-1 space-y-1 flex-col w-full">
                                    {{-- list dropdown --}}
                                    @forelse ($dataPayment as $payment)
                                        <a href="#"
                                            class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                            data-value="{{ $payment['id'] }}">{{ $payment['payment_name'] }}</a>
                                    @empty
                                        <p class="text-center text-white">No Payment Method Available</p>
                                    @endforelse
                                </div>
                                <input type="hidden" name="payment_id" id="payment-input" value="">
                                <span id="payment-error" class="text-red-500 text-sm"></span>
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
                        class="py-2 w-36 text-sm font-medium   rounded-md border  focus:ring-4 focus:outline-none focus:z-10 bg-green-700 text-green-200 border-green-500 hover:text-white hover:bg-green-600 focus:ring-green-600">
                        Accept Transaction
                    </button>
                </div>
        </form>
    </div>
</div>
</div>

@push('scripts')
    <script src="{{ asset('js/flowbite.min.js') }}"></script>
    {{-- JavaScript untuk dropdown dengan fungsi search OJO DIHAPUS!!! --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to toggle the dropdown state
            function toggleDropdown(dropdownMenu) {
                // alert("toggle dropdown jalan" + dropdownMenu);
                const isOpen = !dropdownMenu.classList.contains('hidden');
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) menu.classList.add('hidden');
                });
                dropdownMenu.classList.toggle('hidden', isOpen);
            }

            // Attach event listeners to each dropdown button
            document.querySelectorAll('.dropdown-button').forEach(button => {
                const dropdownMenu = button.nextElementSibling;
                button.addEventListener('click', () => {
                    toggleDropdown(dropdownMenu);
                });
            });

            // Add event listener to filter items based on input
            document.querySelectorAll('.search-input').forEach(input => {
                input.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    const items = e.target.closest('.dropdown-menu').querySelectorAll('a');

                    items.forEach((item) => {
                        const text = item.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            item.style.display = 'flex';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.dropdown-div')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.add('hidden');
                    });
                }
            });

            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedValue = this.getAttribute('data-value');
                    const hiddenInput = this.closest('.dropdown-div').querySelector(
                        'input[type="hidden"]');
                    const dropdownLabel = this.closest('.dropdown-div').querySelector(
                        'button span');
                    hiddenInput.value = selectedValue;
                    dropdownLabel.textContent = this.textContent;
                    const dropdownMenu = this.closest('.dropdown-menu');
                    toggleDropdown(dropdownMenu);
                });
            });
        });



    </script>

<script>
    document.getElementById('transaction-form').addEventListener('submit', function(event) {
        let isValid = true;

        // Clear previous error messages
        document.getElementById('customer-error').textContent = '';
        document.getElementById('payment-error').textContent = '';
        document.getElementById('total-error').textContent = '';

        let customerInput = document.getElementById('customer-input').value;
        let paymentInput = document.getElementById('payment-input').value;
        let totalInput = document.getElementById('total').value.trim();

        if (!customerInput) {
            document.getElementById('customer-error').textContent = 'Please select a customer.';
            isValid = false;
        }

        if (!paymentInput) {
            document.getElementById('payment-error').textContent = 'Please select a payment method.';
            isValid = false;
        }

        if (!totalInput) {
            document.getElementById('total-error').textContent = 'Total Belanja cannot be empty.';
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
    </script>
@endpush
