<div>
    <!--Create Supplier -->
    <div wire:ignore.self id="hs-modal-add-supplier"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">

            <div class="relative flex flex-col bg-white shadow-lg rounded-xl">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-modal-add-supplier">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        Add Supplier
                    </h3>
                    <p class="text-gray-500">
                        create a system supplier.
                    </p>

                    <div class="mt-5">
                        @livewire('suppliers.create-supplier')

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Create Supplier -->





</div>
