{{-- @dd($pro, $sup, $merk) --}}
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
                    <form action=" {{ route('products.update', $pro->id) }}"
                        class="  px-[2%] h-[100%] py-[2%] flex flex-col justify-between items-cente" id="formCreate"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex flex-row w-[100%] h-[auto] justify-between">
                            <div class="grid gap-4 w-[45%] sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium  text-gray-400">Nama</label>
                                    <input type="text" name="namaProduk" id="name" value="{{ $pro->product_name }}"
                                        class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="Ex : Wibu Jaya Bersama" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="nama_toko" class="block mb-2 text-sm font-medium  text-gray-400">Harga
                                        Jual</label>
                                    <input type="number" name="hargaJual" id="nama_toko" value="{{ $pro->harga_jual }}"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Harga
                                        Asli</label>
                                    <input type="number" name="hargaAsli" id="hargaasli" value="{{ $pro->harga_asli }}"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Stock</label>
                                    <input type="number" name="stok" id="nama_toko" value="{{ $pro->stock }}"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                                </div>


                            </div>
                            <div class="w-[45%]">
                                <div class="sm:col-span-2 mb-8" id="forChangefoto">
                                    <label for="description"
                                        class="block mb-4 text-sm font-medium text-gray-900 dark:text-gray-400">Foto</label>
                                    <div class="forStok">

                                        <input type="text" name="fotoLama" style="display:none;" id="fotoLama"
                                            value="{{ $pro->img }}"
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
                                        <input id="img" type="file" name="fileUpload" type="file"
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
                                </div>
                                <div class="sm:col-span-2" id="newSup" style="display:none;">
                                    <hr class="border-gray-500 border-t-2 mb-4 opacity-10">
                                    <div class="forBackSup mb-4">
                                        <input type="checkbox" onclick="newSup('showDrop')" name="cbCheck"
                                            id="cbCheck" value="sama"
                                            class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-900 dark:text-gray-400">checklist
                                            untuk
                                            kembali memilih Supplier</label>
                                    </div>
                                </div>

                                {{-- Input Supplier --}}
                                <div class="sm:col-span-2 mb-6 dropdown-div">
                                    <label for="dropdown-button-supplier"
                                        class="block mb-2 text-sm font-medium  text-gray-400">Supplier</label>
                                    <button type="button" id="dropdown-button-supplier"
                                        class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <span class="">{{ $pro->supplier->supplier_name }}</span>
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
                                        @forelse ($sup as $sup)
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="{{ $sup->id }}">{{ $sup->supplier_name }}</a>
                                        @empty
                                            <p class="text-center text-white">No Supplier</p>
                                        @endforelse

                                    </div>
                                    <input type="hidden" name="supplier" id="supplier-input"
                                        value="{{ $pro->supplier_id }}">
                                </div>

                                {{-- Input Merk --}}
                                <div class="sm:col-span-2 dropdown-div">
                                    <label for="dropdown-button-merk"
                                        class="block mb-2 text-sm font-medium  text-gray-400">Merk</label>
                                    <button type="button" id="dropdown-button-merk"
                                        class="flex dropdown-button justify-between bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <span class="">{{ $pro->merk->merk_name }}</span>
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
                                        @forelse ($merk as $merk)
                                            <a href="#"
                                                class="dropdown-item pl-3 flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer"
                                                data-value="{{ $merk->id }}">{{ $merk->merk_name }}</a>
                                        @empty
                                            <p class="text-center text-white">No Merk</p>
                                        @endforelse
                                        <input type="hidden" name="merk" id="merk-input"
                                            value="{{ $pro->merk_id }}">
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-red-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Reset
                            </button>
                            <button type="submit"
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
        let sup = @json($pro->supplier_id);
        let merk = @json($pro->merk_id);
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
            let merk = @json($pro->merk_id);
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
            let sup = @json($pro->supplier_id);
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
            document.getElementById('nama_toko').value = '';
            document.getElementById('no_hp').value = '';
            document.getElementById('alamat').value = '';
            document.getElementById('preview').classList.add('hidden');
            document.getElementById('logo_toko').value = '';
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
