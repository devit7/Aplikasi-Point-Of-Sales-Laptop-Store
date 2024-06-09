@extends('layout.admin_main')
@section('title', 'Testing')
@section('content')
    <div class="w-full p-8 ">
        <div class="mb-6">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Add User
                </p>
                <div class="text-[#6b6eb4] flex flex-row ">
                    Manage your User
                </div>
            </div>
        </div>
        <div class="bg-[#1C1D42] rounded-md  border border-[#33356F] h-fit w-[600px]">
            <div class="py-8 px-4 mx-auto max-w-xl ">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-gray-400">Add a new User</h2>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Name</label>
                            <input type="text" name="nama" id="nama"
                                class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nama">
                            @error('nama')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Username</label>
                            <input type="text" name="username" id="username"
                                class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Username">
                            @error('username')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Password</label>
                            <input type="text" name="password" id="password"
                                class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Password">
                            @error('password')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                            <select id="role" name="role"
                                class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                <option selected class="">Select role</option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
                            @error('role')
                                <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <a href="{{ route('user.index') }}"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-red-800">
                                Back
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-green-800">
                                Add User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection













{{-- @section('title', 'Create Product')
@extends('layout.admin_main')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Create User
                </p>
                <p class="text-[#6b6eb4] ">
                    New User
                </p>
            </div>
        </div>
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mt-10 flex justify-between w-full mx-auto     rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Create User</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                    <form action="">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium  text-gray-400">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : Wibu Jaya Bersama" >
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nama_toko" class="block mb-2 text-sm font-medium  text-gray-400">Username</label>
                                <input type="text" name="nama_toko" id="nama_toko"
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : Wibu" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Password</label>
                                <textarea id="password" rows="1"
                                    class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 bg-[#131432] dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="EX : 1232214"></textarea>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                                <select id="role" name="role" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                    <option selected class="">Select role</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Reset
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
