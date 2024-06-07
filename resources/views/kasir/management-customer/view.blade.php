@extends('layout.kasir_main')
@section('title', 'View Customer')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    View Customer
                </p>
                <p class="text-[#6b6eb4]">
                    View your data customer
                </p>
            </div>
        </div>
        <div class="mt-10 flex justify-between w-full mx-auto rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">View Customer</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-400">Customer name</label>
                            <input type="text" name="customer_name" id="customer_name" value="{{ $customer['customer_name'] }}" 
                                class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Enter data customer" required disabled>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-400">Email</label>
                            <input type="text" name="email" id="email" value="{{ $customer['email'] }}"
                                class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Enter email customer" required disabled>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-400">Phone Number</label>
                            <input type="text" name="no_hp" id="no_hp" value="{{ $customer['no_hp'] }}"
                                class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Enter phone number customer" required disabled>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="alamat" class="block mb-2 text-sm font-medium text-gray-400">Address</label>
                            <input type="text" id="alamat" name="alamat" value="{{ $customer['alamat'] }}"
                                class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Enter a address customer" required disabled>
                        </div>
                    </div>
                    <div class="flex justify-between w-full gap-4 sm:gap-6">
                        <a href="{{ route('management-customer.index') }}" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection