<div class="bg-sky-50">
    @livewire('payments.payments-index')


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


        <div class="relative z-10">
            <!-- ========== MAIN CONTENT ========== -->
            <main id="content">
                <!-- Table Section -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Card -->
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div
                                    class="bg-white border border-t-4 border-t-blue-600 border-blue-400 rounded-xl shadow-sm overflow-hidden">
                                    <!-- Header -->
                                    <div
                                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                        <div>
                                            <h2 class="text-xl font-semibold text-blue-600">
                                                Invoice Payments
                                            </h2>
                                        </div>

                                        <div class="flex gap-4">
                                            <!-- Supplier Filter -->
                                            <select wire:model.live="supplier_id"
                                                class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                                <option value="">All Suppliers</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
                                                </option>
                                                @endforeach
                                            </select>

                                            @if(!auth()->user()->hasRole('store-keeper'))
                                            <!-- Hotel Filter -->
                                            <select wire:model.live="hotel_id"
                                                class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                                <option value="">All Hotels</option>
                                                @foreach($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                                @endforeach
                                            </select>
                                            @endif

                                            <!-- Search Input -->
                                            <input type="text" wire:model.live="search" placeholder="Search..."
                                                class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" />
                                        </div>
                                    </div>
                                    <!-- End Header -->

                                    <!-- Table -->
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="ps-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">#</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">Invoice
                                                        Date</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">Hotel</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">Supplier</span>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">Status</span>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">
                                                        Invoice Number
                                                    </span>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">
                                                        Total Amount
                                                    </span>
                                                </th>

                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-blue-600">
                                                        Action
                                                    </span>
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @forelse ($invoices as $invoice)
                                            <tr class="hover:bg-gray-100">
                                                <td class="ps-6 py-3 text-blue-600">
                                                    <div class="text-sm font-semibold">
                                                        {{ ($invoices->currentPage() - 1) * $invoices->perPage() +
                                                        $loop->index + 1 }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm font-semibold text-gray-800">
                                                        {{ $invoice->delivery_date }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm font-semibold text-gray-800">
                                                        {{ $invoice->hotel->hotel_name }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-3">
                                                    <div class="text-sm">
                                                        {{ $invoice->supplier->supplier_name }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-3 text-center">
                                                    <div class="text-sm">
                                                        @if ($invoice->status === 'unpaid')
                                                        <span
                                                            class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                                            {{ $invoice->status }}
                                                        </span>

                                                        @elseif ($invoice->status === 'partial_payment')
                                                        <span
                                                            class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">
                                                            {{ $invoice->status }}
                                                        </span>

                                                        @elseif ($invoice->status === 'payment_complete')
                                                        <span
                                                            class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                                                            {{ $invoice->status }}
                                                        </span>
                                                        @endif
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{ $invoice->invoice_number }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{ number_format($invoice->total_amount, 2) }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="inline-flex gap-2">
                                                        <a href="{{ route('invoice.view', ['invoiceNumber' => $invoice->invoice_number]) }}"
                                                            class="py-2 px-2.5 inline-flex items-center font-medium text-[12px] rounded-lg bg-orange-400 text-white hover:bg-orange-500">
                                                            View
                                                        </a>

                                                        @can('make payments on invoice')
                                                        @if ($invoice->status === 'unpaid' || $invoice->status ===
                                                        'partial_payment')
                                                        <button
                                                            wire:click="$dispatch('add-to-cart', { id: '{{ $invoice->id }}' })"
                                                            class="py-2 px-2.5 inline-flex items-center font-medium text-[12px] rounded-lg bg-blue-600 text-white hover:bg-blue-700">
                                                            Add to cart
                                                        </button>
                                                        @endif
                                                        @endcan
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-3">
                                                    <span class="text-sm font-semibold text-red-400">
                                                        No invoices available
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforelse
                                            <tr>
                                                <td></td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-base font-bold text-blue-600">
                                                        Total Amount
                                                    </div>
                                                </td>

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-base font-bold text-blue-600">
                                                        Ksh {{ number_format($invoices->sum('total_amount'), 2) }}

                                                    </div>
                                                </td>

                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End Table -->

                                    <!-- Footer -->
                                    <div class="px-6 py-4 border-t border-gray-200 flex justify-between">
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-semibold text-gray-800">
                                                    {{ $invoices->total() }}
                                                </span> Invoices
                                            </p>
                                        </div>
                                        {{ $invoices->links('vendor.pagination.custom') }}
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
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>