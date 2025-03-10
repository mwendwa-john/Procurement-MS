@extends('livewire.layouts.admin-sidebar')

@section('admin-content')
@livewire('components.modals.transfer-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <title>Transfer</title>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Transfer">
                    <rect id="Rectangle" fill-rule="nonzero" x="0" y="0" width="24" height="24"> </rect>
                    <path d="M19,7 L5,7 M20,17 L5,17" id="Shape" stroke="#2563EB" stroke-width="2"
                        stroke-linecap="round"> </path>
                    <path d="M16,3 L19.2929,6.29289 C19.6834,6.68342 19.6834,7.31658 19.2929,7.70711 L16,11" id="Path"
                        stroke="#2563EB" stroke-width="2" stroke-linecap="round"> </path>
                    <path d="M8,13 L4.70711,16.2929 C4.31658,16.6834 4.31658,17.3166 4.70711,17.7071 L8,21" id="Path"
                        stroke="#2563EB" stroke-width="2" stroke-linecap="round"> </path>
                </g>
            </g>
        </g>
    </svg>

    ',
    'pageTitle' => 'Transfer Users',
    ], key(now()->timestamp))
    <!-- End: Header -->


    <!-- Buttons -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-4 space-y-2">
        <div class="flex items-center space-x-4">
            <a href="{{ route('transfers.show') }}">
                <button type="button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent 
                    {{ Route::is('transfers.show') ? 'bg-blue-600 text-white' : 'bg-blue-200 text-blue-800' }} 
                    hover:bg-blue-300 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                    User Transfer
                </button>
            </a>

            <a href="{{ route('transfers.history') }}">
                <button type="button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent 
                    {{ Route::is('transfers.history') ? 'bg-blue-600 text-white' : 'bg-blue-200 text-blue-800' }} 
                    hover:bg-blue-300 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                    Transfer History
                </button>
            </a>

        </div>

    </div>
    <!-- End: Buttons -->


    <!-- Table Section -->
    <div class="max-w-[95rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
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
                                    Add users, edit and more.
                                </p>

                            </div>

                            <!-- Filter Section -->
                            <div class="flex items-center gap-4">
                                <!-- Search Filter -->
                                <div>
                                    <input wire:model.live.debounce.300ms="search" type="text"
                                        placeholder="Search by Name or Email"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                </div>

                                <!-- Location Filter -->
                                <div>
                                    <select wire:model.live="selectedLocation"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                        <option value="">All Locations</option>
                                        @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Hotel Filter -->
                                <div>
                                    <select wire:model.live="selectedHotel"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                        <option value="">All Hotels</option>
                                        @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                        @endforeach
                                    </select>
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
                                                Name
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

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Action
                                            </span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @forelse ($users as $user)
                                <tr>
                                    <td class="size-px mx-3 whitespace-nowrap">
                                        <div class="ps-4 py-3 mx-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ ($users->currentPage() - 1) * $users->perPage() +
                                                $loop->index + 1 }}
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
                                        <div class="px-6 py-3 font-semibold text-sm text-gray-700">
                                            {{ $user->location->location_name ?? 'N/A' }}
                                        </div>
                                    </td>

                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{
                                                $user->roles->pluck('name')->implode(', ') }}</span>
                                            <span class="block text-sm text-gray-500">
                                                {{ $user->hotel->hotel_name ?? 'N/A' }}
                                            </span>
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
                                        <div class="px-6 py-1.5">

                                            @can('manage users')
                                            <button type="button"
                                                wire:click="$dispatch('pass-user-slug', { slug: '{{ $user->slug }}' })"
                                                class="inline-flex items-center gap-x-1 text-sm text-blue-500 decoration-2 hover:underline font-medium"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-transfer-user-modal"
                                                data-hs-overlay="#hs-transfer-user-modal">
                                                Transfer
                                            </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex justify-center items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-red-400">
                                                        No users registered in the system
                                                    </span>
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
                                    <span class="font-semibold text-gray-800">
                                        {{ count($users) }}
                                    </span> users
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
    <!-- End Table Section -->
</div>
@endsection