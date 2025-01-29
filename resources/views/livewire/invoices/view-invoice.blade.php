<div>
    <div class="bg-sky-50">

        <!-- Hero -->
        <div class="relative overflow-hidden">
            <!-- Gradients -->
            <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

                <div
                    class="bg-gradient-to-r from-cyan-300/50 via-blue-200 to-indigo-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
                </div>
                <div
                    class="bg-gradient-to-tl from-indigo-50 via-cyan-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
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
                            View Invoice
                        </a>

                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                                View this invoice
                            </h1>
                        </div>
                        <!-- End Title -->

                        @livewire('lpos.view-lpo-invoices-buttons', ['lpoNumber' => $invoice->lpo->lpo_order_number, 'invoiceNumber' => $invoice->invoice_number])

                    </div>

                    <!-- ========== MAIN CONTENT ========== -->
                    <main id="content">
                        <!-- Invoice -->
                        <div class="sm:w-11/12 lg:w-3/4 mt-10 mx-auto">
                            <!-- Buttons -->
                            {{-- <div class="m-6 flex justify-end gap-x-3">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="#">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                        <polyline points="7 10 12 15 17 10" />
                                        <line x1="12" x2="12" y1="15" y2="3" />
                                    </svg>
                                    Invoice PDF
                                </a>
                            </div> --}}
                            <!-- End Buttons -->

                            <!-- Card -->
                            <div class="bg-white border flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl shadow-sm
                                @if($invoice->status === 'unpaid') border-blue-500
                                @elseif($invoice->status === 'partial_payment') border-red-600
                                @elseif($invoice->status === 'payment_complete') border-teal-400
                                @else border-gray-600
                                @endif">
                                <!-- Grid -->
                                <div class="flex justify-between">
                                    <div>
                                        <div class="p-4 grid space-y-3 rounded-xl
                                            @if($invoice->status === 'unpaid') bg-blue-400
                                            @elseif($invoice->status === 'partial_payment') bg-red-300
                                            @elseif($invoice->status === 'payment_complete') bg-teal-300
                                            @else border-gray-600
                                            @endif">
                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] font-medium text-gray-800">
                                                    Invoice status:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $invoice->status }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] font-medium text-gray-800">
                                                    Supplier:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $invoice->supplier->supplier_name }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] font-medium text-gray-800">
                                                    Tax date:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $invoice->tax_date }}
                                                </dd>
                                            </dl>

                                        </div>

                                    </div>
                                    <!-- Col -->

                                    <div class="text-end">
                                        <h2 class="text-2xl md:text-3xl font-semibold text-gray-800">Invoice #</h2>
                                        <span class="mt-1 block text-blue-600">
                                            {{ $invoice->invoice_number }}
                                        </span>

                                        <dl class="mt-4 grid sm:flex gap-x-3 text-sm">
                                            <dt class="min-w-24 max-w-[200px] text-lg font-semibold text-gray-800">
                                                Supplier:
                                            </dt>
                                            <dd class="text-gray-800 text-sm">
                                                <span class="italic block font-semibold">
                                                    {{ $invoice->supplier->supplier_name }}
                                                </span>
                                                <address class="italic font-normal text-gray-800 text-sm">
                                                    {{ $invoice->supplier->address->city }}<br>
                                                    {{ $invoice->supplier->address->street }},<br>
                                                    {{ $invoice->supplier->address->postal_code }},<br>
                                                    {{ $invoice->supplier->address->state }}<br>
                                                </address>
                                            </dd>
                                        </dl>
                                    </div>
                                    <!-- Col -->
                                </div>
                                <!-- End Grid -->


                                <!-- Grid -->
                                <div class="mt-8 grid sm:grid-cols-2 gap-3">
                                    <div>
                                        <dl class="grid sm:flex gap-x-3 text-sm">
                                            <dt class="min-w-24 max-w-[200px] text-lg font-semibold text-gray-800">
                                                Bill to:
                                            </dt>
                                            <dd class="text-gray-800 text-sm">
                                                <span class="italic block font-semibold">{{ $invoice->hotel->hotel_name
                                                    }}</span>
                                                <address class="italic font-normal">
                                                    {{ $invoice->hotel->address->city }}<br>
                                                    {{ $invoice->hotel->address->street }},<br>
                                                    {{ $invoice->hotel->address->postal_code }},<br>
                                                    {{ $invoice->hotel->address->state }}<br>
                                                </address>
                                            </dd>
                                        </dl>
                                    </div>
                                    <!-- Col -->

                                    <div class="sm:text-end space-y-2">
                                        <!-- Grid -->
                                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                                <dt class="col-span-3 font-semibold text-gray-800">Invoice date:</dt>
                                                <dd class="col-span-2 text-gray-500">
                                                    {{ $invoice->delivery_date }}
                                                </dd>
                                            </dl>
                                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                                <dt class="col-span-3 font-semibold text-gray-800">Lpo due date:</dt>
                                                <dd class="col-span-2 text-gray-500">
                                                    {{ $invoice->lpo->delivery_date }}
                                                </dd>
                                            </dl>
                                        </div>
                                        <!-- End Grid -->
                                    </div>
                                    <!-- Col -->
                                </div>
                                <!-- End Grid -->



                                <!-- Table -->
                                <div class="mt-6 border border-gray-200 p-4 rounded-lg">
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        #</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Item</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Expected Qty</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Delivered Qty</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Pending Qty</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        UM</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Price</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        VAT</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-right text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="space-y-6">
                                                @forelse ($invoice->invoiceItems as $item)
                                                <tr
                                                    class="sm:space-y-0 space-y-3 {{ $item->lpoItem['is_delivered'] ? 'bg-teal-100' : ($item->lpoItem['is_pending'] ? 'bg-blue-100' : 'bg-red-50') }}">

                                                    <td
                                                        class="px-2 py-2 whitespace-nowrap text-sm font-medium text-blue-600">
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td class="text-gray-700 text-start text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Item</div>
                                                        {{ $item->lpoItem->item_name }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Ordered Qty</div>
                                                        {{ $item->lpoItem->expected_quantity }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Delivered Qty</div>
                                                        {{ $item->quantity_delivered }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Delivered Qty</div>
                                                        {{ $item->quantity_pending }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            UM</div>
                                                        {{ $item->lpoItem->unit_of_measure }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Price</div>
                                                        {{ number_format($item->lpoItem->price, 2) }}
                                                    </td>

                                                    <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            VAT</div>
                                                        {{ number_format($item->lpoItem->vat) }}%
                                                    </td>

                                                    <td class="text-gray-700 text-center text-right text-sm py-2 px-2">
                                                        <div
                                                            class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                            Amount</div>
                                                        {{ number_format($item->invoice_amount, 2) }}
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr class="sm:space-y-0 space-y-3">
                                                    <td colspan="9"
                                                        class="text-center text-orange-500 font-medium py-2 px-2">
                                                        <!-- Adjusted colspan to match columns -->
                                                        No items on this invoice
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Table -->



                                <!-- Grid -->
                                <div class="mt-10 grid sm:grid-cols-2 gap-3">
                                    <div>
                                        <dl class="grid sm:flex gap-x-3 text-sm">
                                            <dt class="min-w-24 max-w-[200px] text-base font-semibold text-gray-800">
                                                Prepared by:
                                            </dt>
                                            <dd class="text-gray-800 text-sm">
                                                <span class="italic block font-semibold">
                                                    {{ $invoice->invoiceAttachedBy?->full_name ?? 'N/A' }}
                                                </span>
                                            </dd>
                                        </dl>


                                        <dl class="grid sm:flex gap-x-3 text-sm">
                                            <dt class="min-w-24 max-w-[200px] text-base font-semibold text-gray-800">
                                                Comments:
                                            </dt>
                                            <dd class="text-gray-800 text-sm">
                                                <span class="italic block font-semibold">{{ $invoice->hotel->hotel_name
                                                    }}</span>
                                                <address class="italic font-normal">
                                                    {{ $invoice->hotel->address->city }}<br>
                                                    {{ $invoice->hotel->address->street }},<br>
                                                    {{ $invoice->hotel->address->postal_code }},<br>
                                                    {{ $invoice->hotel->address->state }}<br>
                                                </address>
                                            </dd>
                                        </dl>
                                    </div>
                                    <!-- Col -->

                                    <div class="w-full max-w-2xl sm:text-end space-y-2">
                                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                                <dt class="col-span-3 font-semibold text-gray-800">Subtotal:</dt>
                                                <dd class="col-span-2 text-gray-500">
                                                    {{ number_format($invoice->subtotal, 2) }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                                <dt class="col-span-3 font-semibold text-gray-800">Total VAT:</dt>
                                                <dd class="col-span-2 text-gray-500">
                                                    {{ number_format($invoice->vat_total, 2) }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                                <dt class="col-span-3 font-semibold text-gray-800">Total quote:</dt>
                                                <dd class="col-span-2 text-gray-500">
                                                    {{ number_format($invoice->total_amount, 2) }}
                                                </dd>
                                            </dl>

                                            <div class="mt-4">
                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                    <dt class="col-span-3 font-semibold text-gray-800">Amount paid:</dt>
                                                    <dd class="col-span-2 text-gray-500">$0.00</dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                                    <dt class="col-span-3 font-semibold text-gray-800">Due balance:</dt>
                                                    <dd class="col-span-2 text-gray-500">$0.00</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Grid -->
                            </div>
                            <!-- End Card -->



                        </div>
                        <!-- End Invoice -->
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


</div>