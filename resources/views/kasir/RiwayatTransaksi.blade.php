@extends('layout.kasir_main')
@section('content')
<div class=" p-6">
	<div class="max-w-7xl mx-auto">
		<div class="inline-block min-w-full py-2 align-middle">
			<div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
				<table class="min-w-full divide-y divide-white">
					<thead class="bg-[#1C1D42]">
						<tr>
							<th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-[#B3B7EE]">Name</th>
							<th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-[#B3B7EE]">Role</th>
							<th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-[#B3B7EE]">Created at</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-white bg-[#1C1D42]">
						<tr class="divide-white">
							<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">Norma Nova</td>
							<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">Role Value</td>
							<td class="whitespace-nowrap px-3 py-4 text-sm text-center">Created at Value</td>
						</tr>
						<tr class="divide-white">
							<td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 sm:pl-6">Norma Nova</td>
							<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">Role Value</td>
							<td class="whitespace-nowrap px-3 py-4 text-sm text-center">Created at Value</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
