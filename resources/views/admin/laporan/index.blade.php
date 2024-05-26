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
                <a href="#"
                    class="flex items-center gap-2 px-4 py-2 bg-[#FF9A37] text-white rounded-md hover:bg-[#FF9A37]">
                    Export to PDF
                </a>
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
                            @foreach ($customers as $c)
                                <tr class="border-b-2 border-[#33356F]">
                                    <td class="py-2">{{$i++}}</td>
                                    <td class="text-left">{{$c->nama}}</td>
                                    <td class="text-left">{{$c->invoice}}</td>
                                    <td class="text-left">{{$c->kasir}}</td>
                                    <td class="text-left">{{$c->order_date}}</td>
                                    <td class="text-left">{{$c->payment}}</td>
                                    <td class="text-right">{{$c->total}}</td>
                                    <td class="text-left">{{$c->create_at}}</td>
                                    <td class="text-left">
                                        <a href="">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="product/update">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="">
                                            <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </x-tables>
        </div>
    </div>

    <script>
        function exportToExcel() {
            const table = document.getElementById("table");
            const rows = table.querySelectorAll("tr");

            let kotak = '';
            kotak += '\n\t<ss:Borders>'
            kotak += '\n\t<ss:Border ss:Position="Top" ss:LineStyle="Continuous" ss:Weight="1"/>'
            kotak += '\n\t<ss:Border ss:Position="Bottom" ss:LineStyle="Continuous" ss:Weight="1"/>'
            kotak += '\n\t<ss:Border ss:Position="Left" ss:LineStyle="Continuous" ss:Weight="1"/>'
            kotak += '\n\t<ss:Border ss:Position="Right" ss:LineStyle="Continuous" ss:Weight="1"/>'
            kotak += '\n\t</ss:Borders>'


            let xml = '<?xml version="1.0"?>\n<ss:Workbook xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet">';
            xml += '\n<ss:Styles>'
            xml += '\n<ss:Style ss:ID="boldKotak">'
            xml += '\n\t<ss:Font ss:Bold="1" ss:Color="#FFFFFF"/>'
            xml += '\n\t<ss:Interior ss:Color="#0E2841" ss:Pattern="Solid"/>'

            xml += kotak;
            xml += '\n</ss:Style>'
            xml += '\n\t<ss:Style ss:ID="Kotak">'
            xml += kotak;
            xml += '\n\t</ss:Style>'
            xml += '\n\t<ss:Style ss:ID="KotakRupiah">'
            xml += '<ss:NumberFormat ss:Format="Rp #,##0"/>'
            xml += kotak;
            xml += '\n\t</ss:Style>'

            xml += '\n</ss:Styles>';
            // console.log(xml);
            xml += '\n<ss:Worksheet ss:Name="Laporan Admin">\n<ss:Table>\n';
            xml += '<ss:Column ss:AutoFitWidth="1"/>'
            for (let i = 0; i < rows.length; i++) {
                const kolom = rows[i].querySelectorAll("td, th");
                xml += "<ss:Row>\n";

                for (let j = 0; j < kolom.length - 1; j++) {
                    let masuk = kolom[j].innerText;
                    let tipe = 'String';
                    let style = ' ss:StyleID="Kotak"';
                    if (i != 0 && (j == 6 || j == 0)) {

                        // let style = ' ss:StyleID="Kotak"'
                        // console.log("i = "+i+" j "+j+" "+(i!=0 && (j == 6 || j==0)))

                        masuk = parseInt(kolom[j].innerText.replace(/[^\d]/g, ''), 10);
                        tipe = 'Number';
                        if (j == 6) {
                            style = ' ss:StyleID="KotakRupiah"'

                        }
                    }
                    if (i == 0) {
                        style = ' ss:StyleID="boldKotak"';
                    }
                    // console.log(masuk, "tipe : ",typeof(masuk))
                    xml += '<ss:Cell' + style + '><ss:Data ss:Type="' + tipe + '">' + masuk + '</ss:Data></ss:Cell>\n';
                }

                xml += "</ss:Row>\n";
            }

            xml += "</ss:Table>\n</ss:Worksheet>\n</ss:Workbook>\n";
            console.log(xml, "\n\n");


            // Download file Excel
            downloadExcel(xml, "table.xls");
        }

        function downloadExcel(xml, filename) {
            let blob = new Blob([xml], {
                type: "application/vnd.ms-excel"
            });
            let link = document.createElement("a");

            link.href = window.URL.createObjectURL(blob);
            link.download = filename;

            // Simulasikan klik untuk men-download file
            link.click();

            // Bebaskan sumber daya yang digunakan
            window.URL.revokeObjectURL(link.href);
        }
    </script>
@endsection
