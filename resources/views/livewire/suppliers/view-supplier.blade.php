@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.supplier-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" fill="#2563EB" height="200px" width="200px" version="1.2" baseProfile="tiny"
        id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 188"
        xml:space="preserve">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <g>
                <g>
                    <g>
                        <path
                            d="M63,133c-13,0-23.5,10.5-23.5,23.5s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S76,133,63,133z M63,165.4 c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9c4.9,0,9,4.1,9,9C72,161.4,68,165.4,63,165.4z M210.8,132c-13,0-23.5,10.5-23.5,23.5 s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S223.8,132,210.8,132z M210.8,164.4c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9 c4.9,0,9,4.1,9,9C219.8,160.4,215.8,164.4,210.8,164.4z M-0.5,143.1c0,4.6,3.7,8.2,8.2,8.2h22.6c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-24.9,30.8-24.9s28.3,10.2,30.8,24.9c0.2,0.9,0.9,1.5,1.9,1.5H99h30.9V115H-0.5V143.1z M253.6,134.5h-5v-22 c0-7.5-6.1-13.6-13.7-13.6h-24.3c-0.5,0-1-0.3-1.4-0.6l-38-37c-1.7-1.7-4.1-2.7-6.6-2.8h-27.5v92.8h40.9c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-25.9,30.8-25.9s28.3,11.2,30.8,25.9c0.2,0.9,0.9,1.5,1.9,1.5h3.2c4.9,0,8.7-3.9,8.7-8.7v-6.3 C255.5,135.4,254.6,134.5,253.6,134.5z M191.1,99h-41.4c-1,0-1.9-0.9-1.9-1.9V70.7c0-1,0.9-1.9,1.9-1.9h13.9c0.5,0,1,0.3,1.5,0.6 l27.5,26.3C193.5,97,192.7,99,191.1,99z">
                        </path>
                    </g>
                </g>
            </g>
            <path
                d="M57.8,101.5H17.1V60.8h15.7v13h9.3v-13h15.7V101.5z M110.9,101.5H70.3V60.8H86v13h9.3v-13h15.7V101.5z M84.7,48.3H44V7.6 h15.7v13H69v-13h15.7V48.3z">
            </path>
        </g>
    </svg>
    ',
    'pageTitle' => 'View Supplier',
    ])

    <!-- End: Header -->

    <div class="flex justify-end items-center mt-4">
        <a href="{{ route('suppliers.show') }}">
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


    <!-- Supplier Profile -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto overflow-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
            <!-- Card -->
            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="h-44 flex flex-col justify-center items-center bg-blue-500 rounded-t-xl">
                    <svg class="flex-shrink-0 size-32" fill="#FFFF" height="200px" width="200px" version="1.2"
                        baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 188" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M63,133c-13,0-23.5,10.5-23.5,23.5s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S76,133,63,133z M63,165.4 c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9c4.9,0,9,4.1,9,9C72,161.4,68,165.4,63,165.4z M210.8,132c-13,0-23.5,10.5-23.5,23.5 s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S223.8,132,210.8,132z M210.8,164.4c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9 c4.9,0,9,4.1,9,9C219.8,160.4,215.8,164.4,210.8,164.4z M-0.5,143.1c0,4.6,3.7,8.2,8.2,8.2h22.6c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-24.9,30.8-24.9s28.3,10.2,30.8,24.9c0.2,0.9,0.9,1.5,1.9,1.5H99h30.9V115H-0.5V143.1z M253.6,134.5h-5v-22 c0-7.5-6.1-13.6-13.7-13.6h-24.3c-0.5,0-1-0.3-1.4-0.6l-38-37c-1.7-1.7-4.1-2.7-6.6-2.8h-27.5v92.8h40.9c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-25.9,30.8-25.9s28.3,11.2,30.8,25.9c0.2,0.9,0.9,1.5,1.9,1.5h3.2c4.9,0,8.7-3.9,8.7-8.7v-6.3 C255.5,135.4,254.6,134.5,253.6,134.5z M191.1,99h-41.4c-1,0-1.9-0.9-1.9-1.9V70.7c0-1,0.9-1.9,1.9-1.9h13.9c0.5,0,1,0.3,1.5,0.6 l27.5,26.3C193.5,97,192.7,99,191.1,99z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                            <path
                                d="M57.8,101.5H17.1V60.8h15.7v13h9.3v-13h15.7V101.5z M110.9,101.5H70.3V60.8H86v13h9.3v-13h15.7V101.5z M84.7,48.3H44V7.6 h15.7v13H69v-13h15.7V48.3z">
                            </path>
                        </g>
                    </svg>
                </div>
                <div class="p-4 md:p-6">
                    <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                        {{ $supplier->email }}
                    </span>
                    <h3 class="text-xl font-semibold text-gray-800">
                        {{ $supplier->supplier_name }}
                    </h3>
                </div>

                <div class="mt-auto flex justify-between gap-x-2 py-3 px-4 pb-5">
                    <button wire:click="$dispatch('pass-slug', { slug: '{{ $supplier->slug }}' })"
                        class="inline-flex items-center gap-x-1 px-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                        data-hs-overlay="#hs-modal-edit-supplier">
                        Edit
                    </button>

                    <button wire:click="$dispatch('pass-slug', { slug: '{{ $supplier->slug }}' })"
                        class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                        data-hs-overlay="#hs-modal-delete-supplier">
                        Delete
                    </button>
                </div>
            </div>
            <!-- End Card -->

            <!-- Profile Card -->
            <div class="flex flex-col gap-3 px-3 py-3 h-full bg-white border border-gray-200 shadow-sm rounded-xl">
                <!-- Contact Card -->
                <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition">
                    <div class="p-4 md:p-5">
                        <div class="flex">
                            <svg class="mt-1 flex-shrink-0 size-5 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z" />
                                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10" />
                            </svg>

                            <div class="grow ms-5">
                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                    Contact us
                                </h3>
                                <p class="text-sm text-gray-700">Reach us at</p>
                                <p class="text-sm text-gray-500">
                                    Email
                                    <a class="text-blue-600 decoration-2 group-hover:underline font-medium"
                                        href="mailto:{{ $supplier->email }}">{{ $supplier->email }}</a>
                                </p>
                                <p class="text-sm text-gray-500">
                                    Phone Number
                                    <a class="text-blue-600 decoration-2 group-hover:underline font-medium"
                                        href="tel:{{ $supplier->phone_number }}">{{ $supplier->phone_number }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Contact Card -->


                <!-- Address Card -->
                <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition">
                    <div class="p-4 md:p-5">
                        <div class="flex">
                            <svg class="mt-1 flex-shrink-0 size-7" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                        stroke="#28313F" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                        stroke="#28313F" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>

                            <div class="grow ms-5">
                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                    Address
                                </h3>
                                <p class="text-sm text-gray-500">
                                    State
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $supplier->address->state }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    City
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $supplier->address->city }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    Street
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $supplier->address->street }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    Postal Code
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $supplier->address->postal_code }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Address Card -->
            </div>
            <!-- End Profile Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Supplier Profile -->


    <!-- Hotels Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-t-4 border-t-blue-600 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200]">
                            <div>
                                <p class="text-lg font-semibold text-gray-800">
                                    Hotels supplied to by <span class="text-blue-600">{{ $supplier->supplier_name
                                        }}.</span>
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    @can('manage suppliers')
                                    <div class="hs-dropdown hs-dropdown-example relative inline-flex">
                                        <button id="hs-dropdown-example" type="button"
                                            class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white shadow-sm hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                            Attach Hotels
                                            <svg class="hs-dropdown-open:rotate-180 size-4 text-white"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m6 9 6 6 6-6"></path>
                                            </svg>
                                        </button>

                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2"
                                            aria-labelledby="hs-dropdown-example">
                                            @foreach ($hotels as $hotel)
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                wire:click.prevent="attachHotels('{{ $supplier->slug }}', '{{ $hotel->id }}')"
                                                href="#">
                                                {{ $hotel->hotel_name }}
                                            </a>
                                            @endforeach
                                        </div>
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
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                #
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Hotel Name
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Location
                                            </span>
                                        </div>
                                    </th>

                                    @can('manage suppliers')
                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center justify-center gap-x-2">
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
                                $i = ($supplierHotels->currentPage() - 1) * $supplierHotels->perPage();
                                @endphp
                                @forelse ($supplierHotels as $supplierHotel)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ ++$i }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-600">{{
                                                $supplierHotel->hotel_name }}</span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-600">{{
                                                        $supplierHotel->location->location_name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('manage suppliers')
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1 px-1.5 text-sm text-orange-400 decoration-2 hover:underline font-medium"
                                                href="{{ route('suppliers.view', ['slug' => $supplier->slug]) }}">
                                                View Lpos & invoices
                                            </a>

                                            <button
                                                wire:click="$dispatch('pass-hotel-id', { id: '{{ $supplierHotel->id }}', slug: '{{ $supplier->slug }}' })"
                                                class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-remove-hotel-supplied-to">
                                                Remove Hotel
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
                                                <div class="grow block text-sm font-semibold text-gray-800">
                                                    No hotels are supplied to by
                                                    <span class="text-blue-600">{{ $supplier->supplier_name }}.</span>
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
                                    <span class="font-semibold text-gray-800">{{ count($supplierHotels) }}</span> hotels
                                </p>
                            </div>

                            {{ $supplierHotels->links('vendor.pagination.custom') }}

                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Hotels Table Section -->

</div>
@endsection