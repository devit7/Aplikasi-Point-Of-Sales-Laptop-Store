<div>
    <div class="max-w-2xl mx-auto">
    
        <!-- Modal toggle -->
        <button class="bg-[#002D4C] border p-1 border-[#2B4F69] rounded-md" data-modal-toggle="default-modal{{$id}}" data-modal-target="default-modal{{ $id }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </button>
    
        <!-- Main modal -->
        <div id="default-modal{{$id}}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative bg-indigo-900 rounded-lg shadow ">
                <!-- Modal content -->
                <div class="p-3 text-center text-indigo-300">
                    {{ $slot }}
                    <!-- Close button -->
                    <div class=" flex justify-end p-5">
                        <button type="button" class="mt-4 bg-red-500 text-white p-2 rounded-md hover:bg-red-600" data-modal-toggle="default-modal{{$id}}">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
