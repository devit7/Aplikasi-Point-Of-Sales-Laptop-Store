@extends('layout.admin_main')
@section('title', 'Admin Report')
@section('content')
    <div class="p-7">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Admin Report
                </p>
                <p class="text-[#6b6eb4]">
                    A List of All of the Customers Report
                </p>
            </div>
            <div class="flex flex-row gap-2">
                <a href="#" onclick="exportToExcel()"
                    class="flex items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                    Export to Excel
                </a>
                <a href="#" onclick="exportToPDF()"
                    class="flex items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">Export
                    To PDF</a>
            </div>
        </div>
        <div class="mt-10">
            <x-tables>
                <div class="w-full mx-auto mt-2 bg-[#1C1D42] text-[#6b6eb4] p-4 rounded-md">
                    <table class="deTable w-full mt-2" id="table">
                        <thead class="bg-[#131432] text-[#6b6eb4]">
                            <tr class="border-b-2 border-[#33356F]">
                                <th class="py-2 text-[#6b6eb4]">No</th>
                                <th class="text-left">Nama Customer</th>
                                <th class="text-left">Invoice</th>
                                <th class="text-left">Kasir</th>
                                <th class="text-left">Order Date</th>
                                <th class="text-left">Payment Metode</th>
                                <th class="text-right">Total Harga</th>
                                <th class="text-left">Created At</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#6b6eb4] text-center">
                            @php $i=1 @endphp

                            @foreach ($data as $item)
                                <tr class="border-b-2 border-[#33356F]">
                                    <td class="py-2">{{ $i++ }}</td>
                                    <td class="text-left">{{ $item['customer']['customer_name'] }}</td>
                                    <td class="text-left">{{ $item['invoice'] }}</td>
                                    <td class="text-left">{{ $item['user']['nama'] }}</td>
                                    <td class="text-left">{{ $item['order_date'] }}</td>
                                    <td class="text-left">{{ $item['payment']['payment_name'] }}</td>
                                    <td class="text-right">{{ $item['total_semua'] }}</td>
                                    <td class="text-left">
                                        {{ \Carbon\Carbon::parse($item['created_at'])->format('Y-m-d H:i') }}
                                    </td>
                                    <td>
                                        <x-modal_detail id="{{ $item['id'] }}">
                                            <div class="flex flex-col w-fit rounded-md p-5 bg-[#1C1D42]">
                                                <span class=" w-96 text-xl mb-8 text-indigo-100 font-bold">Detail
                                                    Transaksi</span>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Customer</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['customer']['customer_name'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Invoice</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['invoice'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Kasir</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['user']['nama'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Date</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['order_date'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Payment</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['payment']['payment_name'] }}</span>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <span class=" text-indigo-200 p-1 font-semibold">Total</span>
                                                    <hr class="flex-grow border-gray-200">
                                                    <span>{{ $item['total_semua'] }}</span>
                                                </div>
                                                <div class="w-6/12 flex items-center mb-[-6rem]">
                                                    <a href="#" onclick="exportToPDF()"
                                                        class="flex items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">Export
                                                        To PDF</a>
                                                </div>
                                            </div>
                                        </x-modal_detail>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-tables>
        </div>
    </div>

    <!-- Modal for details -->
    <div id="detailsModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-6 w-1/2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Invoice Details</h2>
                    <button onclick="closeModal()" class="text-red-500">&times;</button>
                </div>
                <div id="modalContent">
                    <!-- Details be pop -->
                </div>
                <div class="flex justify-end mt-4">
                    <button onclick="exportToPDF('modalContent')"
                        class="bg-[#FF9A37] text-white px-4 py-2 rounded-md">Export to PDF</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.21/jspdf.plugin.autotable.min.js"></script>
    @endpush

    <script>
        function getCurrentDateTime() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${year}-${month}-${day}_${hours}-${minutes}`;
        }

        function exportToExcel() {
            const table = document.getElementById("table");
            const rows = table.querySelectorAll("tr");

            let kotak = '';
            kotak += '\n\t<ss:Borders>';
            kotak += '\n\t<ss:Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>';
            kotak += '\n\t<ss:Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>';
            kotak += '\n\t<ss:Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>';
            kotak += '\n\t<ss:Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>';
            kotak += '\n\t</ss:Borders>';

            let xml = '<?xml version="1.0"?>\n<ss:Workbook xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">';
            xml += '\n<ss:Styles>';
            xml += '\n<ss:Style ss:ID="boldKotak">';
            xml += '\n\t<ss:Font ss:Bold="1" ss:Color="#FFFFFF"/>';
            xml += '\n\t<ss:Interior ss:Color="#0E2841" ss:Pattern="Solid"/>';
            xml += kotak;
            xml += '\n</ss:Style>';
            xml += '\n\t<ss:Style ss:ID="Kotak">';
            xml += kotak;
            xml += '\n\t</ss:Style>';
            xml += '\n\t<ss:Style ss:ID="KotakRupiah">';
            xml += '<ss:NumberFormat ss:Format="Rp #,##0"/>';
            xml += kotak;
            xml += '\n\t</ss:Style>';
            xml += '\n</ss:Styles>';

            xml += '\n<ss:Worksheet ss:Name="Laporan Admin">\n<ss:Table>\n';
            xml += '<ss:Column ss:AutoFitWidth="1"/>';

            for (let i = 0; i < rows.length; i++) {
                const kolom = rows[i].querySelectorAll("td, th");
                xml += "<ss:Row>\n";

                for (let j = 0; j < kolom.length - 1; j++) {
                    let masuk = kolom[j].innerText;
                    let tipe = 'String';
                    let style = ' ss:StyleID="Kotak"';
                    if (i != 0 && (j == 6 || j == 0)) {
                        masuk = parseInt(kolom[j].innerText.replace(/[^\d]/g, ''), 10);
                        tipe = 'Number';
                        if (j == 6) {
                            style = ' ss:StyleID="KotakRupiah"';
                        }
                    }
                    if (i == 0) {
                        style = ' ss:StyleID="boldKotak"';
                    }
                    xml += '<ss:Cell' + style + '><ss:Data ss:Type="' + tipe + '">' + masuk + '</ss:Data></ss:Cell>\n';
                }

                xml += "</ss:Row>\n";
            }

            xml += "</ss:Table>\n</ss:Worksheet>\n</ss:Workbook>\n";

            const dateTime = getCurrentDateTime();
            downloadExcel(xml, `table_${dateTime}.xls`);
        }

        function downloadExcel(xml, filename) {
            let blob = new Blob([xml], {
                type: "application/vnd.ms-excel"
            });
            let link = document.createElement("a");

            link.href = window.URL.createObjectURL(blob);
            link.download = filename;
            link.click();
            window.URL.revokeObjectURL(link.href);
        }

        function viewToPDF() {

        }

        function exportToPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            const table = document.getElementById("table");
            const headers = [];
            table.querySelectorAll("th").forEach((header, index) => {
                if (index !== table.querySelectorAll("th").length - 1) {
                    headers.push(header.innerText);
                }
            });

            const rows = [];
            table.querySelectorAll("tbody tr").forEach(row => {
                const rowData = [];
                row.querySelectorAll("td").forEach((cell, index) => {
                    if (index !== row.querySelectorAll("td").length - 1) {
                        rowData.push(cell.innerText);
                    }
                });
                rows.push(rowData);
            });

            doc.autoTable({
                head: [headers],
                body: rows,
                headStyles: {
                    fillColor: '#131432',
                    textColor: '#ffffff',
                    lineColor: '#000000',
                    lineWidth: 0.1
                },
                styles: {
                    fillColor: [255, 255, 255],
                    textColor: '#000000',
                    lineColor: '#000000',
                    lineWidth: 0.1
                },
                tableLineColor: '#33356F',
                tableLineWidth: 0.1
            });

            const dateTime = getCurrentDateTime();
            doc.save(`report_${dateTime}.pdf`);
        }
    </script>

@endsection
