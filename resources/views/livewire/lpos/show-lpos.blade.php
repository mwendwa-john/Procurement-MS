<div>
    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-t-4 border-t-blue-600 rounded-xl shadow-sm overflow-hidden">
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

                            <div>
                                <div class="inline-flex gap-x-2">
                                    @can('manage roles')
                                    <a href="{{ route('roles.trashed') }}">
                                        <button
                                            class="inline-flex items-center gap-x-2 bg-red-400 text-white font-bold py-2 px-4 mx-3 rounded-lg hover:bg-red-300 transition duration-300">
                                            <svg class="flex-shrink-0 size-4" fill="#ffffff" viewBox="0 0 32 32"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <title>recycle</title>
                                                    <path
                                                        d="M15.966 1.232c-0.97 0.021-1.901 0.261-2.807 0.655l1.404 2.62c0.463-0.165 0.937-0.277 1.404-0.281 1.599 0 3.292 0.853 4.585 3.088l5.333 9.264 1.778-2.901-4.491-7.86c-1.714-2.964-4.434-4.608-7.205-4.585 0 0 0 0 0 0zM7.171 8.811l-4.117 7.205c-1.569 2.715-1.68 5.792-0.374 8.234 0.541 1.012 1.362 1.842 2.339 2.526l1.497-2.526c-0.502-0.397-0.929-0.867-1.216-1.403-0.781-1.46-0.831-3.41 0.281-5.334l5.053-8.702h-3.462zM27.194 21.536c-0.098 0.48-0.239 0.896-0.468 1.311-0.801 1.448-2.372 2.526-4.866 2.526h-10.199l1.778 2.994h8.421c3.402 0 6.146-1.601 7.486-4.023 0.472-0.855 0.732-1.824 0.842-2.807l-2.994 0zM11.272 12.6l-6.728-3.879 6.728-3.879-0 7.759zM22.219 15.005l6.728 3.879 0-7.759-6.729 3.879zM8.193 26.81l6.728-3.879 0 7.759-6.729-3.879z">
                                                    </path>
                                                </g>
                                            </svg>
                                            Trashed Roles
                                        </button>
                                    </a>

                                    <div class="text-center">
                                        <button type="button"
                                            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-overlay="#hs-modal-add-role">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                            Add role
                                        </button>
                                    </div>
                                    @endcan
                                </div>
                            </div>

                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="ps-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                #
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Supplier
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Order Number
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Hotel
                                            </span>
                                        </div>
                                    </th>

                                    @can('manage lpos')
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Action
                                            </span>
                                        </div>
                                    </th>
                                    @endcan
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($lpos as $lpo)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ $loop->index + 1 }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">{{
                                                        $lpo->supplier->supplier_name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <div class="flex text-sm items-center gap-x-3">
                                                {{ $lpo->order_number }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <div class="flex text-sm items-center gap-x-3">
                                                {{ $lpo->hotel->hotel_name }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('manage lpos')
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex text-sm items-center gap-x-1 px-1.5 text-sm text-orange-400 decoration-2 hover:underline font-medium"
                                                href="{{ route('lpos.view', ['id' => $lpo->id]) }}">
                                                View
                                            </a>

                                            <button
                                                wire:click="$dispatch('edit-supplier', { slug: '{{ $lpo->slug }}' })"
                                                class="inline-flex text-sm items-center gap-x-1 px-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-edit-supplier">
                                                Edit
                                            </button>

                                            <button
                                                wire:click="$dispatch('pass-supplier-slug', { slug: '{{ $lpo->slug }}' })"
                                                class="inline-flex text-sm items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-delete-supplier">
                                                Delete
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
                                                    <span class="block text-sm font-semibold text-gray-800">No
                                                        lpos available</span>
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
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-grey-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-800">{{ count($lpos) }}</span> results
                                </p>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

    </div>
    <!-- End Table Section -->

</div>