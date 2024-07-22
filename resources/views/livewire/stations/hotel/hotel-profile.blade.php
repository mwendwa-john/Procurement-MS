@extends('livewire.layouts.admin-sidebar')

@section('admin-content')
@livewire('components.modals.hotel-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" fill="#2563EB" viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path
                d="M560 64c8.84 0 16-7.16 16-16V16c0-8.84-7.16-16-16-16H16C7.16 0 0 7.16 0 16v32c0 8.84 7.16 16 16 16h15.98v384H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h240v-80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v80h240c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16h-16V64h16zm-304 44.8c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm0 96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zm-128-96c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4zM179.2 256h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4c0 6.4-6.4 12.8-12.8 12.8zM192 384c0-53.02 42.98-96 96-96s96 42.98 96 96H192zm256-140.8c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4zm0-96c0 6.4-6.4 12.8-12.8 12.8h-38.4c-6.4 0-12.8-6.4-12.8-12.8v-38.4c0-6.4 6.4-12.8 12.8-12.8h38.4c6.4 0 12.8 6.4 12.8 12.8v38.4z">
            </path>
        </g>
    </svg>
    ',
    'pageTitle' => 'Hotel Profile',
    ])
    <!-- End: Header -->


    <div class="flex justify-end items-center mt-4">
        <a href="{{ route('hotels.show') }}">
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


    <!-- Hotel Profile -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto overflow-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
            <!-- Card -->
            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="h-44 flex flex-col justify-center items-center bg-blue-500 rounded-t-xl">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl h-40"
                            src="{{ Storage::url($hotel->hotel_image_path) }}" alt="hotel-image">
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                        {{ $hotel->email }}
                    </span>
                    <h3 class="text-xl font-semibold text-gray-800">
                        {{ $hotel->hotel_name }}
                    </h3>
                </div>

                <div class="mt-auto flex justify-between gap-x-2 py-3 px-4 pb-5">
                    <button wire:click="$dispatch('edit-hotel', { id: '{{ $hotel->id }}' })"
                        class="inline-flex items-center gap-x-1 px-1.5 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                        data-hs-overlay="#hs-modal-edit-hotel">
                        Edit
                    </button>

                    <button wire:click="$dispatch('pass-hotel-id', { id: '{{ $hotel->id }}' })"
                        class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                        data-hs-overlay="#hs-modal-delete-hotel">
                        Delete
                    </button>
                </div>
            </div>
            <!-- End Card -->

            <!-- Profile Card -->
            <div class="flex flex-col gap-3 px-3 py-3 h-full bg-white border border-gray-200 shadow-sm rounded-xl">

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
                                        $hotel->address->state }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    City
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $hotel->address->city }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    Street
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $hotel->address->street }}</span>
                                </p>

                                <p class="text-sm text-gray-500">
                                    Postal Code
                                    <span class="text-blue-600 decoration-2 font-medium">{{
                                        $hotel->address->postal_code }}</span>
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
    <!-- End Hotel Profile -->


    <!-- Users in Hotel Table Section -->
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
                                <p class="text-sm text-blue-500">
                                    Users under <span class="text-blue-600">{{ $hotel->hotel_name }}.</span>
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
                                                Position
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-center">
                                        <div class="flex items-center justify-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Role
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Created
                                            </span>
                                        </div>
                                    </th>

                                    @can('manage users')
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
                                $i = ($users->currentPage() - 1) * $users->perPage();
                                @endphp
                                @forelse ($users as $user)
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
                                                <img class="inline-block size-[38px] rounded-full"
                                                    src="{{ Storage::url($user->person->profile_photo_path) }}"
                                                    alt="profile">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">{{
                                                        $user->first_name }}
                                                        {{ $user->middle_name }} {{ $user->last_name }}</span>
                                                    <span class="block text-sm text-gray-500">{{ $user->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{
                                                $user->roles->pluck('name')->implode(', ') }}</span>
                                            <span class="block text-sm text-gray-500">{{ $user->hotel->hotel_name
                                                }}</span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap text-center">
                                        <div class="px-6 py-3">
                                            <span
                                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">

                                                {{ $user->roles->pluck('name')->implode(', ') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="text-sm text-gray-500">{{ $user->created_at->format('M d, Y h:i
                                                A') }}
                                            </span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('manage users')
                                        <div class="px-6 py-1.5">
                                            <a class="inline-flex items-center gap-x-1 text-sm text-orange-400 decoration-2 hover:underline font-medium"
                                                href="#">
                                                View
                                            </a>

                                            <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                href="#">
                                                Edit
                                            </a>

                                            <a class="inline-flex items-center gap-x-1 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                href="#">
                                                Terminate
                                            </a>
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
                                                    No users are under <span class="text-blue-600">{{ $hotel->hotel_name
                                                        }}.</span>
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
                                    <span class="font-semibold text-gray-800">{{ count($users) }}</span> users
                                </p>
                            </div>

                            {{ $users->links('vendor.pagination.custom') }}

                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Users in Hotel Table Section -->


    <!-- Children Hotels Table Section -->
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
                                    Hotels under <span class="text-blue-600">{{ $hotel->hotel_name }}.</span>
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    @can('manage hotels')
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
                                            @foreach ($unlinkedHotels as $unlinkedHotel)
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                wire:click.prevent="attachChildHotels('{{ $hotel->id }}', '{{ $unlinkedHotel->id }}')"
                                                href="#">
                                                {{ $unlinkedHotel->hotel_name }}
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

                                    @can('manage hotels')
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
                                @forelse ($childHotels as $index => $childHotel)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ $index + 1 }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-600">{{
                                                $childHotel->hotel_name }}</span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-600">{{
                                                        $childHotel->location->location_name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('manage hotels')
                                        <div class="px-6 py-1.5">

                                            <button
                                                wire:click="$dispatch('pass-child-parent-hotel-id', { childId: '{{ $childHotel->id }}', parentId: '{{ $hotel->id }}' })"
                                                class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                data-hs-overlay="#hs-modal-remove-child-hotel">
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
                                                    No hotels are under
                                                    <span class="text-blue-600">{{ $hotel->hotel_name }}.</span>
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
                                    <span class="font-semibold text-gray-800">{{ count($childHotels) }}</span> hotels
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
    <!-- End Children Hotels Table Section -->

</div>
@endsection