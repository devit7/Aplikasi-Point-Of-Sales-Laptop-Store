@extends('layout.kasir_main')
@section('title', 'Check Out')
@section('content')
    <div class="w-full p-8">
        <div class="flex justify-between items-center mb-6">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">Check Out</p>
                <p class="text-[#6b6eb4]">Review and confirm your order</p>
            </div>
            <div class="flex flex-col items-end">
                <label for="username" class="text-[#6b6eb4] mb-2">Nama User:</label>
                <input type="text" id="username" name="username" class="p-1 rounded-md bg-[#1C1D42] border border-[#33356F] text-white w-48" placeholder="Enter your name">
            </div>
        </div>
        <div class="bg-[#1C1D42] rounded-md border border-[#33356F] min-h-[300px]">
            <div class="p-4">
                <table class="w-full mt-2" id="orderTable">
                    <thead class="bg-[#131432] text-[#6b6eb4]">
                        <tr class="border-b-2 border-[#33356F]">
                            <th class="py-2 text-[#6b6eb4]">No</th>
                            <th class="text-[#6b6eb4]">Name</th>
                            <th class="text-[#6b6eb4]">Jumlah</th>
                            <th class="text-[#6b6eb4]">Harga</th>
                            <th class="text-[#6b6eb4]">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#6b6eb4] text-center">
                        <tr class="border-b-2 border-[#33356F]">
                            <td class="py-2">1</td>
                            <td>Asus Kupu Kupu</td>
                            <td>2</td>
                            <td>17.000.000,00</td>
                            <td>34.000.000,00</td>
                        </tr>
                        <tr class="border-b-2 border-[#33356F]">
                            <td class="py-2">2</td>
                            <td>Lenopnop</td>
                            <td>3</td>
                            <td>14.000.000,00</td>
                            <td>42.000.000,00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="p-4 flex justify-end">
                <button id="checkoutButton" class="bg-[#aa5800] text-white px-4 py-2 rounded-md">Check Out</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmationModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-4 rounded-md shadow-md w-96">
            <p class="text-lg font-semibold mb-4">Apakah Anda yakin untuk membayarnya?</p>
            <div id="orderSummary" class="mb-4"></div>
            <p id="buyerName" class="font-semibold mb-4"></p>
            <div class="flex justify-end">
                <button id="confirmButton" class="bg-[#aa5800] text-white px-4 py-2 rounded-md mr-2">Ya</button>
                <button id="cancelButton" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('checkoutButton').addEventListener('click', function() {
            const username = document.getElementById('username').value;
            const orderTable = document.getElementById('orderTable').getElementsByTagName('tbody')[0];
            let orderSummaryHtml = '<table class="w-full mt-2"><thead class="bg-[#131432] text-[#6b6eb4]"><tr class="border-b-2 border-[#33356F]"><th class="py-2 text-[#6b6eb4]">No</th><th class="text-[#6b6eb4]">Name</th><th class="text-[#6b6eb4]">Jumlah</th><th class="text-[#6b6eb4]">Harga</th><th class="text-[#6b6eb4]">Total</th></tr></thead><tbody class="text-[#6b6eb4] text-center">';
            let totalAmount = 0;

            for (let i = 0, row; row = orderTable.rows[i]; i++) {
                const cells = row.cells;
                const total = parseFloat(cells[4].innerText.replace(/\./g, '').replace(',', '.'));
                totalAmount += total;
                orderSummaryHtml += `<tr class="border-b-2 border-[#33356F]"><td class="py-2">${cells[0].innerText}</td><td>${cells[1].innerText}</td><td>${cells[2].innerText}</td><td>${cells[3].innerText}</td><td>${cells[4].innerText}</td></tr>`;
            }

            orderSummaryHtml += `<tr class="border-t-2 border-[#33356F]"><td colspan="4" class="py-2 font-semibold text-right">Total:</td><td class="py-2 font-semibold">${totalAmount.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}</td></tr></tbody></table>`;

            document.getElementById('orderSummary').innerHTML = orderSummaryHtml;
            document.getElementById('buyerName').innerText = `Nama Pembeli: ${username}`;
            document.getElementById('confirmationModal').classList.remove('hidden');
        });

        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('confirmationModal').classList.add('hidden');
        });

        document.getElementById('confirmButton').addEventListener('click', function() {
            // Add your form submission or payment processing logic here
            alert('Payment confirmed!');
            document.getElementById('confirmationModal').classList.add('hidden');
        });
    </script>
@endsection
