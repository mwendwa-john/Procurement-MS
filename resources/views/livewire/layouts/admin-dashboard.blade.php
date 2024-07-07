<div>

    <!-- ========== MAIN CONTENT ========== -->
    <!-- Sidebar Toggle -->
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 md:px-8 lg:hidden">
        <div class="flex items-center py-4">
            <!-- Navigation Toggle -->
            <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#application-sidebar-brand"
                aria-controls="application-sidebar-brand" aria-label="Toggle navigation">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="size-5" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <!-- End Navigation Toggle -->
        </div>
    </div>
    <!-- End Sidebar Toggle -->

    <!-- Sidebar -->
    <div id="application-sidebar-brand"
        class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-blue-700 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
        <div class="px-6">
            <a class="flex-none text-xl font-semibold text-white flex flex-col items-center" href="{{ route('home') }}"
                aria-label="Brand">
                <img class="w-8" src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="logo">
                <span class="mt-2 sm:mt-4">{{ config('app.name') }}</span>
            </a>

        </div>

        <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
            <ul class="space-y-1.5">
                <li>
                    <a class="flex items-center gap-x-3 py-2 px-2.5 bg-blue-600 text-sm text-white rounded-lg"
                        href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.show') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Users
                        </button>
                    </a>
                </li>


                <li>
                    <a href="{{ route('roles.index') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">

                            <svg class="flex-shrink-0 size-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                                fill="#ffffff">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="m 3 1 c -1.644531 0 -3 1.355469 -3 3 v 2 h 1 s 1 0 1 -1 v -1 c 0 -0.570312 0.429688 -1 1 -1 h 1 s 1 0 1 -1 v -1 z m 8 0 v 1 c 0 1 1 1 1 1 h 1 c 0.570312 0 1 0.429688 1 1 v 1 c 0 1 1 1 1 1 h 1 v -2 c 0 -1.644531 -1.355469 -3 -3 -3 z m -5 4.019531 c -0.550781 0 -1 0.445313 -1 1 c 0 0.550781 0.449219 1 1 1 s 1 -0.449219 1 -1 c 0 -0.554687 -0.449219 -1 -1 -1 z m 4 0 c -0.550781 0 -1 0.445313 -1 1 c 0 0.550781 0.449219 1 1 1 s 1 -0.449219 1 -1 c 0 -0.554687 -0.449219 -1 -1 -1 z m -5.574219 3.988281 c -0.050781 0.003907 -0.101562 0.023438 -0.148437 0.046876 c -0.246094 0.121093 -0.347656 0.421874 -0.226563 0.667968 c 0 0 1.183594 2.277344 3.949219 2.277344 s 3.949219 -2.277344 3.949219 -2.277344 c 0.121093 -0.246094 0.019531 -0.546875 -0.226563 -0.667968 c -0.246094 -0.125 -0.546875 -0.023438 -0.671875 0.222656 c 0 0 -0.816406 1.722656 -3.050781 1.722656 s -3.050781 -1.722656 -3.050781 -1.722656 c -0.097657 -0.195313 -0.308594 -0.304688 -0.523438 -0.269532 z m -4.425781 0.992188 v 2 c 0 1.644531 1.355469 3 3 3 h 2 v -2 h -2 c -0.570312 0 -1 -0.429688 -1 -1 v -1 c 0 -1 -1 -1 -1 -1 z m 15 0 c -1 0 -1 1 -1 1 v 1 c 0 0.570312 -0.429688 1 -1 1 h -2 v 2 h 2 c 1.644531 0 3 -1.355469 3 -3 v -2 z m 0 0"
                                        fill="#FFFFFF"></path>
                                </g>
                            </svg>
                            Roles & Permisssions
                        </button>
                    </a>
                </li>


                <li class="hs-accordion" id="station-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-white hs-accordion-active:hover:bg-transparent text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
                        <svg class="flex-shrink-0 size-4" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M3 21H5M5 21H10M5 21V3M10 21H14M10 21V16L8 16C10 13.3333 14 13.3333 16 16L14 16V21M14 21H19M19 21H21M19 21V3M3 3H5M5 3H19M19 3H21M9 6.5H10M14 6.5H15M9 10.5H10M14 10.5H15"
                                    stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        Stations

                        <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m18 15-6-6-6 6" />
                        </svg>

                        <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>

                    <div id="station-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="pt-2 ps-2">
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600"
                                    href="{{ route('locations.show') }}">
                                    Locations
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600"
                                    href="{{ route('hotels.show') }}">
                                    Hotels
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('suppliers.show') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">

                            <svg class="flex-shrink-0 size-4" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M5 7H19V17C19 18.6569 17.6569 20 16 20H8C6.34315 20 5 18.6569 5 17V7Z"
                                        stroke="#FFFF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M9 10L9 11C9 12.6569 10.3431 14 12 14V14C13.6569 14 15 12.6569 15 11L15 10"
                                        stroke="#FFFF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M7 4H17L19 7H5L7 4Z" stroke="#FFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Suppliers
                        </button>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Content -->
    <!-- Hero -->
    <div class="min-h-screen bg-[#DDEBFE]">
        <div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72">
            <!-- your content goes here ... -->
            @yield('admin-content')
        </div>
    </div>
    <!-- End Hero -->



    <!-- End Content -->

    <!-- ========== END MAIN CONTENT ========== -->
</div>
