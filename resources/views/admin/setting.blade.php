@section('title', 'SETTING TOKO')
@extends('layout.admin_main')

@section('content')
    <div class=" p-7">
        <div class="mt-[-15px] mb-4 flex items-end justify-between">
            <div class="flex flex-col">
                <p class="text-[#6b6eb4] text-lg font-semibold">
                    Manage Product
                </p>
                <p class="text-[#6b6eb4] ">
                    A List of All of the Customers
                </p>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="mt-2 mb-[-10px] flex gap-[20px] lg:gap-[150px] md:gap-[50px]  w-full mx-auto rounded-md">
            <div class="w-[600px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Setting</p>
                <div class="rounded-md p-4 bg-[#1C1D42] text-[#6b6eb4]">
                    <form enctype="multipart/form-data" action="{{ url('admin/setting/' . $toko[0]['id']) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="nama_toko" class="block mb-2 text-sm font-medium  text-gray-400">Nama
                                    Toko</label>
                                <input type="text" name="nama_toko" id="nama_toko"
                                    class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5  border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="Ex : Wibu Jaya Bersama" value="{{ $toko[0]['nama_toko'] }}">
                                @error('nama_toko')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-400">Nomor
                                    HP</label>
                                <input type="tel" name="no_hp" id="no_hp"
                                    class="bg-[#131432] border text-sm rounded-lg block w-full p-2.5 border-gray-600 placeholder-gray-400 text-gray-400 focus:ring-primary-500 focus:border-primary-500"
                                    placeholder="EX : 0821*" value="{{ $toko[0]['no_hp'] }}">
                                @error('no_hp')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="sm:col-span-2">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alamat</label>
                                <textarea id="alamat" rows="1" name="alamat"
                                    class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 bg-[#131432] dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="EX : Jalan Jalan">{{ $toko[0]['alamat'] }}</textarea>
                                @error('alamat')
                                    <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <div class="relative border border-gray-400 border-dashed rounded-lg p-6" id="dropzone">
                                    <input type="file" id="logo_toko" name="logo_toko"
                                        class="absolute inset-0 w-full h-full opacity-0 z-50" />

                                    <div class="text-center">
                                        <img class="mx-auto h-12 w-12"
                                            src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                        <h3 class="mt-2 text-sm font-medium text-gray-900">
                                            <label for="logo_toko" class="relative cursor-pointer text-gray-400">
                                                <span>Drag and drop</span>
                                                <span class="text-indigo-600"> or browse</span>
                                                <span>to upload</span>
                                                {{-- <input id="logo_toko" name="logo_toko" type="file" class="sr-only"> --}}
                                            </label>
                                        </h3>
                                        <p class="mt-1 text-xs text-gray-500">
                                            PNG, JPG, GIF up to 10MB
                                        </p>
                                    </div>

                                    <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
                                </div>
                            </div>
                            <input type="hidden" name="old_logo_toko" value="{{ $toko[0]['logo_toko'] }}">
                        </div>
                        <div class="flex justify-between w-full gap-4 sm:gap-6">
                            <button type="submit" id="button-reset"
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
            <div class="w-[400px] flex flex-col gap-4">
                <p class="rounded-md p-4 font-semibold bg-[#1C1D42] text-[#6b6eb4]">Preview Struk</p>
                <div class="flex flex-col rounded-md p-6 bg-white border border-gray-400">
                    <div class="text-center">
                        <img src="{{ asset('storage/logos/' . $toko[0]['logo_toko']) }}" alt="product"
                            class="w-10 h-10 mx-auto rounded-lg">
                        <p class="text-lg font-semibold">{{ $toko[0]['nama_toko'] }}</p>
                        <p class="text-sm">{{ $toko[0]['alamat'] }}</p>
                        <p class="text-sm">{{ $toko[0]['no_hp'] }}</p>
                    </div>
                    <div class="flex flex-col pb-2  mt-4 border-b-2 border-dashed border-gray-400 ">
                        <div class="flex flex-row justify-between  ">
                            <p class="">22-10-2020</p>
                            <p class="">13:00</p>
                        </div>
                        <div class="flex flex-row justify-between  ">
                            <p class="">Transaksi</p>
                            <p class="">TRX-00</p>
                        </div>
                        <div class="flex flex-row justify-between  ">
                            <p class="">Status</p>
                            <p class="">Sukses</p>
                        </div>
                    </div>
                    <div class="text-center font-semibold">Tipe Pesanan</div>
                    <div class="flex flex-col pb-2  mt-4 border-b-2 border-dashed border-gray-400 ">
                        <div class="flex flex-row justify-between  ">
                            <p class="">Daftar Product</p>
                        </div>
                        <div class="flex flex-row justify-between  ">
                            <p class="">Laptop ROG ( F05 )</p>
                            <p class="">Rp. 15.000.000.00</p>
                        </div>
                        <div class="flex flex-row justify-between  ">
                            <p class="">Tuf Gaming ( F-A05 )</p>
                            <p class="">Rp. 21.000.000.00</p>
                        </div>
                    </div>
                    <div class="flex flex-col pb-2  mt-4  ">
                        <div class="flex flex-row justify-between  ">
                            <p class="">Total</p>
                            <p class="">Rp. 35.000.000.00</p>
                        </div>
                        <div class="flex flex-row justify-between  ">
                            <p class="">Metode Pembayaran</p>
                            <p class="">Tunai</p>
                        </div>
                    </div>
                    <div class="text-center font-semibold mt-10">
                        <p>Terima Kasih</p>
                        <p class=" font-medium">Terus Laris Bersama {{ $toko[0]['nama_toko'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
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
@endpush
