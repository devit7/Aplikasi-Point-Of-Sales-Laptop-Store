<section id="sidebar" class="top-0 left-0 bottom-0 hidden lg:block border-r border-[#33356F] ">
    <div class="relative flex flex-col bg-[#131432] h-full w-full ">
        <nav class="flex flex-col w-[280px] h-full justify-between font-sans text-base font-normal text-[#62748E]">
            <div class="flex flex-col ">
                <div class="h-[80px] text-center items-center flex justify-center border-b border-[#33356F]">
                    <h1 class="font-semibold text-3xl text-gray-500">POS Kasir</h1>
                </div>
                <div class="flex flex-col py-6 px-5 gap-1 font-semibold">
                    <p class="text-gray-400 text-sm font-bold  tracking-wider pb-4">
                        MAIN
                    </p>
                    <a href="/kasir" tabindex="0"
                        class="flex items-center w-full  px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/payments')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        </div>
                        Dashboard
                    </a>
                    </a>
                    <a href="/kasir/customer" tabindex="0"
                        class="flex items-center w-full  px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/customers') || request()->is('kasir/customer/*')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                    
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        Customer
                    </a>
                    <a href="/kasir/riwayat" tabindex="0"
                        class="flex items-center w-full  px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/transaksi')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        Riwayat Transaksi
                    </a>
                    
                </div>
            </div>
            <div class=" ">
                <div class="flex flex-col  px-5 font-semibold mb-2 ">
                    <div class="  items-center w-full  ">
                        <a href="{{ route('akses.logout') }}" tabindex="0"
                            class="flex items-center w-full  px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                ">
                            <div class="grid place-items-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                </svg>
                            </div>
                            Logout
                        </a>
                    </div>
                </div>
                <div tabindex="0"
                    class="flex  border-t bg-[#131542] border-[#33356F] items-center px-10 w-full font-semibold  py-3 
                    ">
                    <div class="grid place-items-center mr-3">
                        <img src="{{ asset('foto/user.png') }}" alt="" class=" rounded-full w-12">
                    </div>
                    <div class="flex flex-col items-center   ">
                        <p class="text-gray-400  font-bold  tracking-wider mb-1 ">
                            {{ auth()->user()->nama }}
                        </p>
                        <p class=" font-medium  text-sm uppercase px-4 bg-green-900 rounded-xl text-green-400">
                            {{ auth()->user()->role }}
                        </p>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</section>
