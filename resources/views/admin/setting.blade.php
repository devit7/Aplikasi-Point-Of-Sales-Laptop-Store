@section('title', 'SETTING TOKO')
@extends('layout.kasir_main')

@section('content')
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SETTING TOKO</title>
    </head>

    <body>
        <!-- component -->
        <div class="flex items-center w-[169.5vh] h-[100vh] justify-center bg-[#131432] bg-cover bg-no-repeat">
            <div class="flex justify-center rounded-xl bg-[#1c1d42] bg-opacity-50 h-[85vh] w-[120vh] py-10 shadow-lg backdrop-blur-md">
            <div class="text-white mt-[-4vh] mb-[-4vh] h-[82vh] w-[117vh]">
                <div class="mb-8 flex flex-col items-center">
                    <h1 class="text-2xl"><strong>SETTING TOKO</strong></h1>
                </div>
                <form action="#">
                <div class="mb-4 w-[40vh] mx-auto text-center">
                    <label for="namaToko" class="block mb-2 text-sm font-medium  text-white">Nama Toko:</label>
                    <input id="namaToko" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="text" name="name" placeholder="Masukkan Nama Toko" />
                </div>
                <div class="mb-4 w-[40vh] mx-auto text-center">
                    <label for="alamatToko" class="block mb-2 text-sm font-medium  text-white">Alamat Toko:</label>
                    <input id="alamatToko" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="text" name="address" placeholder="Masukkan Alamat Toko" />
                </div>
                <div class="mb-4 w-[40vh] mx-auto text-center">
                    <label for="noHp" class="block mb-2 text-sm font-medium  text-white">Nomor HP:</label>
                    <input id="noHp" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="integer" name="phone" placeholder="Masukkan Nomor HP" />
                </div>                
                <div class="mb-4 w-[40vh] mx-auto text-center">
                    <label for="logoToko" class="block mb-2 text-sm font-medium  text-white">Logo Toko:</label>
                    <input id="logoToko" class="bg-[#131432] border   text-sm rounded-lg  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" type="file" name="logo" placeholder="Upload Logo Toko" onchange="previewFile()">
                    <div id="preview" class="mt-4 text-center">
                        <label class="block mb-2 text-sm font-medium  text-white">Preview Logo: </label>
                        <img src="" alt="Preview Logo" style="width: 150px; display: none; margin: auto;">
                    </div>
                </div>
                <script>
                    function previewFile() {
                        const preview = document.querySelector('#preview img');
                        const file = document.querySelector('#logoToko').files[0];
                        const reader = new FileReader();
                        
                        reader.addEventListener("load", function () {
                            // convert image file to base64 string
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }, false);

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }
                </script>
                <div id="actionButtons" class="mt-[10vh] w-full flex justify-between">
                    <button onclick="" type="button" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 transition-colors duration-300 hover:bg-red-500 ml-[10vh]">Cancel Update</button>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 transition-colors duration-300 hover:bg-green-500 mr-[10vh]">Save Update</button>
                </div>
                <script>
                    const previewImg = document.querySelector('#preview img');
                    const actionButtons = document.getElementById('actionButtons');
                    previewImg.onload = function() {
                        if (previewImg.src !== '') {
                            actionButtons.style.marginTop = '-14.5vh';
                        }
                    };
                </script>
                </form>
            </div>
            </div>
        </div>
    </body>
    </html>
@endsection