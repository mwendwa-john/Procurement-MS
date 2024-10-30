<div class="bg-sky-50">
    @livewire('components.modals.lpo-modals')


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-r from-indigo-300/50 via-violet-200 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-purple-50 via-violet-100 to-indigo-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div>

            {{-- <div
                class="bg-gradient-to-r from-cyan-300/50 via-blue-200 to-indigo-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-indigo-50 via-cyan-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div> --}}

            {{-- <div
                class="bg-gradient-to-r from-green-300/50 via-lime-200 to-teal-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-teal-50 via-green-100 to-lime-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div> --}}


        </div>
        <!-- End Gradients -->

        <!-- ========== HEADER ========== -->
        @livewire('components.navigation')
        <!-- ========== END HEADER ========== -->

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <a href="#"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        Show trashed LPOs
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-red-400 text-xl md:text-3xl lg:text-4xl">
                            Trashed Local Purchase Orders
                        </h1>
                    </div>
                    <!-- End Title -->

                </div>


                <div class="flex justify-end items-center mt-4">
                    <a href="{{ route('lpos.show') }}">
                        <button
                            class="inline-flex items-center gap-x-2 bg-blue-600 text-white font-bold py-2 px-4 mx-3 rounded-lg hover:bg-blue-500 transition duration-300">
            
                            <svg class="flex-shrink-0 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                stroke="">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M4 12L10 6M4 12L10 18M4 12H14.5M20 12H17.5" stroke="#ffffff" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                            Back
                        </button>
                    </a>
                </div>



                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">
                    <!-- Table Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

                        <!-- Card -->
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div
                                        class="bg-white border border-t-4 border-t-blue-600 rounded-xl shadow-sm overflow-hidden">
                                        <!-- Header -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                            <div>
                                                <h2 class="text-xl font-semibold text-blue-600">
                                                    LPOs
                                                </h2>
                                                <p class="text-sm text-blue-500">
                                                    Add roles, edit and more.
                                                </p>
                                            </div>


                                        </div>
                                        <!-- End Header -->

                                        <!-- Table -->
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="ps-6 py-3 text-start">
                                                        <div class="flex items-center gap-x-2">
                                                            <span
                                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                                #
                                                            </span>
                                                        </div>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <div class="flex items-center gap-x-2">
                                                            <span
                                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                                Hotel
                                                            </span>
                                                        </div>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <div class="flex items-center gap-x-2">
                                                            <span
                                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                                Supplier
                                                            </span>
                                                        </div>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <div class="flex items-center gap-x-2">
                                                            <span
                                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                                Order Number
                                                            </span>
                                                        </div>
                                                    </th>

                                                    @can('manage lpos')
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <div class="flex items-center gap-x-2">
                                                            <span
                                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                                Action
                                                            </span>
                                                        </div>
                                                    </th>
                                                    @endcan
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($trashedLpos as $lpo)
                                                <tr>
                                                    <td class="size-px whitespace-nowrap">
                                                        <div class="ps-6 py-3 text-blue-600">
                                                            <div class="block text-sm font-semibold">
                                                                {{ $loop->index + 1 }}
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="size-px whitespace-nowrap">
                                                        <div class="px-6 py-1.5">
                                                            <div class="flex text-sm items-center gap-x-3">
                                                                <span class="block font-semibold text-gray-800">
                                                                    {{ $lpo->hotel->hotel_name }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="size-px whitespace-nowrap">
                                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                                            <div class="flex text-sm items-center gap-x-3">
                                                                {{ $lpo->supplier->supplier_name }}
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="size-px whitespace-nowrap">
                                                        <div class="px-6 py-1.5">
                                                            <div class="flex text-sm items-center gap-x-3">
                                                                {{ $lpo->lpo_order_number }}
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="size-px whitespace-nowrap">
                                                        @can('manage lpos')
                                                        <div class="px-6 py-1.5">
                                                            <button
                                                                wire:click="$dispatch('pass-lpo-id', { id: '{{ $lpo->id }}' })"
                                                                class="inline-flex text-sm items-center gap-x-1 px-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                                data-hs-overlay="#hs-modal-restore-lpo">
                                                                Restore
                                                            </button>
                                                        </div>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                                            <div class="flex justify-center items-center gap-x-3">
                                                                <div class="grow">
                                                                    <span
                                                                        class="block text-sm font-semibold text-gray-800">No lpos available</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforelse

                                            </tbody>
                                        </table>
                                        <!-- End Table -->

                                        <!-- Footer -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t divide-gray-200">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-semibold text-gray-800">{{ count($trashedLpos)
                                                        }}</span> lpos
                                                </p>
                                            </div>

                                            {{ $trashedLpos->links('vendor.pagination.custom') }}

                                        </div>
                                        <!-- End Footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->

                    </div>
                    <!-- End Table Section -->
                </main>
                <!-- ========== END MAIN CONTENT ========== -->
            </div>

        </div>
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>