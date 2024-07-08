@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.hotel-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-4" fill="#F87171" viewBox="-6.7 0 122.88 122.88" version="1.1" id="Layer_1"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        style="enable-background:new 0 0 109.48 122.88" xml:space="preserve">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <style type="text/css">
                .st0 {
                    fill-rule: evenodd;
                    clip-rule: evenodd;
                }
            </style>
            <g>
                <path class="st0"
                    d="M2.35,9.63h38.3V3.76C40.64,1.69,42.33,0,44.4,0h21.14c2.07,0,3.76,1.69,3.76,3.76v5.87h37.83 c1.29,0,2.35,1.06,2.35,2.35V23.5H0V11.98C0,10.69,1.05,9.63,2.35,9.63L2.35,9.63z M8.69,29.61h92.92c1.94,0,3.7,1.6,3.52,3.52 l-7.86,86.23c-0.18,1.93-1.59,3.52-3.52,3.52l-77.3,0c-1.93,0-3.35-1.59-3.52-3.52L5.17,33.13C4.99,31.2,6.75,29.61,8.69,29.61 L8.69,29.61L8.69,29.61z M33.93,95.11l-6.16-10.59c-1.11-1.92-1.53-3.42-0.6-5.64l3.62-6.09l-3.63-1.95l12.17-0.05l6.07,10.61 l-3.75-2.15l-6.08,10.78c-0.58,1.02-1.06,1.8-1.35,2.96C34.05,93.7,33.96,94.41,33.93,95.11L33.93,95.11z M36.38,62.36l5.86-10.2 c1.65-2.05,3.7-2.79,5.65-2.24c1.68,0.48,2.15,1.23,3.04,2.6c1.07,1.63,2,3.37,2.98,5.08l-6.55,11.26L36.38,62.36L36.38,62.36z M49.71,48.43l12.26-0.04c2.22-0.01,3.73,0.39,5.18,2.3l3.46,6.18l3.51-2.17l-6.04,10.56l-12.23-0.05l3.74-2.17l-6.3-10.66 c-0.6-1.01-1.03-1.81-1.89-2.65C50.88,49.23,50.31,48.81,49.71,48.43L49.71,48.43z M76.4,67.42l5.9,10.17 c0.95,2.45,0.57,4.6-0.89,6.01c-1.25,1.22-2.14,1.24-3.77,1.34c-1.95,0.11-3.92,0.05-5.89,0.04l-6.47-11.3L76.4,67.42L76.4,67.42z M81.8,85.93l-6.09,10.64c-1.1,1.92-2.2,3.03-4.58,3.34l-7.08-0.09l0.12,4.12l-6.13-10.52l6.15-10.56l0.01,4.32l12.38-0.12 c1.17-0.01,2.09,0.01,3.24-0.31C80.52,86.54,81.17,86.26,81.8,85.93L81.8,85.93z M52.67,99.7l-11.76,0.02 c-2.6-0.4-4.27-1.81-4.77-3.77c-0.43-1.69-0.01-2.48,0.73-3.94c0.88-1.74,1.92-3.42,2.91-5.12l13.02,0.05L52.67,99.7L52.67,99.7z">
                </path>
            </g>
        </g>
    </svg>
    ',
    'pageTitle' => 'Trashed Hotels',
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

    <!-- Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-10 lg:mb-14 py-6 overflow-auto">
        @forelse ($trashedHotels as $hotel)
        <!-- Card -->
        <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition">
            <a href="#">
                <div class="aspect-w-16 aspect-h-9">
                    <img class="w-full object-cover rounded-t-xl h-40"
                        src="{{ Storage::url($hotel->hotel_image_path) }}" alt="hotel-image">
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

            <div class="text-center">
                @can('manage hotels')
                <dl class="flex justify-center items-center divide-x divide-gray-200">
                    <dt class="pe-3">
                        <button wire:click="bindHotelId({{ $hotel->id }})"
                            class="inline-flex items-center gap-x-1 px-3 py-2 text-sm text-blue-500 decoration-2 hover:underline font-medium"
                            data-hs-overlay="#hs-modal-restore-hotel">
                            Restore
                        </button>
                    </dt>
                    <dd class="pl-3">
                        <button wire:click="bindHotelId({{ $hotel->id }})"
                            class="inline-flex items-center gap-x-1 px-3 py-2 text-sm text-red-400 decoration-2 hover:underline font-medium"
                            data-hs-overlay="#hs-modal-permanently-delete-hotel">
                            Permanently Delete
                        </button>
                    </dd>
                </dl>
                @endcan
            </div>
        </div>
        <!-- End Card -->

        @empty
        <div class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition">
            <div class="aspect-w-16 aspect-h-9">
                <img class="w-full object-cover rounded-t-xl h-40"
                    src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="hotel-image">
            </div>
            <div class="p-4 md:p-5 text-center">
                <p class="mt-2 text-xs uppercase text-gray-600">
                    Superior
                </p>
                <h2 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600">
                    No Hotels Deleted
                </h2>
            </div>
        </div>
        <!-- End Card -->
        @endforelse
    </div>
    <!-- End Grid -->



    <!-- Pagination -->
    <div
        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 sm:justify-center sm:text-center">
        {{ $trashedHotels->links('vendor.pagination.custom') }}
    </div>
    <!-- End Pagination -->

</div>
@endsection