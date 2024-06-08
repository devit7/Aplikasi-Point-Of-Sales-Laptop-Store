@extends('layout.admin_main')
@section('title', 'Update Payment')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Update Payment
                </p>
                <p class="text-[#6b6eb4]">
                    Update Payment Method
                </p>
            </div>
        </div>
        <div class="mt-10 flex justify-between w-full mx-auto rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Payment Settings</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                    <form action="{{ route('payment.update', $payment['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="payment_name" class="block mb-2 text-sm font-medium text-gray-400">Payment
                                    Name</label>
                                <input type="text" name="payment_name" id="payment_name"
                                    class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex: BCA" value="{{ $payment['payment_name'] }}">
                                @if ($errors->has('payment_name'))
                                    <p class="text-red-500 text-xs mt-2">{{ $errors->first('payment_name') }}</p>
                                @endif
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between w-full gap-4 sm:gap-6">
                                <a href="{{ route('payment.index') }}"
                                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-600 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-700">
                                        Back
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        Update Payment
                                    </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection