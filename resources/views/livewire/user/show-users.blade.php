@extends('livewire.layouts.admin-dashboard')

@section('admin-content')
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
                                    Users
                                </h2>
                                <p class="text-sm text-blue-500">
                                    Add users, edit and more.
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="#">
                                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Add user
                                    </a>
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

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-sm font-semibold uppercase tracking-wide text-blue-600">
                                                Action
                                            </span>
                                        </div>
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="divide-y divide-[#c7d4e5]">
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
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800">{{ $user->first_name }}
                                                            {{ $user->middle_name }} {{ $user->last_name }}</span>
                                                        <span class="block text-sm text-gray-500">{{ $user->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800">{{ $user->roles->pluck('name')->implode(', ') }}</span>
                                                <span
                                                    class="block text-sm text-gray-500">{{ $user->hotel->hotel_name }}</span>
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
                                                <span
                                                    class="text-sm text-gray-500">{{ $user->created_at->format('M d, Y h:i A') }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
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
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                                <div class="flex justify-center items-center gap-x-3">
                                                    <div class="grow">
                                                        <span class="block text-sm font-semibold text-gray-800">No users registered in the system</span>
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
    <!-- End Table Section -->
@endsection
