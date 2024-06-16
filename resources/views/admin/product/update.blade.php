{{-- @dd($pro['id']) --}}
@section('title', 'Update Product')
@extends('layout.admin_main')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Update Product
                </p>
                <p class="text-[#6b6eb4] ">
                    Update of Product
                </p>
            </div>
        </div>
        <div class="mt-10 flex justify-between w-full mx-auto rounded-md">
            <div class="w-[100%] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Update a Product</p>
                <div class="rounded-md p-4 bg-[#1C1D42] h-[auto] text-[#6b6eb4]">
                    <form action="{{ route('products.admin.update', $pro['id']) }}"
                        class="px-[2%] h-[100%] py-[2%] flex flex-col justify-between items-cente" id="formCreate"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-row w-[100%] h-[auto] justify-between">
                            <div class="w-[45%]">
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="product_name" class="block mb-2 text-sm font-medium  text-gray-400">Nama
                                            Produk</label>
                                        <input type="text" name="product_name" id="product_name"
                                            class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Nama Produk" value="{{ $pro['product_name'] }}">
                                        @error('product_name')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p id="warningproduct_name" class="text-[#c30010]"></p>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="harga_jual" class="block mb-2 text-sm font-medium  text-gray-400">Harga
                                            Jual</label>
                                        <input type="text" name="harga_jual" id="harga_jual"
                                            class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Harga Jual" value="{{ $pro['harga_jual'] }}">
                                        @error('harga_jual')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p id="warningharga_jual" class="text-[#c30010]"></p>

                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="harga_asli"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Harga
                                            Asli</label>
                                        <input type="text" name="harga_asli" id="harga_asli"
                                            class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Harga Asli" value="{{ $pro['harga_asli'] }}">
                                        @error('harga_asli')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p id="warningharga_asli" class="text-[#c30010]"></p>

                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="stock"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Stock</label>
                                        <input type="number" name="stock" id="stock"
                                            class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                            placeholder="Stok" value="{{ $pro['stock'] }}">
                                        @error('stock')
                                            <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <p id="warningstock" class="text-[#c30010]"></p>

                                    </div>
                                </div>
                            </div>
                            <div class="w-[45%]">
                                <div class="sm:col-span-2 mb-8" id="forChangefoto">
                                    <label for="description"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-gray-400">Foto</label>
                                    <div class="forStok">
                                        <input type="text" name="fotoLama" style="display:none;" id="fotoLama"
                                            value="{{ $pro['img'] }}"
                                            class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        <input type="checkbox" onclick="ubah('cbCheck')" name="cbCheck" id="cbCheck"
                                            value="sama"
                                            class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        <label for="description"
                                            class="block text-sm  font-medium text-gray-900 dark:text-gray-400">centang jika
                                            ingin
                                            mengganti foto</label>
                                    </div>
                                </div>

                                <div class="sm:col-span-2 mb-[5px]" id="potoArea" style="display:none;">
                                    <div class=" relative border border-gray-400 border-dashed rounded-lg mb-4 p-2"
                                        id="dropzone">
                                        <input id="img" type="file" name="img_product"
                                            accept=".jpg,.jpeg,.png"
                                            class="absolute inset-0 w-full h-full opacity-0 z-50" />
                                        <div class="text-center">
                                            <img class="mx-auto h-12 w-12"
                                                src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                            <h3 class="mt-0 text-sm font-medium text-gray-900">
                                                <label for="file-upload" class="relative cursor-pointer text-gray-400">
                                                    <span>Drag and drop</span>
                                                    <span class="text-indigo-600"> or browse</span>
                                                    <span>to upload</span>
                                                </label>
                                            </h3>
                                            <p class="mt-1 text-xs text-gray-500">
                                                PNG, JPG, GIF up to 10MB
                                            </p>
                                        </div>

                                        <img src="" class="mt-2 mx-auto max-h-40 hidden" id="preview">
                                    </div>
                                    <p id="warningimg_product" class="text-[#c30010]"></p>
                                </div>

                                {{-- Input Supplier --}}
                                <div class="sm:col-span-2 mb-6 dropdown-div">
                                    <label for="dropdown-button-supplier"
                                        class="block mb-2 text-sm font-medium  text-gray-400">Supplier</label>
                                    <button type="button" id="dropdown-button-supplier"
                                        class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <span class="">{{ $pro['supplier']['supplier_name'] }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="dropdown-menu-supplier"
                                        class=" hidden dropdown-menu py-2 mt-2 shadow-lg col bg-[#131432] ring-black ring-opacity-5 p-1 space-y-1">
                                        {{-- Search input Buat Dropdown --}}
                                        <input
                                            class="search-input w-full px-2 bg-[#131432] text-gray-400 border rounded-md  border-gray-300 focus:outline-none"
                                            type="text" placeholder="Search Supplier" autocomplete="off">
                                        {{-- list dropdown --}}
                                        @forelse ($dataSupplier as $sup)14,000,000.00
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="{{ $sup['id'] }}">{{ $sup['supplier_name'] }}</a>
                                        @empty
                                            <p class="text-center text-white">No Supplier</p>
                                        @endforelse
                                    </div>

                                    <input type="hidden" name="supplier_id" id="supplier_id"
                                        value="{{ $pro['supplier_id'] }}">
                                    <p id="warningsupplier_id" class="text-[#c30010]"></p>

                                    @error('supplier_id')
                                        <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                            {{ $message }}
                                        </p>
                                    @enderror

                                </div>


                                {{-- Input Merk --}}
                                <div class="sm:col-span-2 dropdown-div">
                                    <label for="dropdown-button-merk"
                                        class="block mb-2 text-sm font-medium  text-gray-400">Merk</label>
                                    <button type="button" id="dropdown-button-merk"
                                        class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <span class="">{{ $pro['merk']['merk_name'] }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="dropdown-menu-merk"
                                        class="hidden dropdown-menu px-4 py-2 mt-2 shadow-lg col bg-[#131432] ring-black">
                                        {{-- Input Search Buat Dropdown --}}
                                        <input
                                            class="search-input w-full px-2 bg-[#131432] text-gray-400 border rounded-md  border-gray-300 focus:outline-none"
                                            type="text" placeholder="Search Merk" autocomplete="off">
                                        {{-- List Dropdown --}}
                                        @forelse ($dataMerk as $merk)
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="{{ $merk['id'] }}">{{ $merk['merk_name'] }}</a>
                                        @empty
                                            <p class="text-center text-white">No Merk</p>
                                        @endforelse
                                    </div>
                                    <input type="hidden" name="merk_id" id="merk_id" value="{{ $pro['merk_id'] }}">
                                    @error('merk_id')
                                        <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <p id="warningmerk_id" class="text-[#c30010]"></p>


                                {{-- Input Status --}}
                                <div class="sm:col-span-2 dropdown-div">
                                    <label for="dropdown-button-status"
                                        class="block mb-2 text-sm font-medium  text-gray-400">Status</label>
                                    <button type="button" id="dropdown-button-status"
                                        class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <span class="">{{ $pro['status'] }}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div id="dropdown-menu-status"
                                        class="hidden dropdown-menu px-4 py-2 mt-2 shadow-lg col bg-[#131432] ring-black">
                                        {{-- List Dropdown --}}
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="aktif">aktif</a>
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="tidak aktif">tidak aktif</a>
                                    </div>
                                    <input type="hidden" name="status" id="status" value="{{ $pro['status'] }}">
                                    @error('status')
                                        <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <p id="warningstatus" class="text-[#c30010]"></p>


                            </div>
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <a href="{{ route('products.admin.index') }}"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-600 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-gray-700">
                                Back
                            </a>
                            <button type="submit" onclick="submitForm(event)" 
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        function submitForm(event){
            let inp = document.querySelectorAll('input');
            let cekubah = null;
            console.log("panjang : "+inp.length)
            inp.forEach(e=>{
                console.log(e.name)
                if(e.name=='product_name'&&e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                    // event.preventDefault();
                if(e.name=='harga_jual'&&e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='harga_asli'&&e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='stock' && e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='cbCheck' && e.value=="ubah" ){
                    console.log('masuk'+e.name)
                    cekubah=e.value
                }
                if(e.name=='img_product' && e.value=='' && cekubah=='ubah'){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='supplier_id' && e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='merk_id' && e.value==""){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
                if(e.name=='status' && e.value==''){
                    event.preventDefault();
                    console.log('masuk'+e.name)
                    infos(e.name)
                }
            })
        }
        function infos(nameInp){
            let infos = document.getElementById("warning"+nameInp);
            infos.textContent = "Tidak Boleh kosong";
            setTimeout(function() {
                infos.textContent = "";
            }, 2000);
        }
    </script>
    <style>
        #file-upload {
            /* position: fixed;
                            top:-20%;
                            left: -20%; */
        }

        #butforBack {
            /* border: 1px solid white; */
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .forBackSup {
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            /* border: #f2f2f2 1px solid; */
            width: fit-content;
        }

        .forBackSup>* {
            /* border: black 1px solid; */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100%;
        }

        /* .checkbox-container {
                                                                                                                        display: inline-block;
                                                                                                                        vertical-align: middle;
                                                                                                                    } */

        .forBackSup>input {
            appearance: none !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #131432;
            border-radius: 4px;
            outline: none;
            /* border: none !important; */
            cursor: pointer !important;
            background-color: #131432;
            /* padding: 0 0; */
            /* margin: 0 0; */
            padding: 2px;
            margin: 2px;
            box-shadow: none !important;
            /* margin-right: 5px; Spasi antara checkbox dan teks */
        }

        .forBackSup>input:active {
            border: none;
            outline: none;
            /* background-color: ; */

        }

        .forBackSup>input:checked {
            background-color: #4CAF50;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }

        .forStok {
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            /* border: #f2f2f2 1px solid; */
            width: fit-content;
        }

        .forStok>* {
            /* border: black 1px solid; */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 100%;
        }

        /* .checkbox-container {
                                                                                                                        display: inline-block;
                                                                                                                        vertical-align: middle;
                                                                                                                    } */

        .forStok>input {
            appearance: none !important;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #131432;
            border-radius: 4px;
            outline: none;
            /* border: none !important; */
            cursor: pointer !important;
            background-color: #131432;
            /* padding: 0 0; */
            /* margin: 0 0; */
            padding: 2px;
            margin: 2px;
            box-shadow: none !important;
            /* margin-right: 5px; Spasi antara checkbox dan teks */
        }

        .forStok>input:active {
            border: none;
            outline: none;
            /* background-color: ; */

        }

        .forStok>input:checked {
            background-color: #4CAF50;
            border: none !important;
            outline: none !important;
            box-shadow: none !important;
        }


        /* .checkbox-text {
                                                                                                                        font-size: 16px;
                                                                                                                        color: #333;
                                                                                                                    } */

        /* Untuk efek hover */
        .forStok .forStok>input:not(:checked) {
            background-color: #f2f2f2;
        }

        main::-webkit-scrollbar {
            width: 0;
            /* background-color: white;
                                                                                                                color: white;
                                                                                                                border: 1px solid inherit; */
        }

        main {
            scrollbar-width: none;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <script>
        function ubah(id) {
            // console.log('masuk')
            let marg = document.getElementById('forChangefoto');
            let valu = document.getElementById(id);
            console.log(valu)
            let poto = document.getElementById('potoArea');
            if (valu.checked) {
                valu.value = "ubah"
                // console.log(poto)
                marg.style.marginBottom = "5px";
                poto.style.display = "";
            } else {
                valu.value = "sama"
                marg.style.marginBottom = "36px";
                // console.log(poto)

                poto.style.display = "none";
            }
        }
        let sup = @json($pro['supplier_id']);
        let merk = @json($pro['merk_id']);
        console.log(sup, " and ", merk)
        let dropSup = document.getElementById('dropSup');
        console.log(dropSup.options.length)
        let dropMerk = document.getElementById('dropMerk');
        console.log(dropMerk.options.length)

        let hitung = 0;
        for (let r = 0; r < dropSup.options.length; r++) {
            if (dropSup.options[r].value == sup) {

                dropSup.options[r].selected = true;
                // console.log('sama',sup," ",r);break;

            }
        }
        for (let t = 0; t < dropMerk.options.length; t++) {
            if (dropMerk.options[t].value == merk) {

                dropMerk.options[t].selected = true;
                // console.log('sama');break;
            }
        }

        function newMerks(apa) {
            let inp = document.getElementById('inpnewMerk');
            let dropMerk = document.getElementById('dropMerk');
            let newMerk = document.getElementById('newMerk');
            let divmerk = document.getElementById('dropMerkdiv');
            let cb = document.getElementById('cbmerk');
            let merk = @json($pro['merk_id']);
            // console.log(dropMerk.options.length)
            if (apa == "showDrop") {
                // event.preventDefault();
                // console.log('masuk')
                divmerk.style.display = "";
                inp.disabled = true;
                newMerk.style.display = "none";
                for (let q = 0; q < dropMerk.options.length; q++) {
                    if (dropMerk.options[q].value == merk) {

                        dropMerk.options[q].selected = true;
                        // console.log('sama');break;
                    }
                }
                inp.value = "0";
                cb.checked = false;

            } else if (dropMerk.options[(dropMerk.options.length) - 1].selected == true && apa == 'none') {
                console.log('masuk');
                dropMerk.options[0].selected = true;
                divmerk.style.display = "none";
                inp.value = "";
                // divmerk.disabled=false;
                newMerk.style.display = "";
                cb.checked = false;

            }

        }

        function newSup(apa) {
            let inps = document.querySelectorAll('#newSup>div>input');
            console.log(inps.length)
            // console.log(inps[0].value);
            let dropMerk = document.getElementById('dropSup');
            let newMerk = document.getElementById('newSup');
            let divmerk = document.getElementById('dropSupdiv');
            let cb = document.getElementById('cbCheck');
            let sup = @json($pro['supplier_id']);
            // console.log(dropMerk.options.length)

            if (apa == "showDrop") {
                console.log('masuk')
                divmerk.style.display = "";
                newMerk.style.display = "none";
                dropMerk.options[0].selected = true;
                for (let t = 1; t < inps.length; t++) {
                    inps[t].value = "0";
                }
                for (let a = 0; a < dropSup.options.length; a++) {
                    if (dropSup.options[a].value == sup) {

                        dropSup.options[a].selected = true;
                        // console.log('sama',sup," ",r);break;

                    }
                }
            } else if (dropMerk.options[(dropMerk.options.length) - 1].selected == true) {
                // console.log('masuk');
                dropMerk.options[0].selected = true;
                divmerk.style.display = "none";
                newMerk.style.display = "";
                cb.checked = false;
                for (let r = 1; r < inps.length; r++) {
                    inps[r].value = "";
                }

            }
            // console.log('masuk')

        }

        function saveForm(event) {
            let form = document.getElementById();
        }
        var dropzone = document.getElementById('dropzone');

        dropzone.addEventListener('dragover', e => {
            e.preventDefault();
            dropzone.classList.add('border-indigo-600');
        });

        dropzone.addEventListener('dragleave', e => {
            e.preventDefault();
            dropzone.classList.remove('border-indigo-600');
        });

        dropzone.addEventListener('drop', e => {
            e.preventDefault();
            dropzone.classList.remove('border-indigo-600');
            var file = e.dataTransfer.files[0];
            displayPreview(file);
        });

        var input = document.getElementById('logo_toko');

        input.addEventListener('change', e => {
            e.preventDefault();
            var file = e.target.files[0];
            displayPreview(file);
        });

        function displayPreview(file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
        }
    </script>
    <script>
        function saveForm(event) {
            let form = document.getElementById();
        }
        var dropzone = document.getElementById('dropzone');

        dropzone.addEventListener('dragover', e => {
            e.preventDefault();
            dropzone.classList.add('border-indigo-600');
        });

        dropzone.addEventListener('dragleave', e => {
            e.preventDefault();
            dropzone.classList.remove('border-indigo-600');
        });

        dropzone.addEventListener('drop', e => {
            e.preventDefault();
            dropzone.classList.remove('border-indigo-600');
            var file = e.dataTransfer.files[0];
            displayPreview(file);
        });

        var input = document.getElementById('img');

        input.addEventListener('change', e => {
            e.preventDefault();
            var file = e.target.files[0];
            displayPreview(file);
        });

        function displayPreview(file) {
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
                preview.classList.remove('hidden');
            };
        }

        //untuk mengkosongkan value input form
        document.getElementById('button-reset').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('product_name').value = '';
            document.getElementById('harga_jual').value = '';
            document.getElementById('harga_asli').value = '';
            document.getElementById('stock').value = '';
            document.getElementById('preview').classList.add('hidden');
            document.getElementById('supplier_').value = '';
            document.getElementById('merk_id').value = '';
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new AutoNumeric('#harga_asli', {
                currencySymbol: 'Rp',
                decimalCharacter: '.',
                unformatOnSubmit: true
            });
            new AutoNumeric('#harga_jual', {
                currencySymbol: 'Rp',
                decimalCharacter: '.',
                unformatOnSubmit: true
            })
            // Function to toggle the dropdown state
            function toggleDropdown(dropdownMenu) {
                // alert("toggle dropdown jalan" + dropdownMenu);
                const isOpen = !dropdownMenu.classList.contains('hidden');
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdownMenu) menu.classList.add('hidden');
                });
                dropdownMenu.classList.toggle('hidden', isOpen);

                // dropdownMenu.style.border = '2px solid red';
            }

            // Attach event listeners to each dropdown button
            document.querySelectorAll('.dropdown-button').forEach(button => {
                const dropdownMenu = button.nextElementSibling;
                button.addEventListener('click', () => {
                    toggleDropdown(dropdownMenu);
                });
            });

            // Add event listener to filter items based on input
            document.querySelectorAll('.search-input').forEach(input => {
                input.addEventListener('input', (e) => {
                    const searchTerm = e.target.value.toLowerCase();
                    const items = e.target.closest('.dropdown-menu').querySelectorAll('a');

                    items.forEach((item) => {
                        const text = item.textContent.toLowerCase();
                        if (text.includes(searchTerm)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            document.addEventListener('click', (e) => {
                if (!e.target.closest('.dropdown-div')) {
                    document.querySelectorAll('.dropdown-menu').forEach(menu => {
                        menu.classList.add('hidden');
                    });
                }
            });

            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedValue = this.getAttribute('data-value');
                    const hiddenInput = this.closest('.dropdown-div').querySelector(
                        'input[type="hidden"]');
                    const dropdownLabel = this.closest('.dropdown-div').querySelector(
                        'button span');
                    hiddenInput.value = selectedValue;
                    dropdownLabel.textContent = this.textContent;
                    const dropdownMenu = this.closest('.dropdown-menu');
                    toggleDropdown(dropdownMenu);
                });
            });
        });
    </script>
@endpush
