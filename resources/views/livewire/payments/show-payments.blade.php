<div class="bg-sky-50">
    @livewire('components.modals.lpo-modals')


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-br from-blue-400/50 via-sky-300 to-cyan-200 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-cyan-100 via-blue-200 to-sky-100 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div>

        </div>
        <!-- End Gradients -->

        <!-- ========== HEADER ========== -->
        @livewire('components.navigation')
        <!-- ========== END HEADER ========== -->

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <a href="#"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        Transactions
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                            All Transactions
                        </h1>
                    </div>
                    <!-- End Title -->
                </div>

                <!-- Start Buttons -->
                <div class="flex justify-end my-6">
                    <div class="flex flex-wrap items-center space-x-3">
                        {{-- @can('manage suppliers') --}}
                        <a href="{{ route('lpos.trashed') }}">
                            <button
                                class="inline-flex items-center gap-x-2 bg-red-400 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-red-300 transition duration-300">
                                <svg class="flex-shrink-0 size-4" fill="#ffffff" viewBox="0 0 32 32" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>recycle</title>
                                        <path
                                            d="M15.966 1.232c-0.97 0.021-1.901 0.261-2.807 0.655l1.404 2.62c0.463-0.165 0.937-0.277 1.404-0.281 1.599 0 3.292 0.853 4.585 3.088l5.333 9.264 1.778-2.901-4.491-7.86c-1.714-2.964-4.434-4.608-7.205-4.585 0 0 0 0 0 0zM7.171 8.811l-4.117 7.205c-1.569 2.715-1.68 5.792-0.374 8.234 0.541 1.012 1.362 1.842 2.339 2.526l1.497-2.526c-0.502-0.397-0.929-0.867-1.216-1.403-0.781-1.46-0.831-3.41 0.281-5.334l5.053-8.702h-3.462zM27.194 21.536c-0.098 0.48-0.239 0.896-0.468 1.311-0.801 1.448-2.372 2.526-4.866 2.526h-10.199l1.778 2.994h8.421c3.402 0 6.146-1.601 7.486-4.023 0.472-0.855 0.732-1.824 0.842-2.807l-2.994 0zM11.272 12.6l-6.728-3.879 6.728-3.879-0 7.759zM22.219 15.005l6.728 3.879 0-7.759-6.729 3.879zM8.193 26.81l6.728-3.879 0 7.759-6.729-3.879z">
                                        </path>
                                    </g>
                                </svg>
                                Trashed LPOs
                            </button>
                        </a>
                        {{-- @endcan --}}

                        @can('create lpo')
                        <a href="{{ route('lpo.create') }}">
                            <button
                                class="inline-flex items-center gap-x-2 bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14" />
                                    <path d="M12 5v14" />
                                </svg>
                                Create LPO
                            </button>
                        </a>
                        @endcan
                    </div>
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
                                        class="bg-white border border-t-4 border-t-blue-600 rounded-xl shadow-sm overflow-hidden">
                                        <!-- Header -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                            <div>
                                                <h2 class="text-xl font-semibold text-blue-600">
                                                    Payments
                                                </h2>
                                                <p class="text-sm text-blue-500">
                                                    Manage payments.
                                                </p>
                                            </div>

                                            {{-- <div class="flex gap-4">
                                                <!-- Supplier Filter -->
                                                <select wire:model.live="supplier_id"
                                                    class="rounded-md border-gray-300">
                                                    <option value="">All Suppliers</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if(!auth()->user()->hasRole('store-keeper'))
                                                <!-- Hotel Filter -->
                                                <select wire:model.live="hotel_id" class="rounded-md border-gray-300">
                                                    <option value="">All Hotels</option>
                                                    @foreach($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                                    @endforeach
                                                </select>
                                                @endif

                                                <!-- Invoice Filter -->
                                                <select wire:model.live="has_invoice"
                                                    class="rounded-md border-gray-300">
                                                    <option value="">All LPOs</option>
                                                    <option value="with">With Invoice</option>
                                                    <option value="without">Without Invoice</option>
                                                </select>

                                                <!-- Search Input -->
                                                <input type="text" wire:model.live="search" placeholder="Search..."
                                                    class="rounded-md border-gray-300" />
                                            </div> --}}
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
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payed
                                                            By</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payment
                                                            Date</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Amount</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Currency</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Status</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($payments as $payment)
                                                <tr>
                                                    <td class="ps-6 py-3 text-blue-600">
                                                        <div class="text-sm font-semibold">
                                                            {{ ($payments->currentPage() - 1) * $payments->perPage() +
                                                            $loop->index + 1 }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ $payment->user->first_name }}
                                                            {{ $payment->user->middle_name }}
                                                            {{ $payment->user->last_name }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{-- {{ $payment->payment_date->format('Y-m-d') }} --}}
                                                            {{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ number_format($payment->amount, 2) }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ $payment->currency }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3 text-center">
                                                        <div class="text-sm">
                                                            @if ($payment->status === 'pending')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                                                {{ $payment->status }}
                                                            </span>
                                                            @elseif ($payment->status === 'completed')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                                                {{ $payment->status }}
                                                            </span>
                                                            @elseif ($payment->status === 'failed')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                                                {{ $payment->status }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-1.5">
                                                        <div class="inline-flex gap-2">
                                                            <a href="#" class="text-blue-600 text-sm hover:underline">
                                                                View
                                                            </a>

                                                            @if($payment->status === 'pending')
                                                            <button
                                                                wire:click="$dispatch('pass-payment-id', { id: '{{ $payment->id }}' })"
                                                                class="text-green-600 text-sm hover:underline">
                                                                Approve
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="8" class="text-center py-3">
                                                        <span class="text-sm font-semibold text-gray-800">No payments
                                                            available</span>
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
                                                    <span class="font-semibold text-gray-800">{{ $payments->total()
                                                        }}</span> Payments
                                                </p>
                                            </div>
                                            {{ $payments->links('vendor.pagination.custom') }}
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