@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.user-modals')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <path
                d="M18 7.16C17.94 7.15 17.87 7.15 17.81 7.16C16.43 7.11 15.33 5.98 15.33 4.58C15.33 3.15 16.48 2 17.91 2C19.34 2 20.49 3.16 20.49 4.58C20.48 5.98 19.38 7.11 18 7.16Z"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M16.9699 14.44C18.3399 14.67 19.8499 14.43 20.9099 13.72C22.3199 12.78 22.3199 11.24 20.9099 10.3C19.8399 9.59004 18.3099 9.35003 16.9399 9.59003"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M5.96998 7.16C6.02998 7.15 6.09998 7.15 6.15998 7.16C7.53998 7.11 8.63998 5.98 8.63998 4.58C8.63998 3.15 7.48998 2 6.05998 2C4.62998 2 3.47998 3.16 3.47998 4.58C3.48998 5.98 4.58998 7.11 5.96998 7.16Z"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M6.99994 14.44C5.62994 14.67 4.11994 14.43 3.05994 13.72C1.64994 12.78 1.64994 11.24 3.05994 10.3C4.12994 9.59004 5.65994 9.35003 7.02994 9.59003"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M12 14.63C11.94 14.62 11.87 14.62 11.81 14.63C10.43 14.58 9.32996 13.45 9.32996 12.05C9.32996 10.62 10.48 9.46997 11.91 9.46997C13.34 9.46997 14.49 10.63 14.49 12.05C14.48 13.45 13.38 14.59 12 14.63Z"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
                d="M9.08997 17.78C7.67997 18.72 7.67997 20.26 9.08997 21.2C10.69 22.27 13.31 22.27 14.91 21.2C16.32 20.26 16.32 18.72 14.91 17.78C13.32 16.72 10.69 16.72 9.08997 17.78Z"
                stroke="#2563EB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
    </svg>
    ',
    'pageTitle' => 'Inactive Users',
    ])
    <!-- End: Header -->

    <!-- Buttons -->
    <div class="flex flex-col md:flex-row justify-between items-center mt-4 space-y-2">
        <div class="flex items-center space-x-4">
            <a href="{{ route('users.new') }}">
                <button type="button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-200 text-blue-800 hover:bg-blue-300 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                    New Users
                </button>
            </a>

            <a href="{{ route('users.show') }}">
                <button type="button"
                    class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-200 text-blue-800 hover:bg-blue-300 focus:outline-none focus:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none">
                    Users
                </button>
            </a>
        </div>

        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            <a href="{{ route('users.trashed') }}">
                <button
                    class="inline-flex items-center gap-x-2 bg-red-400 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-300 transition duration-300">
                    <svg class="flex-shrink-0 w-6 h-6" fill="#ffffff" viewBox="0 0 32 32" version="1.1"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>recycle</title>
                            <path
                                d="M15.966 1.232c-0.97 0.021-1.901 0.261-2.807 0.655l1.404 2.62c0.463-0.165 0.937-0.277 1.404-0.281 1.599 0 3.292 0.853 4.585 3.088l5.333 9.264 1.778-2.901-4.491-7.86c-1.714-2.964-4.434-4.608-7.205-4.585 0 0 0 0 0 0zM7.171 8.811l-4.117 7.205c-1.569 2.715-1.68 5.792-0.374 8.234 0.541 1.012 1.362 1.842 2.339 2.526l1.497-2.526c-0.502-0.397-0.929-0.867-1.216-1.403-0.781-1.46-0.831-3.41 0.281-5.334l5.053-8.702h-3.462zM27.194 21.536c-0.098 0.48-0.239 0.896-0.468 1.311-0.801 1.448-2.372 2.526-4.866 2.526h-10.199l1.778 2.994h8.421c3.402 0 6.146-1.601 7.486-4.023 0.472-0.855 0.732-1.824 0.842-2.807l-2.994 0zM11.272 12.6l-6.728-3.879 6.728-3.879-0 7.759zM22.219 15.005l6.728 3.879 0-7.759-6.729 3.879zM8.193 26.81l6.728-3.879 0 7.759-6.729-3.879z">
                            </path>
                    </svg>
                    Trashed Users
                </button>
            </a>

            <button type="button"
                class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-send-user-email-modal"
                data-hs-overlay="#hs-send-user-email-modal">
                <svg class="flex-shrink-0 w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                </svg>
                Add User
            </button>
        </div>
    </div>
    <!-- End: Buttons -->


    <!-- Table Section -->
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
                                    Inactive Users
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
                                @forelse ($inactiveUsers as $user)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 mx-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ ($inactiveUsers->currentPage() - 1) * $inactiveUsers->perPage() +
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
                                            <a class="inline-flex items-center gap-x-1 text-sm text-orange-400 decoration-2 hover:underline font-medium"
                                                href="{{ route('user.profile', ['slug' => $user->slug]) }}">
                                                View
                                            </a>

                                            @can('manage users')
                                            @if (is_null($user->hotel))
                                            <button type="button"
                                                wire:click="$dispatch('assign-hotel', { slug: '{{ $user->slug }}' })"
                                                class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-assign-hotel-modal"
                                                data-hs-overlay="#hs-assign-hotel-modal">
                                                Assign Hotel
                                            </button>
                                            @endif

                                            @if ($user->is_active == false)
                                            <button type="button"
                                                wire:click="$dispatch('pass-user-slug', { slug: '{{ $user->slug }}' })"
                                                class="inline-flex items-center gap-x-1 text-sm text-teal-500 decoration-2 hover:underline font-medium"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-activate-account-modal"
                                                data-hs-overlay="#hs-activate-account-modal">
                                                Activate
                                            </button>
                                            @endif

                                            <button type="button"
                                                wire:click="$dispatch('pass-user-slug', { slug: '{{ $user->slug }}' })"
                                                class="inline-flex items-center gap-x-1 text-sm text-red-400 decoration-2 hover:underline font-medium"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-delete-account-modal"
                                                data-hs-overlay="#hs-delete-account-modal">
                                                Delete
                                            </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex justify-center items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">
                                                        No inactive users registered in the system
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
                                    <span class="font-semibold text-gray-800">{{ count($inactiveUsers) }}</span>
                                    inactiveUsers
                                </p>
                            </div>

                            {{ $inactiveUsers->links('vendor.pagination.custom') }}

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