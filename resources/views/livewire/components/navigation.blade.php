<div>
    <header class="sticky top-4 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full text-sm">
        <nav class="relative top-4 max-w-[85rem] w-full bg-white border border-gray-200 rounded-[36px] mx-2 py-3 px-4 md:flex md:items-center md:justify-between md:py-0 md:px-6 lg:px-8 xl:mx-auto"
            aria-label="Global">
            <div class="flex items-center justify-between">
                <a class="flex text-xl font-semibold items-center whitespace-nowrap" href="{{ route('home') }}"
                    aria-label="Brand">
                    <img class="w-8 p-2 md:w-10 md:p-1 lg:w-8 me-2"
                        src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="logo">
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
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-collapse-with-animation"
                class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
                <div class="flex flex-col md:flex-row md:items-center md:justify-end py-2 md:py-0 md:ps-7">
                    @auth

                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200"
                        href="{{ route('home') }}" aria-current="page">
                        Home
                    </a>

                    @can('access admin dashboard')
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200"
                        href="{{ route('dashboard.admin') }}">
                        Admin
                    </a>
                    @endcan

                    @if (auth()->user()->is_active)
                    <div
                        class="hs-dropdown [--strategy:static] md:[--strategy:absolute] [--adaptive:none] md:[--trigger:hover] ">
                        <button type="button"
                            class="flex items-center py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200">
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
                                    @can('create lpo')
                                    <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4"
                                        href="{{ route('lpo.create') }}">
                                        <svg class="flex-shrink-0 size-5 mt-1" viewBox="0 -0.5 20 20" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>shopping_cart_plus_round [#1130]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-420.000000, -3120.000000)" fill="#000000">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M371.000402,2972.95319 C371.000402,2972.39688 371.44825,2971.94539 372.000062,2971.94539 L372.999723,2971.94539 L372.999723,2970.57478 C372.999723,2970.01747 373.447571,2969.56698 373.999384,2969.56698 C374.551197,2969.56698 374.999045,2970.01747 374.999045,2970.57478 L374.999045,2971.94539 L375.998705,2971.94539 C376.550518,2971.94539 376.998366,2972.39688 376.998366,2972.95319 C376.998366,2973.5095 376.550518,2973.96099 375.998705,2973.96099 L374.999045,2973.96099 L374.999045,2974.60599 C374.999045,2975.16229 374.551197,2975.61379 373.999384,2975.61379 C373.447571,2975.61379 372.999723,2975.16229 372.999723,2974.60599 L372.999723,2973.96099 L372.000062,2973.96099 C371.44825,2973.96099 371.000402,2973.5095 371.000402,2972.95319 L371.000402,2972.95319 Z M379.457532,2976.16405 C379.367562,2976.63973 378.955702,2976.9844 378.474865,2976.9844 L369.541896,2976.9844 C369.054062,2976.9844 368.636204,2976.62864 368.556231,2976.14187 L367.362636,2968.92198 L380.81707,2968.92198 L379.457532,2976.16405 Z M382.996331,2966.90638 L380.997009,2966.90638 L377.475204,2960.57436 C377.198298,2960.09264 376.587506,2959.83665 376.108668,2960.11481 C375.63083,2960.39296 375.466886,2961.14579 375.743792,2961.62752 L378.688793,2966.90638 L369.309975,2966.90638 L372.254976,2961.58217 C372.531882,2961.10044 372.367938,2960.39296 371.8901,2960.11481 C371.411262,2959.83665 370.800469,2960.13799 370.523563,2960.61972 L367.001758,2966.90638 L365.002437,2966.90638 C363.791848,2966.90638 363.428971,2968.92198 365.335324,2968.92198 L366.722853,2977.31596 C366.883798,2978.28748 367.718515,2979 368.695184,2979 L379.303584,2979 C380.280253,2979 381.114969,2978.28748 381.275915,2977.31596 L382.663444,2968.92198 C384.58979,2968.92198 384.189926,2966.90638 382.996331,2966.90638 L382.996331,2966.90638 Z"
                                                                id="shopping_cart_plus_round-[#1130]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <div class="grow">
                                            <p class="font-medium text-gray-800">Create LPO</p>
                                            <p class="text-sm text-gray-500 group-hover:text-gray-800">Initiate
                                                procurement workflows through streamlined generation of purchase orders
                                            </p>
                                        </div>
                                    </a>
                                    @endcan

                                    <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4"
                                        href="{{ route('lpos.show') }}">
                                        <svg class="flex-shrink-0 size-5 mt-1" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2 1C1.44772 1 1 1.44772 1 2C1 2.55228 1.44772 3 2 3H3.21922L6.78345 17.2569C5.73276 17.7236 5 18.7762 5 20C5 21.6569 6.34315 23 8 23C9.65685 23 11 21.6569 11 20C11 19.6494 10.9398 19.3128 10.8293 19H15.1707C15.0602 19.3128 15 19.6494 15 20C15 21.6569 16.3431 23 18 23C19.6569 23 21 21.6569 21 20C21 18.3431 19.6569 17 18 17H8.78078L8.28078 15H18C20.0642 15 21.3019 13.6959 21.9887 12.2559C22.6599 10.8487 22.8935 9.16692 22.975 7.94368C23.0884 6.24014 21.6803 5 20.1211 5H5.78078L5.15951 2.51493C4.93692 1.62459 4.13696 1 3.21922 1H2ZM18 13H7.78078L6.28078 7H20.1211C20.6742 7 21.0063 7.40675 20.9794 7.81078C20.9034 8.9522 20.6906 10.3318 20.1836 11.3949C19.6922 12.4251 19.0201 13 18 13ZM18 20.9938C17.4511 20.9938 17.0062 20.5489 17.0062 20C17.0062 19.4511 17.4511 19.0062 18 19.0062C18.5489 19.0062 18.9938 19.4511 18.9938 20C18.9938 20.5489 18.5489 20.9938 18 20.9938ZM7.00617 20C7.00617 20.5489 7.45112 20.9938 8 20.9938C8.54888 20.9938 8.99383 20.5489 8.99383 20C8.99383 19.4511 8.54888 19.0062 8 19.0062C7.45112 19.0062 7.00617 19.4511 7.00617 20Z"
                                                    fill="#0F0F0F"></path>
                                            </g>
                                        </svg>

                                        <div class="grow">
                                            <p class="font-medium text-gray-800">Show LPOs</p>
                                            <p class="text-sm text-gray-500 group-hover:text-gray-800">Showcase complete
                                                archive of all local purchase orders.</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="flex flex-col mx-1 md:mx-0">
                                    @can('attach invoice')
                                    <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4"
                                        href="{{ route('lpos.approved') }}">

                                        <svg class="flex-shrink-0 size-5 mt-1" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.55281 1.60553C7.10941 1.32725 7.77344 1 9 1C10.2265 1 10.8906 1.32722 11.4472 1.6055L11.4631 1.61347C11.8987 1.83131 12.2359 1.99991 13 1.99993C14.2371 1.99998 14.9698 1.53871 15.2141 1.35512C15.5944 1.06932 16.0437 1.09342 16.3539 1.2369C16.6681 1.38223 17 1.72899 17 2.24148L17 13H20C21.6562 13 23 14.3415 23 15.999V19C23 19.925 22.7659 20.6852 22.3633 21.2891C21.9649 21.8867 21.4408 22.2726 20.9472 22.5194C20.4575 22.7643 19.9799 22.8817 19.6331 22.9395C19.4249 22.9742 19.2116 23.0004 19 23H5C4.07502 23 3.3148 22.7659 2.71092 22.3633C2.11331 21.9649 1.72739 21.4408 1.48057 20.9472C1.23572 20.4575 1.11827 19.9799 1.06048 19.6332C1.03119 19.4574 1.01616 19.3088 1.0084 19.2002C1.00194 19.1097 1.00003 19.0561 1 19V2.24146C1 1.72899 1.33184 1.38223 1.64606 1.2369C1.95628 1.09341 2.40561 1.06931 2.78589 1.35509C3.03019 1.53868 3.76289 1.99993 5 1.99993C5.76415 1.99993 6.10128 1.83134 6.53688 1.6135L6.55281 1.60553ZM3.00332 19L3 3.68371C3.54018 3.86577 4.20732 3.99993 5 3.99993C6.22656 3.99993 6.89059 3.67269 7.44719 3.39441L7.46312 3.38644C7.89872 3.1686 8.23585 3 9 3C9.76417 3 10.1013 3.16859 10.5369 3.38643L10.5528 3.39439C11.1094 3.67266 11.7734 3.9999 13 3.99993C13.7927 3.99996 14.4598 3.86581 15 3.68373V19C15 19.783 15.1678 20.448 15.4635 21H5C4.42498 21 4.0602 20.8591 3.82033 20.6992C3.57419 20.5351 3.39761 20.3092 3.26943 20.0528C3.13928 19.7925 3.06923 19.5201 3.03327 19.3044C3.01637 19.2029 3.00612 19.1024 3.00332 19ZM19.3044 20.9667C19.5201 20.9308 19.7925 20.8607 20.0528 20.7306C20.3092 20.6024 20.5351 20.4258 20.6992 20.1797C20.8591 19.9398 21 19.575 21 19V15.999C21 15.4474 20.5529 15 20 15H17L17 19C17 19.575 17.1409 19.9398 17.3008 20.1797C17.4649 20.4258 17.6908 20.6024 17.9472 20.7306C18.2075 20.8607 18.4799 20.9308 18.6957 20.9667C18.8012 20.9843 18.8869 20.9927 18.9423 20.9967C19.0629 21.0053 19.1857 20.9865 19.3044 20.9667Z"
                                                    fill="#0F0F0F"></path>
                                                <path
                                                    d="M5 8C5 7.44772 5.44772 7 6 7H12C12.5523 7 13 7.44772 13 8C13 8.55229 12.5523 9 12 9H6C5.44772 9 5 8.55229 5 8Z"
                                                    fill="#0F0F0F"></path>
                                                <path
                                                    d="M5 12C5 11.4477 5.44772 11 6 11H12C12.5523 11 13 11.4477 13 12C13 12.5523 12.5523 13 12 13H6C5.44772 13 5 12.5523 5 12Z"
                                                    fill="#0F0F0F"></path>
                                                <path
                                                    d="M5 16C5 15.4477 5.44772 15 6 15H12C12.5523 15 13 15.4477 13 16C13 16.5523 12.5523 17 12 17H6C5.44772 17 5 16.5523 5 16Z"
                                                    fill="#0F0F0F"></path>
                                            </g>
                                        </svg>
                                        <div class="grow">
                                            <p class="font-medium text-gray-800">Attach Invoice</p>
                                            <p class="text-sm text-gray-500 group-hover:text-gray-800">Simplify
                                                financial tracking by linking invoices to LPO seamlessly.</p>
                                        </div>
                                    </a>
                                    @endcan

                                    <a class="group flex gap-x-5 hover:bg-gray-100 rounded-lg p-4"
                                        href="{{ route('invoices.show') }}">
                                        <svg class="flex-shrink-0 size-5 mt-1" viewBox="0 0 1024 1024" class="icon"
                                            version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M829.06 73.14h-6.48c-30.41 0-58.57 17.11-75.34 45.75-6.12 10.46-22.29 11.71-29.96 2.43-25.52-31.07-59.41-48.18-95.64-48.18-35.98 0-69.86 17.11-95.41 48.18-6.98 8.5-21.25 8.52-28.27-0.02-25.55-31.05-59.43-48.16-95.41-48.16s-69.86 17.11-95.41 48.18c-7.66 9.36-23.82 8.05-29.95-2.43-16.8-28.64-44.96-45.75-75.36-45.75h-7.23c-46.89 0-85.05 38.16-85.05 85.05V865.8c0 46.89 38.16 85.05 85.05 85.05h7.23c30.39 0 58.55-17.11 75.38-45.79 6.07-10.45 22.23-11.79 29.93-2.38 25.55 31.05 59.43 48.16 95.41 48.16s69.86-17.11 95.41-48.18c7.02-8.52 21.29-8.5 28.27 0.02 25.55 31.05 59.43 48.16 95.66 48.16 35.98 0 69.88-17.11 95.38-48.14 7.73-9.36 23.89-8 29.96 2.36 16.79 28.68 44.95 45.79 75.36 45.79h6.48c46.89 0 85.05-38.16 85.05-85.05V158.2c0-46.9-38.17-85.06-85.06-85.06z m11.91 792.66c0 6.57-5.34 11.91-11.91 11.91h-6.48c-6.14 0-10.91-7.34-12.23-9.61-16.36-27.91-46.61-45.25-78.93-45.25-27.43 0-53.16 12.16-70.64 33.39-6.59 8.02-20.41 21.46-39.14 21.46-18.48 0-32.32-13.46-38.91-21.46-34.84-42.45-106.39-42.46-141.27-0.02-6.59 8.02-20.43 21.48-38.91 21.48-18.48 0-32.32-13.46-38.91-21.46-17.43-21.23-43.18-33.39-70.62-33.39-32.36 0-62.61 17.36-78.93 45.25-1.32 2.25-6.11 9.61-12.25 9.61h-7.23c-6.57 0-11.91-5.34-11.91-11.91V158.2c0-6.57 5.34-11.91 11.91-11.91h7.23c6.14 0 10.93 7.36 12.23 9.57 16.34 27.93 46.59 45.29 78.95 45.29 27.45 0 53.2-12.16 70.62-33.38 6.59-8.02 20.43-21.48 38.91-21.48 18.48 0 32.32 13.46 38.91 21.46 34.88 42.48 106.43 42.43 141.27 0.02 6.59-8.02 20.43-21.48 39.16-21.48 18.48 0 32.3 13.45 38.91 21.5 17.46 21.2 43.2 33.36 70.62 33.36 32.32 0 62.57-17.34 78.95-45.29 1.3-2.23 6.07-9.57 12.21-9.57h6.48c6.57 0 11.91 5.34 11.91 11.91v707.6z"
                                                    fill="#0F1F3C"></path>
                                                <path
                                                    d="M255.93 548.66h365.71v73.14H255.93zM255.92 694.93h511.82v73.14H255.92zM621.54 329.23h58l-83.85 83.86 51.71 51.71 83.86-83.85v58h73.14V256.09H621.54z"
                                                    fill="#0F1F3C"></path>
                                            </g>
                                        </svg>
                                        <div class="grow">
                                            <p class="font-medium text-gray-800">Show Invoices</p>
                                            <p class="text-sm text-gray-500 group-hover:text-gray-800">Retrieve and
                                                display invoices seamlessly for transparent financial oversight.</p>
                                        </div>
                                    </a>
                                </div>

                                <div class="flex flex-col pt-4 md:pt-0 mx-1 md:mx-0">
                                    <span class="text-sm font-semibold uppercase text-gray-800">Procurement
                                        Management System</span>

                                    <!-- Link -->
                                    <a class="group mt-2 p-3 flex gap-x-5 items-center rounded-xl hover:bg-gray-100"
                                        href="#">
                                        <img class="size-32 rounded-lg"
                                            src="{{ asset('front-assets/images/superiorLogo.png') }}"
                                            alt="Superior Logo">
                                        <div class="grow">
                                            <p class="text-sm text-gray-800">
                                                Streamline procurement with Superior Hotels' management system.
                                                Efficiently handle LPOs, invoices, approvals, payments, and auditing for
                                                superior operational control.
                                            </p>
                                        </div>
                                    </a>
                                    <!-- End Link -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @can('acess expenses')
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200"
                        href="{{ route('expenses.show') }}" aria-current="page">
                        Expenses
                    </a>
                    @endcan

                    @can('manage products')
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200"
                        href="{{ route('products.show') }}" aria-current="page">
                        Products
                    </a>
                    @endcan

                    @can('access payments')
                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg font-medium text-gray-800 hover:bg-gray-200"
                        href="{{ route('invoice.payments') }}">
                        Payments
                    </a>
                    @endcan

                    @endauth


                    @if (Route::has('login'))
                    <div class="md:border-s md:border-gray-300">
                        @auth
                        <div class="hs-dropdown m-2 relative inline-flex md:ps-6"
                            data-hs-dropdown-placement="bottom-right">
                            <button id="hs-dropdown-with-header" type="button"
                                class="hs-dropdown-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">

                                <img src="{{ Auth::user()->person->profile_photo_path && Storage::exists(Auth::user()->person->profile_photo_path) 
                                ? Storage::url(Auth::user()->person->profile_photo_path)
                                : asset('front-assets/images/superiorLogo.png') }}"
                                    class="inline-block size-[38px] rounded-full ring-2 ring-white" alt="profile" />


                                {{-- <img src="{{ Storage::url(Auth::user()->person->profile_photo_path) }}"
                                    class="inline-block size-[38px] rounded-full ring-2 ring-white" alt="profile" />
                                --}}

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
                                        href="{{ route('user.profile', ['slug' => Auth::user()->slug]) }}">
                                        <svg class="flex-shrink-0 size-5" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <circle cx="12" cy="6" r="4" stroke="#2563EB" stroke-width="1.5">
                                                </circle>
                                                <path
                                                    d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634"
                                                    stroke="#2563EB" stroke-width="1.5" stroke-linecap="round">
                                                </path>
                                            </g>
                                        </svg>
                                        Profile
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
                            <div class="flex">
                                <a class="py-2 my-2 px-4 mx-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="{{ route('register') }}">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Register
                                </a>

                                <a class="py-2 my-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="{{ route('login') }}">
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Sign in
                                </a>
                            </div>
                        </div>
                        @endauth
                    </div>
                    @endif
                </div>
        </nav>
    </header>
</div>