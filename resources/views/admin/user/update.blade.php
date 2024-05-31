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
                    <form action="#">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium  text-gray-400">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : Wibu Jaya Bersama" required="">
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
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Update supplier
                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection