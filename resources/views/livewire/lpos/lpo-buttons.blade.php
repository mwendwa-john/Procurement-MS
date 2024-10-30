<div class="flex flex-wrap justify-between items-center my-6">
    <div class="flex flex-wrap items-center space-x-3 mb-4 sm:mb-0">
        <div class="inline-flex flex-wrap rounded-lg shadow-sm">
            <!-- All LPOs -->
            <a href="{{ route('lpos.show') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-blue-500 text-white shadow-sm hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    All LPOs
                </button>
            </a>

            <!-- Created LPOs -->
            <a href="{{ route('lpos.created') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-emerald-500 text-white shadow-sm hover:bg-emerald-400 focus:outline-none focus:bg-emerald-400">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    Created LPOs
                </button>
            </a>

            <!-- Posted LPOs -->
            <a href="{{ route('lpos.posted') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-teal-400 text-white shadow-sm hover:bg-teal-300 focus:outline-none focus:bg-teal-300">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    Posted LPOs
                </button>
            </a>

            <!-- Daily LPOs -->
            <a href="{{ route('lpos.daily') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-indigo-500 text-white shadow-sm hover:bg-indigo-400 focus:outline-none focus:bg-indigo-400">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    Daily LPOs
                </button>
            </a>

            <!-- Approved LPOs -->
            <a href="{{ route('lpos.approved') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-violet-500 text-white shadow-sm hover:bg-violet-400 focus:outline-none focus:bg-violet-400">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    Approved LPOs
                </button>
            </a>

            <!-- Approved LPOs -->
            <a href="{{ route('lpos.invoice.attached') }}"
                class="py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg first:ms-0 last:rounded-e-lg text-sm font-medium focus:z-10 border border-gray-200 bg-cyan-500 text-white shadow-sm hover:bg-cyan-400 focus:outline-none focus:bg-cyan-400">
                <button type="button" class="disabled:opacity-50 disabled:pointer-events-none">
                    Invoice attached LPOs
                </button>
            </a>

        </div>
    </div>

    <div class="flex flex-wrap items-center space-x-3">
        {{-- @can('manage suppliers') --}}
        <a href="{{ route('lpos.trashed') }}">
            <button
                class="inline-flex items-center gap-x-2 bg-red-400 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-red-300 transition duration-300">
                <svg class="flex-shrink-0 size-4" fill="#ffffff" viewBox="0 0 32 32" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>recycle</title>
                        <path
                            d="M15.966 1.232c-0.97 0.021-1.901 0.261-2.807 0.655l1.404 2.62c0.463-0.165 0.937-0.277 1.404-0.281 1.599 0 3.292 0.853 4.585 3.088l5.333 9.264 1.778-2.901-4.491-7.86c-1.714-2.964-4.434-4.608-7.205-4.585 0 0 0 0 0 0zM7.171 8.811l-4.117 7.205c-1.569 2.715-1.68 5.792-0.374 8.234 0.541 1.012 1.362 1.842 2.339 2.526l1.497-2.526c-0.502-0.397-0.929-0.867-1.216-1.403-0.781-1.46-0.831-3.41 0.281-5.334l5.053-8.702h-3.462zM27.194 21.536c-0.098 0.48-0.239 0.896-0.468 1.311-0.801 1.448-2.372 2.526-4.866 2.526h-10.199l1.778 2.994h8.421c3.402 0 6.146-1.601 7.486-4.023 0.472-0.855 0.732-1.824 0.842-2.807l-2.994 0zM11.272 12.6l-6.728-3.879 6.728-3.879-0 7.759zM22.219 15.005l6.728 3.879 0-7.759-6.729 3.879zM8.193 26.81l6.728-3.879 0 7.759-6.729-3.879z">
                        </path>
                    </g>
                </svg>
                Trashed LPOs
            </button>
        </a>
        {{-- @endcan --}}

        @can('create lpo')
        <a href="{{ route('lpo.create') }}">
            <button
                class="inline-flex items-center gap-x-2 bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Create LPO
            </button>
        </a>
        @endcan
    </div>
</div>
