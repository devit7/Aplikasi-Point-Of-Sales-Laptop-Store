@extends('layout.admin_main')
@section('title', 'Management Customer')
@section('content')
    <div class="p-7">
        <div class="mb-6">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    List Customer
                </p>
                <p class="text-[#6b6eb4]">
                    A List of All of the Customers
                </p>
            </div>
        </div>
        <div class="mt-10">
            <x-tables>
                <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                    <table class="w-full mt-2" id="table">
                        <thead class="bg-[#131432] text-[#6b6eb4]">
                            <tr class="border-b-2 border-[#33356F]">
                                <th class="py-2 text-[#6b6eb4]">No</th>
                                <th class="text-[#6b6eb4]">Name</th>
                                <th class="text-[#6b6eb4]">Email</th>
                                <th class="text-[#6b6eb4]">Phone</th>
                                <th class="text-[#6b6eb4]">Address</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#6b6eb4]">
                            @forelse ($data as $item)
                                <tr class="border-b-2 border-[#33356F] text-left">
                                    <td class="py-2">{{ $loop->index + 1 }}</td>
                                    <td>{{ $item['customer_name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['no_hp'] }}</td>
                                    <td>{{ $item['alamat'] }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </x-tables>
        </div>
    </div>
@endsection
