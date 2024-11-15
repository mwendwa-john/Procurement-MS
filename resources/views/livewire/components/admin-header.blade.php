<div
    style="margin-left: -1rem; margin-right: -1rem; margin-top: -2rem; sm:margin-left: -1.5rem; sm:margin-right: -1.5rem; sm:margin-top: -2rem; md:margin-left: -2rem; md:margin-right: -2rem; md:margin-top: -2rem; lg:margin-left: -18rem; lg:margin-right: -18rem; lg:margin-top: -2rem;">
    <header class="w-full bg-white shadow-md p-3 px-4 flex items-center justify-between rounded-2xl">
        <!-- Left side: Page Title -->
        <div class="flex items-center gap-x-2">
            {!! $svgIcon !!}
            <h1 class="text-xl font-bold text-gray-900 mt-1">{{ $pageTitle }}</h1>
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
                            {{ Auth::user()->first_name }} {{ Auth::user()->middle_name }} {{ Auth::user()->last_name }}
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
    </header>
</div>