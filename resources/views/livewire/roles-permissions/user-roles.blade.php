<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-grey-200 rounded-xl shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-grey-200">
                        <div>
                            <h2 class="text-xl font-semibold text-blue-600">
                                User Roles
                            </h2>
                            <p class="text-sm text-blue-500">
                                Assign users to roles.
                            </p>
                        </div>

                        <div>

                            <div class="inline-flex gap-x-2">
                                <div class="hs-dropdown hs-dropdown-example relative inline-flex">
                                    <button id="hs-dropdown-example" type="button"
                                        class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 shadow-sm  disabled:opacity-50 disabled:pointer-events-none">
                                        Filter by Role
                                        <svg class="hs-dropdown-open:rotate-180 size-4 text-white"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </button>

                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2"
                                        aria-labelledby="hs-dropdown-example">
                                        @foreach ($roles as $role)
                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                wire:click.prevent="$set('selectedRole', '{{ $role->name }}')"
                                                href="#">
                                                {{ $role->name }}
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-grey-200">
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
                                            User Name
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

                        <tbody class="divide-y divide-grey-200">
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
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">
                                                        {{ $user->first_name }} {{ $user->middle_name }}
                                                        {{ $user->last_name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center justify-center gap-x-3">
                                                <!-- Added justify-center -->
                                                <div class="grow">
                                                    @if ($user->roles->isEmpty())
                                                        <span
                                                            class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                                            No Roles
                                                        </span>
                                                    @else
                                                        <span
                                                            class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                                                            {{ $user->roles->pluck('name')->implode(', ') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            @can('assign permissions')
                                                <div class="hs-dropdown hs-dropdown-example relative inline-flex">
                                                    <button id="hs-dropdown-example" type="button"
                                                        class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                                        Reassign role
                                                        <svg class="hs-dropdown-open:rotate-180 size-4 text-gray-600"
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="m6 9 6 6 6-6"></path>
                                                        </svg>
                                                    </button>

                                                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 w-56 hidden z-10 mt-2 min-w-60 bg-white shadow-md rounded-lg p-2"
                                                        aria-labelledby="hs-dropdown-example">

                                                        @foreach ($roles as $role)
                                                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100"
                                                                wire:click.prevent="reassignRole({{ $user->id }}, '{{ $role->name }}')"
                                                                href="#">
                                                                {{ $role->name }}
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            @endcan

                                            @can('delete role')
                                                <button wire:click="removeRoles({{ $user->id }})"
                                                    class="inline-flex items-center gap-x-1 px-2 text-sm text-red-500 decoration-2 hover:underline font-medium">
                                                    Delete role
                                                </button>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex justify-center items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">No system
                                                        users available</span>
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
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-grey-200">

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
