@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
    @livewire('components.modals.roles-permissions-modals')
    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-[#DDEBFE] border border-[#c7d4e5] rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-[#c7d4e5]">
                            <div>
                                <h2 class="text-xl font-semibold text-blue-600">
                                    Roles
                                </h2>
                                <p class="text-sm text-blue-500">
                                    Add roles, edit and more.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 bg-[#d2e0f2] text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('roles.trashed') }}">
                                        Trashed
                                    </a>

                                    @can('create role')
                                        <div class="text-center">
                                            <button type="button"
                                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                                data-hs-overlay="#hs-modal-add-role">
                                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M5 12h14" />
                                                    <path d="M12 5v14" />
                                                </svg>
                                                Add role
                                            </button>
                                        </div>
                                    @endcan
                                </div>
                            </div>

                        </div>
                        <!-- End Header -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-[#c7d4e5]">
                            <thead class="bg-[#d2e0f2]">
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

                            <tbody class="divide-y divide-[#c7d4e5]">
                                @forelse ($roles as $role)
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
                                                            class="block text-sm font-semibold text-gray-800">{{ $role->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                @can('assign permissions')
                                                    <a class="inline-flex items-center gap-x-1 px-2 text-sm text-blue-600 decoration-2 hover:underline font-medium"
                                                        href="{{ route('permissions.assign', ['roleId' => $role->id]) }}">
                                                        Assign permission
                                                    </a>
                                                @endcan

                                                @can('delete role')
                                                    <button wire:click="bindRoleId({{ $role->id }})"
                                                        class="inline-flex items-center gap-x-1 px-2 text-sm text-red-500 decoration-2 hover:underline font-medium"
                                                        data-hs-overlay="#hs-delete-role">
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
                                                        <span class="block text-sm font-semibold text-gray-800">No system
                                                            roles available</span>
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
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-[#c7d4e5]">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-800">{{ count($roles) }}</span> results
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

    <livewire:roles-permissions.user-roles>
@endsection
