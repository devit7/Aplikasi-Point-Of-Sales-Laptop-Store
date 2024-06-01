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
        <div class="mt-10 flex justify-between w-full mx-auto     rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Update a Product</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                <form action="/adm-prod-Updates/{{$pro->id}}" id="formCreate" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium  text-gray-400">Nama</label>
                                <input type="text" name="namaProduk" id="name" value="{{$pro->product_name}}"
                                    class="bg-[#131432] border text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : Wibu Jaya Bersama" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="nama_toko" class="block mb-2 text-sm font-medium  text-gray-400">Harga Jual</label>
                                <input type="number" name="hargaJual" id="nama_toko" value="{{$pro->harga_jual}}"
                                    class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Harga Asli</label>
                                    <input type="number" name="hargaAsli" id="hargaasli" value="{{$pro->harga_asli}}"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Stock</label>
                                    <input type="number" name="stok" id="nama_toko" value="{{$pro->stock}}"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : 0821*" required="">
                            </div>

                            <div class="forStok">
                                <input type="text" name="fotoLama" style="display:none;" id="fotoLama" value="{{$pro->img}}" class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                <input type="checkbox" onclick="ubah('cbCheck')" name="cbCheck" id="cbCheck" value="sama" class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-900 dark:text-gray-400">centang jika ingin mengganti foto</label>
                            </div>

                            <div class="sm:col-span-2" id="potoArea" style="display:none;">
                                <div class=" relative border border-gray-400 border-dashed rounded-lg p-6" id="dropzone">
                                    <input type="file" name="fileUpload" type="file" accept=".jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 z-50" />
                                    <div class="text-center">
                                        <img class="mx-auto h-12 w-12"
                                            src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                        <h3 class="mt-2 text-sm font-medium text-gray-900">
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

                                    <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                                </div>
                            </div>
                            
                            <div class="sm:col-span-2" id="dropSupdiv" >
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Suplier</label>
                                    <select name="supplier" id="dropSup" onchange="newSup('hide')" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <option value="0">Pilih Supplier</option>
                                        @unlees(count($sup)>0)
                                            @foreach($sup as $su)
                                                <option value="{{$su->id}}">{{$su->supplier_name}}</option>
                                            @endforeach 
                                        @endunlees
                                        <option value="isi baru">Isi Baru</option>

                                    </select>
                                    <!-- <input type="text" name="" id=""> -->
                            </div>
                            <div class="sm:col-span-2" id="newSup" style="display:none;">
                                <hr class="border-gray-500 border-t-2 mb-4 opacity-10">
                                <div class="forBackSup mb-4">
                                    <input type="checkbox" onclick="newSup('showDrop')" name="cbCheck" id="cbCheck" value="sama" class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-900 dark:text-gray-400">checklist untuk kembali memilih Supplier</label>
                                </div>
                            
                                <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">New Supplier</label>
                                <div class="sm:col-span-2 ml-3" >
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nama Supplier*</label>
                                    <input type="text" value="0" name="namaSupli" 
                                        class="bg-[#131432] border mb-4  text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : Supplier Marina*" required="">
                                </div>
                                <div class="sm:col-span-2 ml-3" >
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">No Hp Supplier*</label>
                                    <input type="text" value="0" name="noSUp" 
                                        class="bg-[#131432] border border mb-4   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : Supplier Marina*" required="">
                                </div>
                                <div class="sm:col-span-2 ml-3" >
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nama Perusahaan*</label>
                                    <input type="text" value="0" name="companySup" 
                                        class="bg-[#131432] border border mb-4   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : Supplier Marina*" required="">
                                </div>
                                <div class="sm:col-span-2 ml-3" >
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat Supplier*</label>
                                    <input type="text" value="0" name="alamatSup" 
                                        class="bg-[#131432] border border mb-4  text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : Supplier Marina*" required="">
                                </div>
                                
                            </div>
                            <div class="sm:col-span-2" id="dropMerkdiv">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Merk</label>
                                    <select name="merk" id="dropMerk" onchange="newMerks('none')"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        <option value="0">Pilih Merk</option>
                                        @unlees(count($merk)>0)
                                            @foreach($merk as $mer)
                                                <option value="{{$mer->id}}">{{$mer->merk_name}}</option>
                                            @endforeach 
                                        @endunlees
                                                <option value="isi baru">Isi Baru</option>

                                    </select>

                            </div>
                            <div id="newMerk" style="display:none;" class="sm:col-span-2">
                                <div class="forBackSup">
                                    <input type="checkbox" onclick="newMerks('showDrop')" value="sama" id="cbmerk" class="bg-[#131432] border border-gray-600 inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-900 dark:text-gray-400">checklist untuk kembali memilih Merk</label>
                                </div>
                                <div class="sm:col-span-2"  >
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">New Merk</label>
                                    <input type="text" name="newMerk" value="0" id="inpnewMerk"
                                        class="bg-[#131432]  border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                        placeholder="EX : Epson*" required="">
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
                                Create
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
        #butforBack{
            /* border: 1px solid white; */
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .forBackSup{
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            /* border: #f2f2f2 1px solid; */
            width: fit-content;
        }
        .forBackSup>*{
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
            box-shadow: none!important;
            /* margin-right: 5px; Spasi antara checkbox dan teks */
        }
        .forBackSup>input:active{
            border: none;
            outline: none;
            /* background-color: ; */

        }

        .forBackSup>input:checked {
            background-color: #4CAF50;
            border: none !important;
            outline:none !important; 
            box-shadow: none !important;
        }

        .forStok{
            display: flex;
            flex-direction: row;
            gap: 10px;
            align-items: center;
            justify-content: center;
            /* border: #f2f2f2 1px solid; */
            width: fit-content;
        }
        .forStok>*{
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
            box-shadow: none!important;
            /* margin-right: 5px; Spasi antara checkbox dan teks */
        }
        .forStok>input:active{
            border: none;
            outline: none;
            /* background-color: ; */

        }

        .forStok>input:checked {
            background-color: #4CAF50;
            border: none !important;
            outline:none !important; 
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
    </style>
    <script>

    function ubah(id){
            // console.log('masuk')

            let valu = document.getElementById(id);
            console.log(valu)
            let poto = document.getElementById('potoArea');
            if(valu.checked){
                valu.value="ubah"
            // console.log(poto)

                poto.style.display="";
            }
            else{
                valu.value="sama"
            // console.log(poto)

                poto.style.display="none";
            }
        }
        let sup = @json($pro->supplier_id);
        let merk = @json($pro->merk_id);
        console.log(sup," and ",merk)
        let dropSup = document.getElementById('dropSup');
        console.log(dropSup.options.length)
        let dropMerk = document.getElementById('dropMerk');
        console.log(dropMerk.options.length)

        let hitung = 0;
        for(let r=0;r<dropSup.options.length;r++){
            if(dropSup.options[r].value==sup){

                dropSup.options[r].selected = true;
                // console.log('sama',sup," ",r);break;

            }
        }
        for(let t=0;t<dropMerk.options.length;t++){
            if(dropMerk.options[t].value==merk){

                dropMerk.options[t].selected = true;
                // console.log('sama');break;
            }
        }
        function newMerks(apa){
            let inp = document.getElementById('inpnewMerk');
            let dropMerk = document.getElementById('dropMerk');
            let newMerk = document.getElementById('newMerk');
            let divmerk = document.getElementById('dropMerkdiv');
            let cb = document.getElementById('cbmerk');
            let merk =  @json($pro->merk_id);
            // console.log(dropMerk.options.length)
            if(apa=="showDrop"){
                // event.preventDefault();
                // console.log('masuk')
                divmerk.style.display="";
                inp.disabled=true;
                newMerk.style.display="none";
                for(let q=0;q<dropMerk.options.length;q++){
                    if(dropMerk.options[q].value==merk){

                        dropMerk.options[q].selected = true;
                        // console.log('sama');break;
                    }
                }
                inp.value="0";
                cb.checked =false;

            }
            else if(dropMerk.options[(dropMerk.options.length)-1].selected==true && apa=='none'){
                console.log('masuk');
                dropMerk.options[0].selected=true;
                divmerk.style.display="none";
                inp.value="";
                // divmerk.disabled=false;
                newMerk.style.display="";
                cb.checked=false;

            }
            
        }

        function newSup(apa){
            let inps = document.querySelectorAll('#newSup>div>input');
            console.log(inps.length)
            // console.log(inps[0].value);
            let dropMerk = document.getElementById('dropSup');
            let newMerk = document.getElementById('newSup');
            let divmerk = document.getElementById('dropSupdiv');
            let cb = document.getElementById('cbCheck');
            let sup = @json($pro->supplier_id);
            // console.log(dropMerk.options.length)
            
            if(apa=="showDrop"){
                console.log('masuk')
                divmerk.style.display="";
                newMerk.style.display="none";
                dropMerk.options[0].selected=true;
                for(let t=1;t<inps.length;t++){
                    inps[t].value="0";
                }
                for(let a=0;a<dropSup.options.length;a++){
                    if(dropSup.options[a].value==sup){

                        dropSup.options[a].selected = true;
                        // console.log('sama',sup," ",r);break;

                    }
                }
            }
            else if(dropMerk.options[(dropMerk.options.length)-1].selected==true){
                // console.log('masuk');
                dropMerk.options[0].selected=true;
                divmerk.style.display="none";
                newMerk.style.display="";
                cb.checked=false;
                for(let r=1;r<inps.length;r++){
                    inps[r].value="";
                }

            }
            // console.log('masuk')

        }
        
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
