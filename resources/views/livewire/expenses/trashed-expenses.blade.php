<div class="bg-sky-50">
    @livewire('components.modals.expenses-modals')


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-r from-indigo-300/50 via-violet-300 to-purple-600 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-purple-50 via-violet-300 to-indigo-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div>

        </div>
        <!-- End Gradients -->

        <!-- ========== HEADER ========== -->
        @livewire('components.navigation')
        <!-- ========== END HEADER ========== -->

        <div class="relative z-10">
            <div class="max-w-[95rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <a href="#"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        Show deleted expenses
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-red-400 text-xl md:text-3xl lg:text-4xl">
                            Trashed Expenses
                        </h1>
                    </div>
                    <!-- End Title -->
                </div>

                <!-- Start Buttons -->
                <div class="flex justify-end items-center mt-4">
                    <a href="{{ route('expenses.show') }}">
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
                <!-- End Buttons -->


                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">
                    <!-- Table Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

                        <!-- Card -->
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div
                                        class="bg-white border border-t-4 border-t-red-400 rounded-xl shadow-sm overflow-hidden">
                                        <!-- Header -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                            <div>
                                                <h2 class="text-xl font-semibold text-red-400">
                                                    Expenses
                                                </h2>
                                            </div>

                                            <div class="flex gap-4">
                                                <!-- Search Input -->
                                                <input type="text" wire:model.live="search" placeholder="Search..."
                                                    class="rounded-md px-4 py-2 border-gray-300" />
                                            </div>
                                        </div>
                                        <!-- End Header -->

                                        <!-- Table -->
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="ps-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">#</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Item Name
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Description
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Supplier
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Category
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            U/M
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Quantity
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Amount
                                                        </span>
                                                    </th>

                                                    @can('manage expenses')
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                                                            Action
                                                        </span>
                                                    </th>
                                                    @endcan

                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($trashedExpenses as $expense)
                                                <tr class="hover:bg-gray-100">
                                                    <td class="ps-6 py-3 text-blue-600">
                                                        <div class="text-sm font-semibold">
                                                            {{ ($trashedExpenses->currentPage() - 1) * $trashedExpenses->perPage() +
                                                            $loop->index + 1 }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm font-semibold text-gray-800">
                                                            {{ $expense->item_name }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3">
                                                        <div class="text-sm">
                                                            {{ \Illuminate\Support\Str::limit($expense->description, 50, '...') }}
                                                        </div>
                                                    </td> 

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm font-semibold text-gray-800">
                                                            {{ $expense->supplier->supplier_name }}
                                                        </div>
                                                    </td>                                                   

                                                    <td class="px-6 py-3 text-center">
                                                        <div class="text-sm">
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium text-nowrap bg-lime-100 text-lime-800 rounded-full">
                                                                {{ $expense->category->category_name }}
                                                            </span>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3">
                                                        <div class="text-sm">
                                                            {{ $expense->unit_of_measure }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ $expense->quantity }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ number_format($expense->amount, 2) }}
                                                        </div>
                                                    </td>

                                                    @can('manage expenses')
                                                    <td class="px-6 py-1.5 text-center">
                                                        <div class="inline-flex gap-2">
                                                            <button
                                                                wire:click="$dispatch('pass-restore-expense-id', { id: '{{ $expense->id }}' })"
                                                                data-hs-overlay="#hs-modal-restore-expense"
                                                                class="text-blue-600 text-sm hover:underline">
                                                                Restore
                                                            </button>

                                                        </div>
                                                    </td>
                                                    @endcan
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="9" class="text-center py-3">
                                                        <span class="text-sm font-semibold text-red-400">
                                                            No trashed expenses available
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <!-- End Table -->

                                        <!-- Footer -->
                                        <div class="px-6 py-4 border-t border-gray-200 flex justify-between">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-semibold text-gray-800">
                                                        {{ $trashedExpenses->total() }}</span> Trashed Expenses
                                                </p>
                                            </div>
                                            {{ $trashedExpenses->links('vendor.pagination.custom') }}
                                        </div>
                                        <!-- End Footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->




                    </div>
                    <!-- End Table Section -->
                </main>
                <!-- ========== END MAIN CONTENT ========== -->
            </div>

        </div>
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>