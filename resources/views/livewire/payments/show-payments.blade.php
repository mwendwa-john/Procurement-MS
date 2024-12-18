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
                                            <select wire:model.live="supplier_id" class="rounded-md border-gray-300">
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
                                            <select wire:model.live="has_invoice" class="rounded-md border-gray-300">
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
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payment
                                                        Date</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payment
                                                        Number</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payed
                                                        By</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Total
                                                        Amount</span>
                                                </th>
                                                {{-- <th scope="col" class="px-6 py-3 text-start">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Invoices</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Amount
                                                        Paid</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Balance</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    <span
                                                        class="text-xs font-semibold uppercase tracking-wide text-gray-800">Action</span>
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @forelse ($payments as $payment)
                                            <tr>
                                                <!-- Payment Details -->
                                                <td class="ps-6 py-3 text-blue-600">
                                                    <div class="text-sm font-semibold">
                                                        {{ ($payments->currentPage() - 1) * $payments->perPage() +
                                                        $loop->index + 1 }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{
                                                        \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d')
                                                        }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{ $payment->payment_number }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{ $payment->user->first_name }} {{ $payment->user->middle_name
                                                        }} {{ $payment->user->last_name }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-1.5">
                                                    <div class="text-sm">
                                                        {{ number_format($payment->amount_paid, 2) }}
                                                    </div>
                                                </td>

                                                <!-- Invoices for Payment -->
                                                <td colspan="4" class="px-6 py-1.5">
                                                    <table
                                                        class="min-w-full divide-y divide-gray-200 bg-gray-50 shadow-sm rounded-lg">
                                                        <thead class="bg-gray-100">
                                                            <tr>
                                                                <th
                                                                    class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-800 text-start">
                                                                    Invoice #</th>
                                                                <th
                                                                    class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-800 text-start">
                                                                    Amount Paid</th>
                                                                <th
                                                                    class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-800 text-start">
                                                                    Balance</th>
                                                                <th
                                                                    class="px-4 py-2 text-xs font-semibold uppercase tracking-wide text-gray-800 text-center">
                                                                    Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-gray-200">
                                                            @forelse ($payment->invoices as $invoice)
                                                            <tr>
                                                                <td class="px-4 py-2 text-sm">{{
                                                                    $invoice->invoice_number }}</td>
                                                                <td class="px-4 py-2 text-sm">Ksh {{
                                                                    number_format($invoice->pivot->amount_paid, 2) }}
                                                                </td>
                                                                <td class="px-4 py-2 text-sm">Ksh {{
                                                                    number_format($invoice->pivot->invoice_balance, 2)
                                                                    }}</td>
                                                                <td class="px-4 py-2 text-sm text-center">
                                                                    @if ($invoice->status === 'paid')
                                                                    <span
                                                                        class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Paid</span>
                                                                    @else
                                                                    <span
                                                                        class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="4"
                                                                    class="text-center py-2 text-sm text-gray-500">No
                                                                    invoices linked</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-3">
                                                    <span class="text-sm font-semibold text-red-400">No payments
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
                                                <span class="font-semibold text-gray-800">
                                                    {{ $payments->total() }}
                                                </span>
                                                Payments
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
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>