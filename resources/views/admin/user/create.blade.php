@extends('layout.admin_main')
@section('title', 'Manage User')
@section('content')
<div class="w-full p-8">
    <div class="mb-6">
        <div class="flex flex-col">
            <p class="text-[#6b6eb4] text-lg font-semibold">
                Add User
            </p>
        </div>
    </div>
    <div class="bg-[#1C1D42] rounded-md border border-[#33356F] min-h-[500px]">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new user</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-white">Name</label>
                        <input type="text" name="nama" id="nama" class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type user's name" required>
                    </div>
                    <div class="w-full">
                        <label for="username" class="block mb-2 text-sm font-medium text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type username" required>
                    </div>
                    <div class="w-full">
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Type password" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="role" class="block mb-2 text-sm font-medium text-white">Role</label>
                        <select id="role" name="role" class="bg-[#131432] border w-full p-2.5 text-sm rounded-lg border-gray-600 focus:ring-primary-500 focus:border-primary-500">
                            <option selected class="">Select role</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Add user
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
