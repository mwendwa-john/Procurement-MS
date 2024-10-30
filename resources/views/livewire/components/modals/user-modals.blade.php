<div>

    <!--  Add User -->
    <div wire:ignore.self id="hs-send-user-email-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-send-user-email-modal-label">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">

            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                
                <div class="flex justify-end items-center py-3 px-4">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-send-user-email-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        Add User
                    </h3>
                    <p class="text-gray-500">
                        Send a welcome email to the email:
                    </p>

                    <div class="mt-5">
                        <x-livewire-forms submitAction="sendWelcomeMail" formId="sendWelcomeMailForm">
                            @csrf

                            <!-- Form Group - User Email -->
                            <div>
                                <label for="email" class="block font-medium text-sm mb-2 text-start">
                                    User Email
                                </label>
                                <div class="relative">
                                    <input wire:model.live="email" type="email" id="email" name="email"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        required aria-describedby="email">
                
                                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                                            aria-hidden="true">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                    </div>
                                </div>
                
                                @error('email')
                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- End Form Group -->



                            <!-- Buttons - Cancel and Create Product -->
                            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#hs-send-user-email-modal">
                                    Cancel
                                </button>
                
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    Send welcome mail
                                </button>
                            </div>
                            <!-- End Buttons -->
                    
                        </x-livewire-forms>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  End: Add User -->



    
    <!--  Assign hotel -->
    <div wire:ignore.self id="hs-assign-hotel-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-assign-hotel-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-assign-hotel-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-6 space-y-6">
                    <div class="flex gap-x-4">
                        <!-- Icon -->
                        <span
                            class="flex-shrink-0 w-12 h-12 sm:w-16 sm:h-16 flex items-center justify-center rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
                            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="24" fill="white"></rect>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5 9.5C5 7.01472 7.01472 5 9.5 5C11.9853 5 14 7.01472 14 9.5C14 11.9853 11.9853 14 9.5 14C7.01472 14 5 11.9853 5 9.5Z"
                                    fill="#1D4ED8"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.64115 15.6993C5.87351 15.1644 7.49045 15 9.49995 15C11.5112 15 13.1293 15.1647 14.3621 15.7008C15.705 16.2847 16.5212 17.2793 16.949 18.6836C17.1495 19.3418 16.6551 20 15.9738 20H3.02801C2.34589 20 1.85045 19.3408 2.05157 18.6814C2.47994 17.2769 3.29738 16.2826 4.64115 15.6993Z"
                                    fill="#1D4ED8"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.7071 2.29289C22.0976 2.68342 22.0976 3.31658 21.7071 3.70711L18.2071 7.20711C17.5404 7.87377 16.4596 7.87377 15.7929 7.20711L14.2929 5.70711C13.9024 5.31658 13.9024 4.68342 14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289L17 5.58579L20.2929 2.29289C20.6834 1.90237 21.3166 1.90237 21.7071 2.29289Z"
                                    fill="#1D4ED8"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="flex-1">
                            
                            @livewire('user.assign-hotel')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--  End: Assign hotel -->



    <!--  Activate Account -->
    <div wire:ignore.self id="hs-activate-account-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-activate-account-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-activate-account-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="flex gap-x-4 md:gap-x-7">
                        <!-- Icon -->
                        <span
                            class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
                            {{-- <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg> --}}

                            <svg class="flex-shrink-0 size-8" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect width="24" height="24" fill="white"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5 9.5C5 7.01472 7.01472 5 9.5 5C11.9853 5 14 7.01472 14 9.5C14 11.9853 11.9853 14 9.5 14C7.01472 14 5 11.9853 5 9.5Z"
                                        fill="#1D4ED8"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.64115 15.6993C5.87351 15.1644 7.49045 15 9.49995 15C11.5112 15 13.1293 15.1647 14.3621 15.7008C15.705 16.2847 16.5212 17.2793 16.949 18.6836C17.1495 19.3418 16.6551 20 15.9738 20H3.02801C2.34589 20 1.85045 19.3408 2.05157 18.6814C2.47994 17.2769 3.29738 16.2826 4.64115 15.6993Z"
                                        fill="#1D4ED8"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21.7071 2.29289C22.0976 2.68342 22.0976 3.31658 21.7071 3.70711L18.2071 7.20711C17.5404 7.87377 16.4596 7.87377 15.7929 7.20711L14.2929 5.70711C13.9024 5.31658 13.9024 4.68342 14.2929 4.29289C14.6834 3.90237 15.3166 3.90237 15.7071 4.29289L17 5.58579L20.2929 2.29289C20.6834 1.90237 21.3166 1.90237 21.7071 2.29289Z"
                                        fill="#1D4ED8"></path>
                                </g>
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-800">
                                Activate Account
                            </h3>
                            <p class="text-gray-500 flex flex-col items-center">
                                <span class="text-center font-semibold text-gray-700">
                                    Activate this account.
                                </span>
                                This action is reversible, and one can deactivate the account later.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-activate-account-modal">
                        Cancel
                    </button>

                    <button wire:click='activateAccount'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                        Activate Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: Activate Account -->




    <!--  Deactivate Account -->
    <div wire:ignore.self id="deactivate-account-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="deactivate-account-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#deactivate-account-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
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
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
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
                                <span class="text-center font-semibold text-gray-700">
                                    Temporarily deactivate this account.
                                </span>
                                This action is reversible, and one can activate the account later.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
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




    <!--  Delete Account -->
    <div wire:ignore.self id="hs-delete-account-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-delete-account-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-account-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
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
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-800">
                                Delete Account
                            </h3>
                            <p class="text-gray-500 flex flex-col items-center">
                                <span class="text-center font-semibold text-gray-700">
                                    Temporarily delete this account.
                                </span>
                                This action soft deletes the account, it is reversible, and one can restore the account later.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-account-modal">
                        Cancel
                    </button>

                    <button wire:click='deleteAccount'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-400 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
                        Delete Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: Delete Account -->




    <!--  Restore Account -->
    <div wire:ignore.self id="hs-restore-user-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-restore-user-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-restore-user-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="flex gap-x-4 md:gap-x-7">
                        <!-- Icon -->
                        <span
                            class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-blue-50 bg-blue-100 text-blue-500">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-800">
                                Restore Account
                            </h3>
                            <p class="text-gray-500 flex flex-col items-center">
                                <span class="text-center font-semibold text-gray-700">
                                    Restore this account.
                                </span>
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-restore-user-modal">
                        Cancel
                    </button>

                    <button wire:click='restoreAccount'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-500 text-white hover:bg-blue-600 disabled:opacity-50 disabled:pointer-events-none">
                        Restore Account
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: Restore Account -->

</div>