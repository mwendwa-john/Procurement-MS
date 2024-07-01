@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
    @livewire('components.modals.roles-permissions-modals')
    <div>
        <!-- Header -->
        <div
            style="margin-left: -1rem; margin-right: -1rem; margin-top: -2rem; sm:margin-left: -1.5rem; sm:margin-right: -1.5rem; sm:margin-top: -2rem; md:margin-left: -2rem; md:margin-right: -2rem; md:margin-top: -2rem; lg:margin-left: -18rem; lg:margin-right: -18rem; lg:margin-top: -2rem;">
            <header class="w-full bg-white shadow-md p-3 px-4 flex items-center justify-between rounded-2xl">
                <div class="inline-flex items-center gap-x-2">
                    <!-- Page Title -->
                    <svg class="flex-shrink-0 size-6" fill="#2563EB" viewBox="0 0 52 52" data-name="Layer 1"
                        xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M38.3,27.2A11.4,11.4,0,1,0,49.7,38.6,11.46,11.46,0,0,0,38.3,27.2Zm2,12.4a2.39,2.39,0,0,1-.9-.2l-4.3,4.3a1.39,1.39,0,0,1-.9.4,1,1,0,0,1-.9-.4,1.39,1.39,0,0,1,0-1.9l4.3-4.3a2.92,2.92,0,0,1-.2-.9,3.47,3.47,0,0,1,3.4-3.8,2.39,2.39,0,0,1,.9.2c.2,0,.2.2.1.3l-2,1.9a.28.28,0,0,0,0,.5L41.1,37a.38.38,0,0,0,.6,0l1.9-1.9c.1-.1.4-.1.4.1a3.71,3.71,0,0,1,.2.9A3.57,3.57,0,0,1,40.3,39.6Z">
                            </path>
                            <circle cx="21.7" cy="14.9" r="12.9"></circle>
                            <path
                                d="M25.2,49.8c2.2,0,1-1.5,1-1.5h0a15.44,15.44,0,0,1-3.4-9.7,15,15,0,0,1,1.4-6.4.77.77,0,0,1,.2-.3c.7-1.4-.7-1.5-.7-1.5h0a12.1,12.1,0,0,0-1.9-.1A19.69,19.69,0,0,0,2.4,47.1c0,1,.3,2.8,3.4,2.8H24.9C25.1,49.8,25.1,49.8,25.2,49.8Z">
                            </path>
                        </g>
                    </svg>
                    <h1 class="text-xl font-bold text-gray-900 mt-1">Trashed Roles</h1>
                </div>
            </header>
        </div>

        <div class="flex justify-end items-center mt-4">
            <a href="{{ route('roles.index') }}">
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

        <!-- Table Section -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                            <!-- Header -->
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                <div>
                                    <p class="text-sm text-blue-500">
                                        Retrieve roles.
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
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    #
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Role Name
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                    Action
                                                </span>
                                            </div>
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">
                                    @forelse ($trashedRoles as $trashedRole)
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
                                                            <span
                                                                class="block text-sm font-semibold text-gray-800">{{ $trashedRole->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="size-px whitespace-nowrap">
                                                <div class="px-6 py-1.5">
                                                    @can('assign permissions')
                                                        <button wire:click="bindRoleId({{ $trashedRole->id }})"
                                                            class="inline-flex items-center gap-x-1 px-2 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                            data-hs-overlay="#hs-restore-role">
                                                            Restore
                                                        </button>
                                                    @endcan

                                                    @can('delete role')
                                                        <button wire:click="bindRoleId({{ $trashedRole->id }})"
                                                            class="inline-flex items-center gap-x-1 px-2 text-sm text-red-500 decoration-2 hover:underline font-medium"
                                                            data-hs-overlay="#hs-permanently-delete-role">
                                                            Delete role
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                                    <div class="flex justify-center items-center gap-x-3">
                                                        <div class="grow">
                                                            <span class="block text-sm font-semibold text-gray-800">No
                                                                trashed system roles available</span>
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
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold text-gray-800">{{ count($trashedRoles) }}</span> results
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
@endsection
