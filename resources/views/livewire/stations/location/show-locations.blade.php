@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.location-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
        fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <title>location</title>
            <desc>Created with Sketch Beta.</desc>
            <defs> </defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-106.000000, -413.000000)"
                    fill="#2563EB">
                    <path
                        d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z"
                        id="location" sketch:type="MSShapeGroup"> </path>
                </g>
            </g>
        </g>
    </svg>
    ',
    'pageTitle' => 'Locations',
    ])
    <!-- End: Header -->


    <div class="flex justify-end items-center mt-4">
        @can('manage locations')
        <a href="{{ route('locations.trashed') }}">
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
                Trashed Locations
            </button>
        </a>

        <div class="text-center">
            <button type="button"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                data-hs-overlay="#hs-modal-add-location">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Add Location
            </button>
        </div>
        @endcan

    </div>


    <!-- Card Section -->
    <div class="max-w-5xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6">
            @foreach ($locations as $location)
            <!-- Card -->
            <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition">
                <div class="p-4 md:p-5">
                    <div class="flex">
                        <svg class="mt-1 flex-shrink-0 size-6 text-gray-800" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M12 21C15.5 17.4 19 14.1764 19 10.2C19 6.22355 15.866 3 12 3C8.13401 3 5 6.22355 5 10.2C5 14.1764 8.5 17.4 12 21Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>

                        <div class="grow ms-5">
                            <a href="{{ route('location.hotels', ['id' => $location->id]) }}">
                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                    {{ $location->location_name }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    See hotels
                                </p>
                            </a>

                            @can('manage locations')
                            <dl class="flex justify-center items-center divide-x divide-gray-200">
                                <dt class="pe-3">
                                    <button wire:click="$dispatch('edit-location', { id: '{{ $location->id }}' })"
                                        class="inline-flex items-center gap-x-1 px-2 text-sm text-blue-500 decoration-2 hover:underline font-medium"
                                        data-hs-overlay="#hs-modal-edit-location">
                                        Edit
                                    </button>
                                </dt>
                                <dd class="text-start ps-3">
                                    <button wire:click="$dispatch('pass-location-id', { id: '{{ $location->id }}' })"
                                        class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                        data-hs-overlay="#hs-modal-delete-location">
                                        Delete
                                    </button>
                                </dd>
                            </dl>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->
            @endforeach

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
</div>
@endsection