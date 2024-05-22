@extends('layout.admin_main')
@section('title', 'Create Payment')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Add New Payment
                </p>
                <p class="text-[#6b6eb4]">
                    Create a new payment method
                </p>
            </div>
        </div>
        <div class="mt-10">
            <div class="w-[600px] mx-auto bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                @if ($errors->any())
                    <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="payment_name" class="block mb-2 text-sm font-medium text-gray-400">Payment Name</label>
                            <input type="text" name="payment_name" id="payment_name"
                                class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 text-[#6b6eb4] placeholder-gray-400 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-between">
                        <button type="submit" class="bg-[#FF9A37] text-white px-4 py-2 rounded-md hover:bg-[#e68a2f]">Add Payment</button>
                        <a href="{{ route('payment.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Back to Payment List</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
