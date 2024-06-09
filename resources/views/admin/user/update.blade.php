@section('title', 'Create Product')
@extends('layout.admin_main')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Update User
                </p>
                <p class="text-[#6b6eb4] ">
                    Manage Your Update
                </p>
            </div>
        </div>
        <div class="mt-10 flex justify-between w-full mx-auto     rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Update User</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                    <form action="{{ route('user.update', $data['id']) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="nama" class="block mb-2 text-sm font-medium  text-gray-400">Name</label>
                                <input value="{{ $data['nama'] }}" name="nama" id="nama"
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                @error('nama')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nama_toko"
                                    class="block mb-2 text-sm font-medium  text-gray-400">Username</label>
                                <input value="{{ $data['username'] }}" name="username" id="username"
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                @error('username')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                                <select id="role" name="role"
                                    class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                    <option value="" disabled>Select role</option>
                                    <option value="admin" {{ $data['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kasir" {{ $data['role'] == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                </select>
                                @error('role')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <a href="{{ route('user.index') }}"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-red-800">
                                Back
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-800">
                                Update
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
