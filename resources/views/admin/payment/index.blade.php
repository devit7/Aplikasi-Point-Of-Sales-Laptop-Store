@extends('layout.admin_main')
@section('title', 'Payment List')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Manage Payment
                </p>
                <p class="text-[#6b6eb4]">
                    List Semua Payment Method yang Terdaftar
                </p>
            </div>
            <div class="flex flex-row">
                <a href = /admin/payment/create
                class="flex flex-row items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#e68a2f]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <span>Tambah Payment</span>
                </a>
            </div>
        </div>
        <div class="mt-10">
            <div class="w-full mx-auto bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                <table class="w-full mt-2" id="table">
                    <thead class="bg-[#131432] text-[#6b6eb4]">
                    <tr class="border-b-2 border-[#33356F]">
                        <th class="py-2 text-left px-4">No</th>
                        <th class="text-left px-4">Payment Name</th>
                        <th class="text-left px-4">Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4] text-left">
                    @foreach ($data as $index => $payment)
                        <tr class="border-b border-[#33356F]">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="px-4">{{ $payment['payment_name'] }}</td>
                            <td class="px-4 flex items-center gap-2">
                                <a href="{{ route('payment.edit', $payment['id']) }}"
                                class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                    </svg>
                                </a>
                                <button onclick="confirmDelete('{{ $payment['id'] }}', '{{ $payment['payment_name'] }}')"
                                        class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                    </svg>
                                </button>
                                <form id="form-delete-payment-{{ $payment['id'] }}" method="POST"
                                    action="{{ route('payment.destroy', $payment['id']) }}" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-[#131432] rounded-lg p-6">
                <div class="mb-4 text-center">
                    <h1 class="text-white font-semibold">Apakah anda ingin menghapus opsi Payment ini?</h1>
                </div>
                <div class="flex justify-center">
                    <button onclick="deletePayment()" class="px-4 py-2 mr-2 bg-red-600 text-white rounded-md">Iya</button>
                    <button onclick="closeModal()" class="px-4 py-2 bg-gray-400 text-white rounded-md">Tidak</button>
                </div>
            </div>
        </div>
    </div>
    
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = '{{ session('success') }}';
            alert(successMessage);
        });
    </script>
    @endif

    <script>
        let paymentIdToDelete = null;

        function confirmDelete(id, name) {
            paymentIdToDelete = id;
            document.getElementById('confirmation-modal').classList.remove('hidden');
        }

        function deletePayment() {
            if (paymentIdToDelete) {
                // Proceed with deletion
                document.getElementById('form-delete-payment-' + paymentIdToDelete).submit();
            }
        }

        function closeModal() {
            paymentIdToDelete = null;
            document.getElementById('confirmation-modal').classList.add('hidden');
        }
    </script>
@endsection
