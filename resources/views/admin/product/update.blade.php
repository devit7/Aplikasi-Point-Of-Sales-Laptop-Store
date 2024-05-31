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
                            
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Suplier</label>
                                    <select name="supplier" id="dropSupp" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        @unlees(count($sup)>0)
                                            @foreach($sup as $su)
                                                <option value="{{$su->id}}">{{$su->supplier_name}}</option>
                                            @endforeach 
                                        @endunlees
                                    </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Merk</label>
                                    <select name="merk" id="dropMerk"
                                        class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500">
                                        @unlees(count($merk)>0)
                                            @foreach($merk as $mer)
                                                <option value="{{$mer->id}}">{{$mer->merk_name}}</option>
                                            @endforeach 
                                        @endunlees
                                    </select>
                            </div>
                            
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-md focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
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
        let dropSup = document.getElementById('dropSupp');
        let dropMerk = document.getElementById('dropMerk');
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
        

    </script>
@endpush