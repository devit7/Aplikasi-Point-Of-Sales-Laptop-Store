@extends('layout.admin_main')
@section('title', 'User List')
@section('content')
<div class=" p-7 ">
    <div class="mb-6 flex items-end justify-between">
        <div class="flex flex-col ">
            <p class="text-[#6b6eb4] text-lg font-semibold">
                Manage User
            </p>
            <p class="text-[#6b6eb4] ">
                All User
            </p>
        </div>
        <div class=" flex flex-row ">
            <a href="/admin/user/create" class="flex flex-row  items-center gap-2  px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Create New Account</span>
            </a>
        </div>
    </div>
    <div class="mt-10">
        <x-tables>
            <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4]  p-4 rounded-md">
                <table class="w-full mt-2  " id="table">
                    <thead class="bg-[#131432]  text-[#6b6eb4]">
                        <tr class="border-b-2 border-[#33356F]">
                            <th class="py-2 text-[#6b6eb4]">No</th>
                            <th class="text-[#6b6eb4]">Name</th>
                            <th class="text-[#6b6eb4]">Username</th>
                            <th class="text-[#6b6eb4]">Role</th>
                            <th class="text-[#6b6eb4]">Created At</th>
                            <th class="text-[#6b6eb4]">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4]">
                        @forelse ($data as $item)
                        <tr class="border-b-2 border-[#33356F] text-left">
                            <td class="py-2">{{ $loop->index + 1 }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>
                                <p class=" text-center  border rounded-full {{ $item['role'] == 'admin' ? ' border-green-400 bg-green-900 text-green-400' : ' border-blue-400 bg-blue-900 text-blue-300' }}">
                                    {{ $item['role'] }}
                                </p>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('Y-m-d H:i') }}</td>
                            <td class="flex flex-row gap-2">
                                <a href="{{ route('user.detail', [ 'user' => $item['id'] ]) }}" type="button" class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>
                                <a href="{{route('user.edit', ['user'=>$item['id'] ])}}"type ="button" class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <x-alert id="{{ $item['id'] }}" nama="{{ $item['nama'] }}" route="user.delete" />
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="  text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-tables>
    </div>
</div>
@endsection