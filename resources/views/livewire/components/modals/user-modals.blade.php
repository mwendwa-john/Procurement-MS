<div>
    <!--  Deactivate Account -->
    <div wire:ignore.self id="deactivate-account-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="deactivate-account-modal-label">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#deactivate-account-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="flex gap-x-4 md:gap-x-7">
                        <!-- Icon -->
                        <span
                            class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-800">
                                Deactivate Account
                            </h3>
                            <p class="text-gray-500 flex flex-col items-center">
                                <span class="text-center font-semibold text-gray-700">Temporarily deactivate this account.</span>
                                This action is reversible, and one can activate the account later.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-100 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#deactivate-account-modal">
                        Cancel
                    </button>

                    <button wire:click='deactivateAccount'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-400 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
                        Deactivate Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: Deactivate Account -->

</div>