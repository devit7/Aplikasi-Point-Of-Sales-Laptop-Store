<section id="sidebar" class="top-0 left-0 bottom-0 hidden lg:block border-r border-[#33356F] ">
    <div class="relative flex flex-col bg-[#131432] h-full w-full ">
        <nav class="flex flex-col w-[280px] h-full justify-between  font-sans text-base font-normal text-[#62748E]">
            <div class="flex flex-col ">
                <div class="h-[80px] text-center items-center flex justify-center border-b border-[#33356F]">
                    <h1 class="font-semibold text-3xl text-gray-500">POS Admin</h1>
                </div>
                <div class="flex flex-col py-6 px-5 gap-1 font-semibold">
                    <p class="text-gray-400 text-sm font-bold  tracking-wider pb-4">
                        MAIN
                    </p>
                    <a href="/admin" tabindex="0"
                        class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('admin')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                            </svg>
                        </div>
                        Dashboard
                    </a>
                    <div class="flex flex-col gap-0 font-semibold ">
                        <button type="button"
                            class="flex items-center py-3 px-6 w-full text-start outline-none rounded-lg leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946]"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Management</span>
                            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="hidden py-2 space-y-2">
                            <li>

                                <a href="{{ route('user.index') }}"
                                    class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none pl-11
                                @if (request()->is('api/users')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                                ">User</a>
                            </li>
                            <li>
                                <a href="/admin/product"
                                    class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none pl-11
                                @if (request()->is('api/products')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                                ">Product</a>

                            </li>
                            <li>
                                <a href="/admin/supplier"
                                    class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none pl-11
                                @if (request()->is('api/suppliers')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                                ">Supplier</a>
                            </li>
                            <li>
                                <a href="/admin/merk"
                                    class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none pl-11
                                @if (request()->is('api/merk')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                                ">Merk</a>
                            </li>
                            <li>
                                <a href="/admin/payment"
                                    class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none pl-11
                                @if (request()->is('api/payments')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                                ">Payment</a>
                            </li>
                        </ul>
                    </div>
                    <div class="py-2 ">
                        <hr class=" border-[#33356f]">
                    </div>
                    <p class="text-gray-400 text-sm font-bold tracking-wider py-4">OTHER</p>
                    <a href="/admin/customer" tabindex="0"
                        class=" flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/customers')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        Customers
                    </a>
                    <a href="/admin/laporan" role="button" tabindex="0"
                        class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/transaksi')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                        </div>
                        Laporan
                    </a>
                    <a href="/admin/setting" role="button" tabindex="0"
                        class="flex items-center w-full px-6 py-3 rounded-lg text-start leading-tight transition-all hover:bg-[#aa5800] hover:bg-opacity-10 hover:text-[#e07946] outline-none
                    @if (request()->is('api/toko')) bg-[#aa5800] bg-opacity-10 text-[#e07946] @endif
                    ">
                        <div class="grid place-items-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </div>
                        Settings
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

@push('scripts')
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endpush
