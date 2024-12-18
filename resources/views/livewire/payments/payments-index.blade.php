<div>
@method('POST')

    {{-- Do your work, then step back. --}}
    <!-- ========== HEADER ========== -->
    <header class="flex flex-wrap  md:justify-start md:flex-nowrap z-50 w-full bg-white border-b border-gray-200">
        <nav
            class="relative max-w-[85rem] w-full mx-auto flex items-center justify-between gap-3 py-2 px-4 sm:px-6 lg:px-8">

            <div class="flex items-center gap-x-1">
                <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80" href="#"
                    aria-label="Brand">
                    Payments
                </a>
            </div>

            <div class="flex items-center gap-x-1">
                {{-- <a class="flex-none font-semibold text-xl text-black focus:outline-none focus:opacity-80" href="#"
                    aria-label="Brand">
                    Superior
                </a> --}}
                <a href="{{ route('home') }}">
                    <img class="w-auto h-10 mx-auto" src="{{ asset('front-assets/images/superiorLogo.png') }}"
                        alt="logo">
                    <span class="text-gray-500">Superior Hotels, Kenya</span>
                </a>
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center gap-2">
                <div class="hidden sm:block">
                    <span class="block text-sm font-semibold text-gray-800">
                        {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}
                    </span>
                    <span class="block text-sm text-gray-500">
                        {{ Auth::user()->roles->pluck('name')->implode(', ') }}
                    </span>
                </div>

                <!-- Image Dropdown -->
                <div class="hs-dropdown relative inline-flex md:ps-6" data-hs-dropdown-placement="bottom-right">
                    <button id="hs-dropdown-with-header" type="button"
                        class="hs-dropdown-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full text-gray-500 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">

                        <img src="{{ Storage::url(Auth::user()->person->profile_photo_path) }}"
                            class="inline-block size-[38px] rounded-full ring-2 ring-white" alt="profile" />
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 z-10 bg-white shadow-2xl rounded-lg p-2"
                        aria-labelledby="hs-dropdown-with-header">
                        <div class="py-3 px-5 -m-2 bg-gray-100 rounded-t-lg sm:hidden">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-sm font-medium text-gray-800">
                                {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{
                                Auth::user()->last_name }}
                            </p>
                            <p class="text-xs font-medium text-gray-800">
                                Role: {{ Auth::user()->roles->pluck('name')->implode(', ') }}
                            </p>
                        </div>

                        <div class="mt-2 py-2 first:pt-0 last:pb-0">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500"
                                href="{{ route('user.profile', ['slug' => Auth::user()->slug]) }}">
                                <svg class="flex-shrink-0 size-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
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
                <!-- End: Image Dropdown -->
            </div>
        </nav>
    </header>
    <!-- ========== END HEADER ========== -->


    <!-- Nav -->
    <nav class="bg-white">
        <div
            class="max-w-[85rem] w-full mx-auto flex flex-wrap justify-between items-center gap-x-3 py-3 px-4 sm:px-6 lg:px-8">
            <!-- Left section: Invoices and Suppliers -->
            <div class="flex justify-between items-center gap-x-3 flex-wrap w-full sm:w-auto">
                <div class="grow flex gap-x-3">
                    <a href="{{ route('invoice.payments') }}">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                            {{ request()->routeIs('invoice.payments') ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                            Invoices
                        </button>
                    </a>

                    <a href="{{ route('supplier.payments') }}">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                            {{ request()->routeIs('supplier.payments') ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                            Suppliers
                        </button>
                    </a>
                </div>
            </div>

            <!-- Middle section: Total amount -->
            <div class="flex justify-end items-center mt-4">
                <div class="text-gray-800 font-medium text-sm">
                    Total amount in cart: 
                    <span class="text-blue-600">
                        Ksh {{ number_format($cartTotal, 2) }}
                        </span>
                </div>
            </div>

            <!-- Right section: Cart and Transactions -->
            <div class="flex gap-x-3 flex-wrap items-center w-full sm:w-auto justify-end mt-3 sm:mt-0">
                <a href="{{ route('payments.show') }}">
                    <button type="button"
                        class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                        {{ request()->routeIs('payments.show') ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                        Transactions
                    </button>
                </a>

                
                @can('make payments on invoice')
                <a href="{{ route('cart') }}">
                    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 shadow-sm hover:bg-green-200 focus:outline-none disabled:opacity-50 disabled:pointer-events-none
                        {{ request()->routeIs('cart') ? 'bg-green-500 text-gray-800' : 'bg-gray-200 text-gray-800' }}">
                        <svg class="flex-shrink-0 size-5 mx-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            fill="#000000">
                            <path class="st0"
                                d="M137.769,423.274c5.7-0.579,9.852-5.666,9.281-11.373l-14.644-109.783c-0.572-5.7-5.666-9.852-11.366-9.272c-5.708,0.58-9.861,5.666-9.281,11.374l14.627,109.774C126.974,419.701,132.06,423.845,137.769,423.274z">
                            </path>
                            <path class="st0"
                                d="M196.851,423.307c5.733-0.286,10.138-5.153,9.844-10.878l-7.272-109.783c-0.286-5.724-5.162-10.13-10.878-9.844c-5.733,0.286-10.13,5.162-9.852,10.886l7.272,109.784C186.258,419.197,191.126,423.602,196.851,423.307z">
                            </path>
                            <path class="st0"
                                d="M385.606,413.993l14.636-109.774c0.572-5.708-3.581-10.794-9.282-11.374c-5.7-0.58-10.794,3.573-11.374,9.272l-14.636,109.783c-0.58,5.707,3.581,10.794,9.281,11.373C379.931,423.845,385.026,419.701,385.606,413.993z">
                            </path>
                            <path class="st0"
                                d="M326.028,413.473l7.263-109.784c0.286-5.724-4.119-10.6-9.836-10.886c-5.733-0.286-10.6,4.119-10.895,9.844l-7.263,109.783c-0.286,5.725,4.119,10.592,9.844,10.878C320.866,423.602,325.742,419.197,326.028,413.473z">
                            </path>
                            <path class="st0"
                                d="M256.42,424.409c5.734,0,10.374-4.649,10.374-10.374l-0.008-110.867c0-5.724-4.649-10.374-10.382-10.374c-5.725,0-10.374,4.65-10.374,10.374l0.008,110.867C246.038,419.76,250.687,424.409,256.42,424.409z">
                            </path>
                            <polygon class="st0"
                                points="424.016,450.68 87.976,450.68 60.814,252.467 24.237,252.467 55.653,487.006 456.347,487.006 487.755,252.467 451.186,252.467">
                            </polygon>
                            <path class="st0"
                                d="M404.848,167.711L337.722,37.635c-5.91-11.459-20-15.947-31.458-10.038c-11.458,5.91-15.964,19.999-10.046,31.458l56.073,108.656H159.693l56.09-108.656c5.901-11.459,1.412-25.548-10.054-31.458c-11.45-5.91-25.54-1.421-31.458,10.038l-67.127,130.076H0v69.188h512v-69.188H404.848z">
                            </path>
                        </svg>
                        Cart ({{ $cartCount }})
                    </button>
                </a>
                @endcan

            </div>
            
        </div>
    </nav>

    <!-- End Nav -->


</div>