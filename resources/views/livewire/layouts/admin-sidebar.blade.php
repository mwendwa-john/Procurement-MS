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
                        href="{{ route('dashboard.admin') }}">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
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
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
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
                    <a href="{{ route('users.new') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            New Users
                        </button>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.inactive') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                            Inactive Accounts
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
                                        stroke="#FFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M9 10L9 11C9 12.6569 10.3431 14 12 14V14C13.6569 14 15 12.6569 15 11L15 10"
                                        stroke="#FFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                    <path d="M7 4H17L19 7H5L7 4Z" stroke="#FFFF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Suppliers
                        </button>
                    </a>
                </li>

                <li>
                    <a href="{{ route('settings.index') }}">
                        <button type="button"
                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white hover:text-white rounded-lg hover:bg-blue-600">

                            <svg class="flex-shrink-0 size-4" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#FFFF" stroke="#FFFF">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>settings</title>
                                    <desc>Created with Sketch Beta.</desc>
                                    <defs> </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                        sketch:type="MSPage">
                                        <g id="Icon-Set" sketch:type="MSLayerGroup"
                                            transform="translate(-101.000000, -360.000000)" fill="#FFFF">
                                            <path
                                                d="M128.52,381.134 L127.528,382.866 C127.254,383.345 126.648,383.508 126.173,383.232 L123.418,381.628 C122.02,383.219 120.129,384.359 117.983,384.799 L117.983,387 C117.983,387.553 117.54,388 116.992,388 L115.008,388 C114.46,388 114.017,387.553 114.017,387 L114.017,384.799 C111.871,384.359 109.98,383.219 108.582,381.628 L105.827,383.232 C105.352,383.508 104.746,383.345 104.472,382.866 L103.48,381.134 C103.206,380.656 103.369,380.044 103.843,379.769 L106.609,378.157 C106.28,377.163 106.083,376.106 106.083,375 C106.083,373.894 106.28,372.838 106.609,371.843 L103.843,370.232 C103.369,369.956 103.206,369.345 103.48,368.866 L104.472,367.134 C104.746,366.656 105.352,366.492 105.827,366.768 L108.582,368.372 C109.98,366.781 111.871,365.641 114.017,365.201 L114.017,363 C114.017,362.447 114.46,362 115.008,362 L116.992,362 C117.54,362 117.983,362.447 117.983,363 L117.983,365.201 C120.129,365.641 122.02,366.781 123.418,368.372 L126.173,366.768 C126.648,366.492 127.254,366.656 127.528,367.134 L128.52,368.866 C128.794,369.345 128.631,369.956 128.157,370.232 L125.391,371.843 C125.72,372.838 125.917,373.894 125.917,375 C125.917,376.106 125.72,377.163 125.391,378.157 L128.157,379.769 C128.631,380.044 128.794,380.656 128.52,381.134 L128.52,381.134 Z M130.008,378.536 L127.685,377.184 C127.815,376.474 127.901,375.749 127.901,375 C127.901,374.252 127.815,373.526 127.685,372.816 L130.008,371.464 C130.957,370.912 131.281,369.688 130.733,368.732 L128.75,365.268 C128.203,364.312 126.989,363.983 126.041,364.536 L123.694,365.901 C122.598,364.961 121.352,364.192 119.967,363.697 L119.967,362 C119.967,360.896 119.079,360 117.983,360 L114.017,360 C112.921,360 112.033,360.896 112.033,362 L112.033,363.697 C110.648,364.192 109.402,364.961 108.306,365.901 L105.959,364.536 C105.011,363.983 103.797,364.312 103.25,365.268 L101.267,368.732 C100.719,369.688 101.044,370.912 101.992,371.464 L104.315,372.816 C104.185,373.526 104.099,374.252 104.099,375 C104.099,375.749 104.185,376.474 104.315,377.184 L101.992,378.536 C101.044,379.088 100.719,380.312 101.267,381.268 L103.25,384.732 C103.797,385.688 105.011,386.017 105.959,385.464 L108.306,384.099 C109.402,385.039 110.648,385.809 112.033,386.303 L112.033,388 C112.033,389.104 112.921,390 114.017,390 L117.983,390 C119.079,390 119.967,389.104 119.967,388 L119.967,386.303 C121.352,385.809 122.598,385.039 123.694,384.099 L126.041,385.464 C126.989,386.017 128.203,385.688 128.75,384.732 L130.733,381.268 C131.281,380.312 130.957,379.088 130.008,378.536 L130.008,378.536 Z M116,378 C114.357,378 113.025,376.657 113.025,375 C113.025,373.344 114.357,372 116,372 C117.643,372 118.975,373.344 118.975,375 C118.975,376.657 117.643,378 116,378 L116,378 Z M116,370 C113.261,370 111.042,372.238 111.042,375 C111.042,377.762 113.261,380 116,380 C118.739,380 120.959,377.762 120.959,375 C120.959,372.238 118.739,370 116,370 L116,370 Z"
                                                id="settings" sketch:type="MSShapeGroup"> </path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Settings
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