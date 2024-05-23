@extends('layout.kasir_main')
@section('title', 'Add customer')
@section('content')
<div class="w-full p-8 ">
    <div class="mb-6">
        <div class="flex flex-col ">
            <p class="text-[#6b6eb4] text-lg font-semibold">
                Add Customer
            </p>
            <div class="text-[#6b6eb4] flex flex-row ">
                Create your customer
            </div>
        </div>
    </div>
    <div class="bg-[#1C1D42] rounded-md  border border-[#33356F] min-h-[500px]">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new customer</h2>
            <form action="{{ route('management-customer.store') }}" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="customer_name" class="block mb-2 text-sm font-medium  text-white">Name Customer</label>
                        <input type="text" name="customer_name" id="customer_name" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Enter customer name" required="">
                    </div>
                    <div class="w-full">
                        <label for="email" class="block mb-2 text-sm font-medium  text-white">Email</label>
                        <input type="text" name="email" id="email" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Enter your email" required="">
                    </div>
                    <div class="w-full">
                        <label for="no_hp" class="block mb-2 text-sm font-medium  text-white">Phone number</label>
                        <input type="number" name="no_hp" id="no_hp" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Enter your number" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <textarea id="alamat" name="alamat" rows="8" class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 bg-[#131432] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter your address"></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add product
                </button>
                <a href="{{ route('management-customer.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to Customer List</a>
            </form>
        </div>
    </div>
</div>
@endsection