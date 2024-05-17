@extends('layout.form_layout')
@section('title', 'Manage User')
@section('content')
<section class="bg-[#1C1D42] text-white w-full h-full p-8">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
        <main class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:px-16 lg:py-12 xl:col-span-6">
                <form action="#" class="mt-8 grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="FirstName" class="block text-sm font-medium">
                            Name
                        </label>
                        <input type="text" id="FirstName" name="first_name" class="mt-1 w-full rounded-md border-gray-200 bg-white text-black text-sm shadow-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="LastName" class="block text-sm font-medium">
                            Username
                        </label>
                        <input type="text" id="LastName" name="last_name" class="mt-1 w-full rounded-md border-gray-200 bg-white text-black text-sm shadow-sm" />
                    </div>

                    <div class="col-span-6">
                        <label for="Role" class="block text-sm font-medium">
                            Role
                        </label>
                        <select id="Role" name="role" class="mt-1 w-full rounded-md border-gray-200 bg-white text-black text-sm shadow-sm">
                            <option value="kasir">Kasir</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="Password" class="block text-sm font-medium">
                            Password
                        </label>
                        <input type="password" id="Password" name="password" class="mt-1 w-full rounded-md border-gray-200 bg-white text-black text-sm shadow-sm" />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="PasswordConfirmation" class="block text-sm font-medium">
                            Password Confirmation
                        </label>
                        <input type="password" id="PasswordConfirmation" name="password_confirmation" class="mt-1 w-full rounded-md border-gray-200 bg-white text-black text-sm shadow-sm" />
                    </div>

                    <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                        <button class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
                            Create an account
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection
