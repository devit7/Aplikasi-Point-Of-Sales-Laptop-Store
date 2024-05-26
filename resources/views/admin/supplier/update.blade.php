@extends('layout.admin_main')
@section('title', 'Testing')
@section('content')
    <div class="w-full p-8 ">
        <div class="mb-6">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Add Supplier
                </p>
                <div class="text-[#6b6eb4] flex flex-row ">
                    Manage your supplier
                </div>
            </div>
        </div>
        <div class="bg-[#1C1D42] rounded-md  border border-[#33356F] min-h-[500px] w-[600px]">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new supplier</h2>
                    <form action="{{ route('supplier.updateCoy', $data['supplier_name']) }}" method="POST">
                    @method('PUT')
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium  text-white">Supplier Name</label>
                                <input value="{{$data['supplier_name']}}" type="text" name="supplier_name" id="name" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type Supplier name" required="">
                            </div>
                            <div class="w-full">
                                <label for="brand" class="block mb-2 text-sm font-medium  text-white">No. Hp</label>
                                <input value="{{$data['no_hp']}}" type="text" name="no_hp" id="brand" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Supplier number" required="">
                            </div>
                            <div class="w-full">
                                <label for="price" class="block mb-2 text-sm font-medium  text-white">Nama Perusahaan</label>
                                <input value="{{$data['nama_perusahaan']}}" type="text" name="nama_perusahaan id="price" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Pt. Wibu Jaya Bersama" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea name="alamat"  id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 bg-[#131432] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Alamat supplier">{{$data['alamat']}}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Update supplier
                        </button>
                    </form>
                </div>
        </div>
    </div>
@endsection
