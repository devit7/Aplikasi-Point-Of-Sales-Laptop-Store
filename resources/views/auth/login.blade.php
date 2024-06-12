<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="bg-[#131432] flex justify-center place-items-center h-screen">
    <div class=" flex flex-row w-full  ">
        <div class="flex flex-col bg-[#1C1D42] p-5 mx-auto">
            <div class=" pt-10">
                <h1 class=" text-4xl text-white font-bold">POS</h1>
                <h1 class=" text-white text-xl w-72">Transaksi Tanpa Batas <br> Bisnis Tanpa Hambatan</h1>
            </div>
            <form action="{{ route('akses.login') }}" method="POST" class=" flex flex-col  gap-y-6 bg-[#1C1D42] mt-20 w-[500px] h-full rounded-xl">
                @csrf
                <h1 class=" text-white text-3xl font-semibold">Login</h1>
                <div class=" w-96">
                <div class="relative h-10 w-full min-w-[200px]">
                    <input
                    name="username"
                    class="peer h-full w-full rounded-[7px] text-[#B3B7EE] border border-[#B3B7EE] bg-transparent px-3 py-2.5 font-sans text-sm 
                    font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border 
                    placeholder-shown:border-[#B3B7EE] placeholder-shown:border-t-[#B3B7EE] focus:border-2 
                    focus:border-[#B3B7EE] focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" "
                    />
                    
                    <label class="before:content[' '] after:content[' '] text-[#B3B7EE] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full
                    select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none
                    before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t 
                    before:border-l before:border-[#B3B7EE] before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 
                    after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r 
                    after:border-[#B3B7EE] after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] 
                    peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent 
                    peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight 
                    peer-focus:text-[#B3B7EE] peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-[#B3B7EE] 
                    peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-[#B3B7EE] peer-disabled:text-transparent 
                    peer-disabled:before:border-transparent peer-disabled:after:border-transparent 
                    peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Username
                    </label>
                    </div>
                    
                    @error('username')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                            {{ $message }}
                        </p>
                    @enderror

                <div class="relative h-10 w-full min-w-[200px] mt-5">
                    <input
                    name="password"
                    class="peer text-[#B3B7EE] h-full w-full rounded-[7px] border border-[#B3B7EE] bg-transparent px-3 py-2.5 font-sans text-sm 
                    font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border 
                    placeholder-shown:border-[#B3B7EE] placeholder-shown:border-t-[#B3B7EE] focus:border-2 
                    focus:border-[#B3B7EE] focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                    placeholder=" "
                    type="password"
                    />
                    <label class="before:content[' '] after:content[' '] text-[#B3B7EE] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full
                    select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none
                    before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t 
                    before:border-l before:border-[#B3B7EE] before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 
                    after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r 
                    after:border-[#B3B7EE] after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] 
                    peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent 
                    peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight 
                    peer-focus:text-[#B3B7EE] peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-[#B3B7EE] 
                    peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-[#B3B7EE] peer-disabled:text-transparent 
                    peer-disabled:before:border-transparent peer-disabled:after:border-transparent 
                    peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                    Password
                    </label>
                    @error('password')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-700">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <button
            type="submit"
            class=" w-96 bg-indigo-900 border-2 border-indigo-500 rounded-lg shadow text-center text-white text-base font-semibold px-16 py-2 mt-1
                hover:bg-indigo-500 hover:text-white" type="submit">Login now</button>
                @if ($errors->any())
                    <div class=>
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{-- Jangan tampilkan kesalahan yang sudah ditampilkan di atas --}}
                                @if ($error !== $errors->first('username') && $error !== $errors->first('password'))
                                <div class="bg-red-500 text-white p-4 rounded-md mb-4 mt-4 w-[385px] error-below-button">
                                    <li>{{ $error }}</li>
                                </div>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
        </form>
        </div>
        <img src="foto/computerstore.jpeg" class=" w-full h-screen" alt="">
    </div>
    
</body>
</html>
