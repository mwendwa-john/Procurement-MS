<div>
    <header class="sticky top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full text-sm">
        <nav class="relative top-4 max-w-[85rem] w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex text-xl font-semibold items-center whitespace-nowrap" href="{{ route('home') }}"
                    aria-label="Brand">
                    <img class="w-8 p-2 md:w-10 md:p-1 lg:w-8" src="{{ asset('front-assets/images/superiorLogo.png') }}"
                        alt="logo">
                    <span>{{ config('app.name') }}</span>
                </a>

                <div class="md:hidden">
                    <button type="button"
                        class="hs-collapse-toggle size-8 flex justify-center items-center text-sm font-semibold rounded-full border border-gray-200 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-collapse="#navbar-collapse-with-animation"
                        aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
                <div class="flex flex-col md:flex-row md:items-center md:justify-end py-2 md:py-0 md:ps-7">
                    <a class="py-3 ps-px md:px-3 font-medium text-blue-600" href="{{ route('home') }}"
                        aria-current="page">Home</a>
                    <a class="py-3 ps-px md:px-3 font-medium text-gray-700 hover:text-gray-400"
                        href="{{ route('dump') }}">Dump</a>

                    @can('access admin dashboard')
                        <a class="py-3 ps-px md:px-3 font-medium text-gray-700 hover:text-gray-400"
                            href="{{ route('dashboard.admin') }}">Admin</a>
                    @endcan

                    <a class="py-3 ps-px md:px-3 font-medium text-gray-700 hover:text-gray-400" href="#">Blog</a>

                    @auth
                        {{-- Start: Resources --}}
                        <div
                            class="hs-dropdown [--strategy:static] md:[--strategy:absolute] [--adaptive:none] md:[--trigger:hover] py-3 md:px-3 md:py-4">
                            <button type="button"
                                class="flex items-center w-full text-gray-700 hover:text-gray-400 font-medium">
                                Dashboard
                                <svg class="flex-shrink-0 ms-2 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div
                                class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 w-full hidden z-10 top-full start-0 min-w-60 bg-white md:shadow-2xl rounded-lg py-2 md:p-4 before:absolute before:-top-5 before:start-0 before:w-full before:h-5">
                                <div class="md:grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div class="flex flex-col mx-1 md:mx-0">
                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">Support Docs</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Explore
                                                    advice and explanations for all of Preline's features.</p>
                                            </div>
                                        </a>

                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <rect width="7" height="7" x="14" y="3" rx="1" />
                                                <path
                                                    d="M10 21V8a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H3" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">Integrations</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Discover the
                                                    huge range of tools that Preline integrates with.</p>
                                            </div>
                                        </a>

                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m7 11 2-2-2-2" />
                                                <path d="M11 13h4" />
                                                <rect width="18" height="18" x="3" y="3" rx="2"
                                                    ry="2" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">API Reference</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Build custom
                                                    integrations with our first-class API.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="flex flex-col mx-1 md:mx-0">
                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10" />
                                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                                <path d="M12 17h.01" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">Help Center</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Learn how to
                                                    install, set up, and use Preline.</p>
                                            </div>
                                        </a>

                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="4" />
                                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">Roles</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Customize system
                                                    roles.</p>
                                            </div>
                                        </a>

                                        <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4" href="#">
                                            <svg class="flex-shrink-0 size-5 mt-1" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            </svg>
                                            <div class="grow">
                                                <p class="font-medium text-gray-800">Permisions</p>
                                                <p class="text-sm text-gray-500 group-hover:text-gray-800">Customize system
                                                    Permisions</p>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="flex flex-col pt-4 md:pt-0 mx-1 md:mx-0">
                                        <span class="text-sm font-semibold uppercase text-gray-800">Customer
                                            stories</span>

                                        <!-- Link -->
                                        <a class="group mt-2 p-3 flex gap-x-5 items-center rounded-xl hover:bg-gray-100"
                                            href="#">
                                            <img class="size-32 rounded-lg"
                                                src="https://images.unsplash.com/photo-1648737967328-690548aec14f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&h=320&q=80"
                                                alt="Image Description">
                                            <div class="grow">
                                                <p class="text-sm text-gray-800">
                                                    Preline Projects has proved to be most efficient cloud based project
                                                    tracking and bug tracking tool.
                                                </p>
                                                <p
                                                    class="mt-3 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium">
                                                    Learn more
                                                    <svg class="flex-shrink-0 size-4 transition ease-in-out group-hover:translate-x-1"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m9 18 6-6-6-6" />
                                                    </svg>
                                                </p>
                                            </div>
                                        </a>
                                        <!-- End Link -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End: Resources --}}
                    @endauth


                    <div
                        class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] py-3 ps-px md:px-3">
                        <button type="button"
                            class="flex items-center w-full text-gray-700 hover:text-gray-400 font-medium">
                            Dropdown
                            <svg class="flex-shrink-0 ms-2 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>

                        <div
                            class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 bg-white md:shadow-md rounded-lg p-2 md: before:absolute top-full md:border before:-top-5 before:start-0 before:w-full before:h-5">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                href="#">
                                About
                            </a>
                            <div
                                class="hs-dropdown [--strategy:static] md:[--strategy:absolute] [--adaptive:none] md:[--trigger:hover] relative">
                                <button type="button"
                                    class="w-full flex justify-between items-center text-sm text-gray-800 rounded-lg py-2 px-3 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500">
                                    Sub Menu
                                    <svg class="sm:-rotate-90 flex-shrink-0 ms-2 size-4 text-gray-500"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </button>

                                <div
                                    class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 bg-white md:shadow-md rounded-lg p-2 md: before:absolute md:border before:-end-5 before:top-0 before:h-full before:w-5 !mx-[10px] top-0 end-full">
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        About
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Downloads
                                    </a>
                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                        href="#">
                                        Team Account
                                    </a>
                                </div>
                            </div>

                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                href="#">
                                Downloads
                            </a>
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                href="#">
                                Team Account
                            </a>
                        </div>
                    </div>

                    @if (Route::has('login'))
                        <div class="md:border-s md:border-gray-300">
                            @auth
                                <div class="hs-dropdown relative inline-flex md:ps-6"
                                    data-hs-dropdown-placement="bottom-right">
                                    <button id="hs-dropdown-with-header" type="button"
                                        class="hs-dropdown-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">

                                        <img src="{{ Storage::url(Auth::user()->person->profile_photo_path) }}"
                                            class="inline-block size-[38px] rounded-full ring-2 ring-white"
                                            alt="profile" />
                                    </button>

                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 z-10 bg-white shadow-md rounded-lg p-2"
                                        aria-labelledby="hs-dropdown-with-header">
                                        <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg">
                                            <p class="text-sm text-gray-500">Signed in as</p>
                                            <p class="text-sm font-medium text-gray-800">
                                                {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }}
                                                {{ Auth::user()->last_name }}
                                            </p>
                                        </div>
                                        <div class="mt-2 py-2 first:pt-0 last:pb-0">
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                href="#">
                                                <svg class="flex-shrink-0 size-5" viewBox="0 -0.5 25 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.918 10.0005H7.082C6.66587 9.99708 6.26541 10.1591 5.96873 10.4509C5.67204 10.7427 5.50343 11.1404 5.5 11.5565V17.4455C5.5077 18.3117 6.21584 19.0078 7.082 19.0005H9.918C10.3341 19.004 10.7346 18.842 11.0313 18.5502C11.328 18.2584 11.4966 17.8607 11.5 17.4445V11.5565C11.4966 11.1404 11.328 10.7427 11.0313 10.4509C10.7346 10.1591 10.3341 9.99708 9.918 10.0005Z"
                                                            stroke="#2563EB" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.918 4.0006H7.082C6.23326 3.97706 5.52559 4.64492 5.5 5.4936V6.5076C5.52559 7.35629 6.23326 8.02415 7.082 8.0006H9.918C10.7667 8.02415 11.4744 7.35629 11.5 6.5076V5.4936C11.4744 4.64492 10.7667 3.97706 9.918 4.0006Z"
                                                            stroke="#2563EB" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.082 13.0007H17.917C18.3333 13.0044 18.734 12.8425 19.0309 12.5507C19.3278 12.2588 19.4966 11.861 19.5 11.4447V5.55666C19.4966 5.14054 19.328 4.74282 19.0313 4.45101C18.7346 4.1592 18.3341 3.9972 17.918 4.00066H15.082C14.6659 3.9972 14.2654 4.1592 13.9687 4.45101C13.672 4.74282 13.5034 5.14054 13.5 5.55666V11.4447C13.5034 11.8608 13.672 12.2585 13.9687 12.5503C14.2654 12.8421 14.6659 13.0041 15.082 13.0007Z"
                                                            stroke="#2563EB" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.082 19.0006H17.917C18.7661 19.0247 19.4744 18.3567 19.5 17.5076V16.4936C19.4744 15.6449 18.7667 14.9771 17.918 15.0006H15.082C14.2333 14.9771 13.5256 15.6449 13.5 16.4936V17.5066C13.525 18.3557 14.2329 19.0241 15.082 19.0006Z"
                                                            stroke="#2563EB" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </g>
                                                </svg>
                                                Dashboard
                                            </a>

                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                href="{{ route('user.profile', ['slug' => Auth::user()->slug]) }}">
                                                <svg class="flex-shrink-0 size-5" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <circle cx="12" cy="6" r="4" stroke="#2563EB"
                                                            stroke-width="1.5"></circle>
                                                        <path
                                                            d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634"
                                                            stroke="#2563EB" stroke-width="1.5" stroke-linecap="round">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Profile
                                            </a>

                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                                href="#">
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                                    <path d="M12 12v9" />
                                                    <path d="m8 17 4 4 4-4" />
                                                </svg>
                                                Downloads
                                            </a>

                                            <hr class="border-blue-300">

                                            <div class="text-center">
                                                <button type="button"
                                                    class="py-2 px-4 my-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                    data-hs-overlay="#hs-sign-out-alert">
                                                    Sign Out
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="pt-3 md:pt-0 md:ps-6">
                                    <a class="py-2 my-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('login') }}">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        Sign in
                                    </a>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
        </nav>
    </header>
</div>
