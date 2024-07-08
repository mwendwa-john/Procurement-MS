@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.supplier-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M11 2C9.34315 2 8 3.34315 8 5V6.00038C7.39483 6.00219 6.86113 6.01237 6.41261 6.06902C5.8235 6.14344 5.25718 6.31027 4.76902 6.73364C4.28087 7.15702 4.03562 7.69406 3.87865 8.26672C3.73286 8.79855 3.63761 9.46561 3.52795 10.2335L3.51947 10.2929L2.65222 16.3636C2.50907 17.3653 2.38687 18.2204 2.38563 18.9086C2.38431 19.6412 2.51592 20.3617 3.03969 20.9656C3.56347 21.5695 4.25813 21.8017 4.98354 21.904C5.66496 22.0001 6.52877 22.0001 7.54064 22H16.4594C17.4713 22.0001 18.3351 22.0001 19.0165 21.904C19.7419 21.8017 20.4366 21.5695 20.9604 20.9656C21.4842 20.3617 21.6158 19.6412 21.6144 18.9086C21.6132 18.2204 21.491 17.3653 21.3478 16.3635L20.4721 10.2335C20.3625 9.46561 20.2672 8.79855 20.1214 8.26672C19.9645 7.69406 19.7192 7.15702 19.2311 6.73364C18.7429 6.31027 18.1766 6.14344 17.5875 6.06902C17.1389 6.01237 16.6052 6.00219 16 6.00038V5C16 3.34315 14.6569 2 13 2H11ZM14 6V5C14 4.44772 13.5523 4 13 4H11C10.4477 4 10 4.44772 10 5V6L14 6ZM9 8C9.55228 8 10 8.44772 10 9V11C10 11.5523 9.55228 12 9 12C8.44772 12 8 11.5523 8 11V9C8 8.44772 8.44772 8 9 8ZM16 9C16 8.44772 15.5523 8 15 8C14.4477 8 14 8.44772 14 9V11C14 11.5523 14.4477 12 15 12C15.5523 12 16 11.5523 16 11V9Z"
                fill="#2563EB"></path>
        </g>
    </svg>
    ',
    'pageTitle' => 'Suppliers',
    ])

    <!-- End: Header -->


    <div class="flex justify-end items-center mt-4">
        @can('manage suppliers')
        <a href="{{ route('suppliers.trashed') }}">
            <button
                class="inline-flex items-center gap-x-2 bg-red-400 text-white font-bold py-2 px-4 mx-3 rounded-lg hover:bg-red-300 transition duration-300">
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
                Trashed Suppliers
            </button>
        </a>

        <div class="text-center">
            <button type="button"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                data-hs-overlay="#hs-modal-add-supplier">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Add Supplier
            </button>
        </div>
        @endcan

    </div>


    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200]">
                            <div>
                                <p class="text-sm text-blue-500">
                                    Add suppliers, edit and more.
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
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                #
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Name
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Contact
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Supplies To
                                            </span>
                                        </div>
                                    </th>

                                    @can('manage suppliers')
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Action
                                            </span>
                                        </div>
                                    </th>
                                    @endcan

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @php
                                $i = ($suppliers->currentPage() - 1) * $suppliers->perPage();
                                @endphp
                                @forelse ($suppliers as $supplier)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ ++$i }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">{{
                                                        $supplier->supplier_name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{
                                                $supplier->phone_number }}</span>
                                            <span class="block text-sm text-gray-500">{{ $supplier->email }}</span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @if ($supplier->hotels->isNotEmpty())
                                        <div class="px-6 py-3">
                                            <div class="hs-dropdown hs-dropdown-example relative inline-flex">
                                                <button id="hs-dropdown-example" type="button"
                                                    class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                    Supplies to
                                                    <svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="m6 9 6 6 6-6"></path>
                                                    </svg>
                                                </button>

                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2"
                                                    aria-labelledby="hs-dropdown-example">

                                                    @foreach ($supplier->hotels as $hotel)
                                                    <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                        href="#">
                                                        {{ $hotel->hotel_name }}
                                                    </a>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="px-6 py-3 text-sm text-gray-600">
                                            Does not supply any hotel
                                        </div>
                                        @endif
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('manage suppliers')
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1 px-1.5 text-sm text-orange-400 decoration-2 hover:underline font-medium"
                                                href="{{ route('suppliers.view', ['slug' => $supplier->slug]) }}">
                                                View
                                            </a>

                                            <button
                                                wire:click="$dispatch('edit-supplier', { slug: '{{ $supplier->slug }}' })"
                                                class="inline-flex items-center gap-x-1 px-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-edit-supplier">
                                                Edit
                                            </button>

                                            <button
                                                wire:click="$dispatch('pass-slug', { slug: '{{ $supplier->slug }}' })"
                                                class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-delete-supplier">
                                                Delete
                                            </button>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex justify-center items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">No
                                                        suppliers registered in the system</span>
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
                                    <span class="font-semibold text-gray-800">{{ count($suppliers) }}</span> suppliers
                                </p>
                            </div>

                            {{ $suppliers->links('vendor.pagination.custom') }}

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
@endsection