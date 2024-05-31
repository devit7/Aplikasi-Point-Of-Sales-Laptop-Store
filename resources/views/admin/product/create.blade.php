@section('title', 'Create Product')
@extends('layout.admin_main')
@section('content')
    <div class=" p-7 ">
        <div class="mb-6 flex items-end justify-between">
            <div class="flex flex-col ">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Create Product
                </p>
                <p class="text-[#6b6eb4] ">
                    Create of Product
                </p>
            </div>
        </div>
        <div class="mt-10 flex justify-between w-full mx-auto  rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Create a Product</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
<<<<<<< HEAD
                    <form action="/adm-prod-new" id="formCreate" method="post" enctype="multipart/form-data">
=======
                    <form action="{{ route('admin.product.store') }}" method="post">
>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium  text-gray-400">Nama</label>
<<<<<<< HEAD
                                <input type="text" name="namaProduk" id="name"
=======
                                <input type="text" name="product_name" id="product_name"
>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : Wibu Jaya Bersama" required="">
                            </div>
                            <div class="sm:col-span-2">
<<<<<<< HEAD
                                <label for="nama_toko" class="block mb-2 text-sm font-medium  text-gray-400">Harga Jual</label>
                                <input type="number" name="hargaJual" id="nama_toko"
=======
                                <label for="stock" class="block mb-2 text-sm font-medium  text-gray-400">Stock</label>
                                <input type="text" name="stock" id="stock"
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : 100" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="harga_jual" class="block mb-2 text-sm font-medium  text-gray-400">Harga
                                    Jual</label>
                                <input type="text" name="harga_jual" id="harga_jual"
>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
<<<<<<< HEAD
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Harga Asli</label>
                                    <input type="number" name="hargaAsli" id="hargaasli"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Stock</label>
                                    <input type="number" name="stok" id="nama_toko"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <div class=" relative border border-gray-400 border-dashed rounded-lg p-6" id="dropzone">
                                    <input type="file" name="fileUpload" type="file" accept=".jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 z-50" />
=======
                                <label for="harga_asli" class="block mb-2 text-sm font-medium  text-gray-400">Harga
                                    Asli</label>
                                <input type="text" name="harga_asli" id="harga_asli"
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <div class="relative border border-gray-400 border-dashed rounded-lg p-6" id="dropzone">
                                    {{-- value input type hidden ini akan di ambil jika tidak menambahkan file image --}}
                                    <input type="file" id="img" name="img"
                                        class="absolute inset-0 w-full h-full opacity-0 z-50" />

>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                                    <div class="text-center">
                                        <img class="mx-auto h-12 w-12"
                                            src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                        <h3 class="mt-2 text-sm font-medium text-gray-900">
                                            <label for="img" class="relative cursor-pointer text-gray-400">
                                                <span>Drag and drop</span>
                                                <span class="text-indigo-600"> or browse</span>
                                                <span>to upload</span>
<<<<<<< HEAD
=======
                                                {{-- <input id="logo_toko" name="logo_toko" type="file" class="sr-only"> --}}
>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                                            </label>
                                        </h3>
                                        <p class="mt-1 text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>

                                    <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                                </div>
                            </div>
<<<<<<< HEAD
                            
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Suplier</label>
                                    <select name="supplier" id="" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        @unlees(count($Supp)>0)
                                            @foreach($Supp as $sup)
                                                <option value="{{$sup->id}}">{{$sup->supplier_name}}</option>
                                            @endforeach 
                                        @endunlees
                                    </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Merk</label>
                                    <select name="merk" id=""
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        @unlees(count($merks)>0)
                                            @foreach($merks as $merk)
                                                <option value="{{$merk->id}}">{{$merk->merk_name}}</option>
                                            @endforeach 
                                        @endunlees
                                    </select>
=======

                            {{-- Input Supplier --}}
                            <div class="sm:col-span-2">
                                <label for="dropdown-button-supplier"
                                    class="block mb-2 text-sm font-medium  text-gray-400">Supplier</label>
                                <button type="button" id="dropdown-button-supplier"
                                    class="flex dropdown-button justify-start bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                    <span class="">Choose Supplier</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu-supplier"
                                    class=" hidden dropdown-menu px-4 py-2 mt-2 rounded-md shadow-lg col bg-[#131432] ring-black ring-opacity-5 p-1 space-y-1">
                                    <!-- Search input -->
                                    <input
                                        class="search-input w-full px-2 bg-[#131432] text-gray-400 border rounded-md  border-gray-300 focus:outline-none"
                                        type="text" placeholder="Search Supplier" autocomplete="off">
                                    {{-- list dropdown --}}
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Sanubari">Supplier Sanubari</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Indo Jaya">Supplier Indo Jaya</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Jaya">Supplier Jaya</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Sumber Makmur">Supplier Sumber Makmur</a>
                                </div>
                                <input type="hidden" name="supplier" id="supplier-input" value="">
                            </div>

                            {{-- Input Merk --}}
                            <div class="sm:col-span-2 dropdown-group">
                                <label for="dropdown-button-merk"
                                    class="block mb-2 text-sm font-medium  text-gray-400">Merk</label>
                                <button type="button" id="dropdown-button-merk"
                                    class="flex dropdown-button justify-start bg-[#131432] border text-sm rounded-lg  w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                    <span class="">Choose Merk</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <div id="dropdown-menu-merk"
                                    class="hidden dropdown-menu px-4 py-2 mt-2 rounded-md shadow-lg col bg-[#131432] ring-black">
                                    {{-- Input Search --}}
                                    <input
                                        class="search-input w-full px-2 bg-[#131432] text-gray-400 border rounded-md  border-gray-300 focus:outline-none"
                                        type="text" placeholder="Search Merk" autocomplete="off">
                                    {{-- List Dropdown --}}
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Sanubari">Supplier Sanubari</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Indo Jaya">Supplier Indo Jaya</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Jaya">Supplier Jaya</a>
                                    <a href="#"
                                        class="dropdown-item flex row text-white hover:bg-[#6b6eb4] active:bg-blue-100 cursor-pointer rounded-md"
                                        data-value="Supplier Sumber Makmur">Supplier Sumber Makmur</a>
                                </div>
                                <input type="hidden" name="merk" id="merk-input" value="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="merk_id" class="block mb-2 text-sm font-medium  text-gray-400">Merk</label>
                                <input type="text" name="merk_id" id="merk_id"
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : 0821*" required="">
>>>>>>> e671a8a58f372ea62cd66443fdf0e69e7dd331ac
                            </div>

                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Reset
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Create Payment
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
        #file-upload{
            /* position: fixed;
            top:-20%;
            left: -20%; */
        }
    </style>
    <script>
        function saveForm(event){
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
    </script>
@endpush
