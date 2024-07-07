@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
    @livewire('components.modals.location-modals')
    <div>
        <!-- Header -->
        @php
            $dynamicSvg = <<<SVG
                <svg class="flex-shrink-0 size-6" viewBox="-4 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>location</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                sketch:type="MSPage">
                                <g id="Icon-Set-Filled" sketch:type="MSLayerGroup"
                                    transform="translate(-106.000000, -413.000000)" fill="#2563EB">
                                    <path
                                        d="M118,422 C116.343,422 115,423.343 115,425 C115,426.657 116.343,428 118,428 C119.657,428 121,426.657 121,425 C121,423.343 119.657,422 118,422 L118,422 Z M118,430 C115.239,430 113,427.762 113,425 C113,422.238 115.239,420 118,420 C120.761,420 123,422.238 123,425 C123,427.762 120.761,430 118,430 L118,430 Z M118,413 C111.373,413 106,418.373 106,425 C106,430.018 116.005,445.011 118,445 C119.964,445.011 130,429.95 130,425 C130,418.373 124.627,413 118,413 L118,413 Z"
                                        id="location" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
            SVG;
        @endphp

        @livewire('components.admin-header', ['svgIcon' => $dynamicSvg, 'pageTitle' => 'Hotels In Location'])

        <!-- End: Header -->

        <div class="flex justify-end items-center mt-4">
            <a href="{{ route('locations.show') }}">
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


        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-10 lg:mb-14">
            @forelse ($hotels as $hotel)
                <!-- Card -->
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl h-40"
                            src="{{ asset('front-assets/images/hotels/blooming-suites.jpg') }}" alt="hotel-image">
                    </div>
                    <div class="p-4 md:p-5 text-center">
                        <p class="mt-2 text-xs uppercase text-gray-600">
                            {{ $hotel->location->location_name }}
                        </p>
                        <h2 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600">
                            {{ $hotel->hotel_name }}
                        </h2>
                    </div>
                </a>
                <!-- End Card -->
            @empty
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition"
                    href="#">
                    <div class="aspect-w-16 aspect-h-9">
                        <img class="w-full object-cover rounded-t-xl h-40"
                            src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="hotel-image">
                    </div>
                    <div class="p-4 md:p-5 text-center">
                        <p class="mt-2 text-xs uppercase text-gray-600">
                            Superior
                        </p>
                        <h2 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600">
                            No Hotels for this location
                        </h2>
                    </div>
                </a>
                <!-- End Card -->
            @endforelse
        </div>
        <!-- End Grid -->
    </div>
@endsection
