<div>
    <div class="bg-sky-50">
        @livewire('components.modals.lpo-modals')


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
                            View LPO
                        </a>

                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                                View a Local Purchase Order
                            </h1>
                        </div>
                        <!-- End Title -->
                    </div>

                    <!-- ========== MAIN CONTENT ========== -->
                    <main id="content">
                        <!-- LPO -->
                        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
                            <div class="bg-white p-8 border border-t-4 border-t-blue-600 rounded-xl shadow-sm">
                                <!-- Grid -->
                                <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200">
                                    <div>
                                        <h2 class="text-2xl font-semibold text-gray-800">Local Purchase Order</h2>
                                        <small>This is not a VAT Invoice</small>
                                    </div>
                                    <!-- Col -->

                                    <div class="inline-flex gap-x-2">
                                        <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
                                            href="#">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                                <polyline points="7 10 12 15 17 10" />
                                                <line x1="12" x2="12" y1="15" y2="3" />
                                            </svg>
                                            LPO PDF
                                        </a>
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                            href="#">
                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="6 9 6 2 18 2 18 9" />
                                                <path
                                                    d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                                                <rect width="12" height="8" x="6" y="14" />
                                            </svg>
                                            Print
                                        </a>
                                    </div>
                                    <!-- Col -->
                                </div>
                                <!-- End Grid -->

                                <!-- Grid -->
                                <div class="grid md:grid-cols-3 gap-3">
                                    <!-- First Column -->
                                    <div class="relative">
                                        <div class="grid space-y-3">
                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    LPO number:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $lpo->order_number }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Supplier:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $lpo->supplier->supplier_name }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Tax date:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $lpo->tax_date }}
                                                </dd>
                                            </dl>

                                        </div>
                                        <!-- Divider -->
                                        <div class="absolute inset-y-0 right-0 w-px bg-gray-200"></div>
                                    </div>

                                    <!-- Second Column -->
                                    <div class="relative">
                                        <div class="grid space-y-3">
                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Ship to:
                                                </dt>
                                                <dd class="text-gray-800">

                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Company VAT No:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{-- <span
                                                        class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium">P051426606A</span>
                                                    --}}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Shipping details:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    <span class="italic block font-semibold">{{ $lpo->hotel->hotel_name
                                                        }}</span>
                                                    <address class="italic font-normal">
                                                        {{ $lpo->hotel->address->city }}<br>
                                                        {{ $lpo->hotel->address->street }},<br>
                                                        {{ $lpo->hotel->address->postal_code }},<br>
                                                        {{ $lpo->hotel->address->state }}<br>
                                                    </address>
                                                </dd>
                                            </dl>
                                        </div>
                                        <!-- Divider -->
                                        <div class="absolute inset-y-0 right-0 w-px bg-gray-200"></div>
                                    </div>

                                    <!-- Third Column -->
                                    <div>
                                        <div class="grid space-y-3">
                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Payment Terms:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $lpo->payment_terms }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Delivery Date:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    {{ $lpo->delivery_date }}
                                                </dd>
                                            </dl>

                                            {{-- <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-500">
                                                    Contact:
                                                </dt>
                                                <dd class="font-medium text-gray-800">
                                                    John Doe<br>
                                                    <a class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 hover:underline font-medium"
                                                        href="#">
                                                        john@site.com
                                                    </a>
                                                </dd>
                                            </dl> --}}
                                        </div>
                                    </div>
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
                                                        Description</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Qty</th>

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
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach ($lpo->lpoItems as $item )
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                                                        {{ $loop->index + 1 }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $item->item_name }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $item->description }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $item->quantity }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $item->unit_of_measure }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $item->price }}
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $item->vat }}
                                                    </td>

                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-500">
                                                        {{ $item->amount }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End Table -->

                                <!-- LPO Footer -->
                                <div>
                                    <div
                                        class="mt-8 flex flex-col sm:flex-row sm:justify-between space-y-4 sm:space-y-0 sm:space-x-8">
                                        <!-- VAT Summary Table -->
                                        <div class="w-full sm:max-w-md">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Rate</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            KES VAT</th>
                                                        <th scope="col"
                                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            KES NET</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            16%</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($lpo->vat_total, 2) }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($lpo->subtotal, 2) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            TOTALS</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($lpo->vat_total, 2) }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($lpo->subtotal, 2) }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Existing Content -->
                                        <div class="w-full sm:max-w-2xl sm:text-end space-y-2">
                                            <!-- Grid -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">
                                                <dl class="grid grid-cols-5 gap-x-2 sm:gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Subtotal:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        KES {{ number_format($lpo->subtotal, 2) }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid grid-cols-5 gap-x-2 sm:gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">VAT Total:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        KES {{ number_format($lpo->vat_total, 2) }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid grid-cols-5 gap-x-2 sm:gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Total:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        KES {{ number_format($lpo->total_amount, 2) }}
                                                </dl>
                                            </div>
                                            <!-- End Grid -->
                                        </div>
                                    </div>

                                    <!-- Flex -->
                                    <div class="mt-8 flex sm:justify-end">
                                        <div class="w-full max-w-2xl sm:text-end space-y-2">
                                            <!-- Grid -->
                                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Prepared by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $generatedBy }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Checked by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">user</dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Authorized by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">user</dd>
                                                </dl>

                                                ==========================================================

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Generated by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $generatedBy }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Posted by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $postedBy }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Added to Daily Lpo by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $addedToDailyLpoBy }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Approved by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $approvedBy }}
                                                    </dd>
                                                </dl>
                                            </div>
                                            <!-- End Grid -->
                                        </div>
                                    </div>
                                    <!-- End Flex -->
                                </div>
                                <!-- End LPO Footer -->
                            </div>

                        </div>
                        <!-- End LPO -->
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