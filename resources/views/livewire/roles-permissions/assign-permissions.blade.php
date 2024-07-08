@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
@livewire('components.modals.roles-permissions-modals')

<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" fill="#2563EB" height="200px" width="200px" version="1.1" id="Layer_1"
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"
        xml:space="preserve">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <g>
                <g>
                    <path
                        d="M174.829,174.829c-24.1,0-43.707,19.607-43.707,43.707c0,24.1,19.607,43.707,43.707,43.707s43.707-19.607,43.707-43.707 C218.537,194.436,198.93,174.829,174.829,174.829z">
                    </path>
                </g>
            </g>
            <g>
                <g>
                    <path
                        d="M512,405.854V31.219H0v374.634h187.317v37.463H143.61v37.463H368.39v-37.463h-43.707v-37.463H512z M305.951,268.488 v-31.219h-52.158c-8.482,35.753-40.655,62.439-78.964,62.439c-44.758,0-81.171-36.413-81.171-81.171 c0-44.758,36.413-81.171,81.171-81.171c38.31,0,70.482,26.685,78.964,62.439h158.304v37.463h-18.732v43.707h-37.463v-43.707 h-12.488v31.219H305.951z">
                    </path>
                </g>
            </g>
        </g>
    </svg>
    ',
    'pageTitle' => 'Assign Permissions',
    ])
    <!-- End: Header -->


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
                                    Assign permissions to {{ $roleName }} role.
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

                                    <th scope="col" class="ps-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                check
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                Permission Name
                                            </span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @forelse ($permissions as $permission)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-3 text-blue-600">
                                            <div class="block text-sm font-semibold">
                                                {{ $loop->index + 1 }}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        @can('assign permissions')
                                        <div class="ps-6 py-3">
                                            <label for="permission-{{ $permission->id }}" class="flex">
                                                <input type="checkbox"
                                                    class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="permission-{{ $permission->id }}"
                                                    value="{{ $permission->name }}" wire:model.live="rolePermissions"
                                                    @if (in_array($permission->name, $rolePermissions)) checked @endif>
                                            </label>
                                        </div>
                                        @endcan
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">{{
                                                        $permission->name }}</span>
                                                </div>
                                            </div>
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
                                                        system
                                                        permissions available</span>
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
                                    <span class="font-semibold text-gray-800">{{ count($permissions) }}</span> results
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