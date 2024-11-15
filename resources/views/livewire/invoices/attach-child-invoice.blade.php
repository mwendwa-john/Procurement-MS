<div class="bg-sky-50">
    @livewire('components.modals.lpo-modals')


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-r from-indigo-300/50 via-violet-200 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-purple-50 via-violet-100 to-indigo-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
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
                        Attach Child Invoice
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-blue-600 text-2xl">
                            An invoice exists with the same lpo, add pending items.
                        </h1>
                    </div>
                    <!-- End Title -->

                </div>


                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">

                    <div class="max-w-2xl text-center mx-auto">
                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            <h1 class="block font-semibold text-blue-600 text-2xl">
                                Pending Items
                            </h1>
                        </div>
                        <!-- End Title -->
                    </div>

                    <!-- New Child Invoice -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        <div class="bg-white p-8 border border-t-4 border-t-blue-600 rounded-xl shadow-sm">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Attach Invoice</h2>
                            <x-livewire-forms submitAction="attachChildInvoice" formId="attachInvoiceForm">
                                @csrf

                                <!-- Grid -->
                                <div class="grid md:grid-cols-3 gap-3">
                                    <!-- First Column -->
                                    <div class="relative">
                                        <div class="grid space-y-3">
                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Prev Invoice No:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    <div class="flex flex-col">
                                                        @foreach ($lpo->invoices as $invoice)
                                                        <span class="mb-1">{{ $invoice->invoice_number }}</span>
                                                        @endforeach
                                                    </div>
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] font-semibold text-gray-700">
                                                    Invoice number:
                                                </dt>
                                                <dd class="px-4">
                                                    <input wire:model.live="invoice_number" type="text"
                                                        name="invoice_number" id="invoice_number"
                                                        class="px-4 py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        required>
                                                </dd>
                                            </dl>
                                            @error('invoice_number')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] font-semibold text-gray-700">
                                                    Delivery date:
                                                </dt>
                                                <dd class="px-4">
                                                    <input wire:model.live="delivery_date" type="date"
                                                        name="delivery_date" id="delivery_date"
                                                        class="px-4 py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        required>
                                                </dd>
                                                @error('delivery_date')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    LPO Order number:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    {{ $lpo->lpo_order_number }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Tax date:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    {{ $lpo->tax_date ? \Carbon\Carbon::parse($lpo->tax_date)->format('F
                                                    j, Y') : 'No date selected' }}
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
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Ship to (Hotel):
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    {{ $lpo->hotel ? $lpo->hotel->hotel_name : 'No hotel selected' }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Payment Terms:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    {{ $lpo->payment_terms }}
                                                </dd>
                                            </dl>

                                            <dl class="grid sm:flex gap-x-3 text-sm">
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Delivery Date:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    {{ $lpo->delivery_date ?
                                                    \Carbon\Carbon::parse($lpo->delivery_date)->format('F j, Y') : 'No
                                                    date selected' }}
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
                                                <dt class="min-w-36 max-w-[200px] text-gray-700 font-medium">
                                                    Supplier address:
                                                </dt>
                                                <dd
                                                    class="text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100">
                                                    <span class="italic block font-semibold">{{
                                                        $lpo->supplier->supplier_name
                                                        }}</span>
                                                    <address class="italic font-normal">
                                                        {{ $lpo->supplier->address->city }}<br>
                                                        {{ $lpo->supplier->address->street }},<br>
                                                        {{ $lpo->supplier->address->postal_code }},<br>
                                                        {{ $lpo->supplier->address->state }}<br>
                                                    </address>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Grid -->



                                <!-- Invoice Items Table -->
                                <div class="mt-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4">
                                        Pending and undelivered LPO Items
                                    </h3>
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
                                                        Expected Qty</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Pending Qty</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        New Delivered Qty</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        New Pending Qty</th>
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
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Amount</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Status</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="items-table-body" class="bg-white divide-y divide-gray-200">
                                                @foreach ($lpoItems as $index => $lpoItem)
                                                <tr
                                                    class="item-row {{ $lpoItem['is_delivered'] ? 'bg-teal-100' : ($lpoItem['is_pending'] ? 'bg-blue-100' : 'bg-red-50') }}">
                                                    <td class="ps-6 py-3">
                                                        <span class="block w-full text-sm">
                                                            <div
                                                                class="text-sm font-semibold {{ $lpoItem['is_delivered'] ? 'text-blue-600' : 'text-red-500' }}">
                                                                {{ $loop->index + 1 }}
                                                            </div>
                                                        </span>

                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.item_name" type="text"
                                                            name="lpoItem[{{ $index }}][item_name]" disabled
                                                            class="text-gray-800 px-4 py-2 block w-full min-w-40 rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.description"
                                                            type="text" name="lpoItem[{{ $index }}][description]"
                                                            disabled
                                                            class="text-gray-800 px-4 py-2 block w-full rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.expected_quantity"
                                                            type="number" disabled
                                                            name="lpoItem[{{ $index }}][expected_quantity]"
                                                            class="text-gray-800 px-4 py-2 block w-full rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.pending_quantity"
                                                            type="text" name="lpoItem[{{ $index }}][pending_quantity]"
                                                            disabled
                                                            class="text-gray-800 px-4 py-2 block w-full min-w-20 rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input
                                                            wire:model.live.debounce.800ms="lpoItems.{{ $index }}.new_delivered_quantity"
                                                            type="number"
                                                            name="lpoItem[{{ $index }}][new_delivered_quantity]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input
                                                            wire:model.live.debounce.800ms="lpoItems.{{ $index }}.new_pending_quantity"
                                                            type="number"
                                                            name="lpoItem[{{ $index }}][new_pending_quantity]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.unit_of_measure"
                                                            type="text" name="lpoItem[{{ $index }}][unit_of_measure]"
                                                            disabled
                                                            class="text-gray-800 px-4 py-2 block w-full min-w-20 rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input
                                                            wire:model.live.debounce.800ms="lpoItems.{{ $index }}.price"
                                                            type="number" name="lpoItem[{{ $index }}][price]"
                                                            step="0.01" min="0"
                                                            class="block w-full min-w-24 shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        <input wire:model="lpoItems.{{ $index }}.vat" type="number"
                                                            name="lpoItem[{{ $index }}][vat]" disabled
                                                            class="text-gray-800 px-4 py-2 block w-full min-w-[87px] rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-3 py-2">
                                                        <input wire:model.live="lpoItems.{{ $index }}.amount"
                                                            type="number" name="lpoItem[{{ $index }}][amount]"min="0" disabled
                                                            class="text-gray-800 py-2 block w-full min-w-[x] rounded-md text-sm bg-gray-100 border border-transparent">
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                                        @if ($lpoItem['is_delivered'])
                                                        <span
                                                            class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-200 text-teal-800 rounded-full">
                                                            Delivered
                                                        </span>
                                                        @elseif ($lpoItem['is_pending'])
                                                        <span
                                                            class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-200 text-blue-800 rounded-full">
                                                            Pending
                                                        </span>
                                                        @else
                                                        <span
                                                            class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-red-200 text-red-800 rounded-full">
                                                            Not Delivered
                                                        </span>
                                                        @endif
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                                        <button wire:click.prevent="saveItem({{ $index }})"
                                                            type="button"
                                                            class="px-2 py-1 text-xs font-medium text-teal-400 hover:underline">
                                                            Save
                                                        </button>
                                                    </td>

                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>

                                        <!-- Display Error if exists -->
                                        @error('lpoItems')
                                        <div x-data="{ show: true }" x-show="show"
                                            x-init="setTimeout(() => show = false, 3000)">
                                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <!-- End Invoice Items Table -->

                                <!-- Invoice Footer -->
                                <div>
                                    <div
                                        class="mt-8 flex flex-col sm:flex-row sm:justify-between space-y-4 sm:space-y-0 sm:space-x-8">
                                        <!-- VAT Summary Table -->
                                        <div class="w-full sm:max-w-md">
                                            <!-- VAT Inclusion Checkbox -->
                                            <div class="flex p-4">
                                                @if ($lpo->include_vat)
                                                <input type="checkbox" wire:model.live="includeVat" checked disabled
                                                    class="shrink-0 mt-0.5 checked: border-blue-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-default-checkbox">
                                                @else
                                                <input type="checkbox" wire:model.live="includeVat" disabled
                                                    class="shrink-0 mt-0.5 border-blue-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-default-checkbox">
                                                @endif
                                                <label for="hs-default-checkbox" class="text-sm text-gray-700 ms-3">
                                                    Include VAT in total price
                                                </label>
                                            </div>
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
                                                            {{ $vatRate }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($vat_total, 2) }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($subtotal, 2) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            TOTALS</td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($vat_total, 2) }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                            {{ number_format($subtotal, 2) }}
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
                                                        KES {{ number_format($subtotal, 2) }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid grid-cols-5 gap-x-2 sm:gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">VAT Total:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        KES {{ number_format($vat_total, 2) }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid grid-cols-5 gap-x-2 sm:gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Total:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        KES {{ number_format($total_amount, 2) }}
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
                                                    <dt class="col-span-3 text-gray-500">Created by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $lpo->createdBy?->full_name ?? 'N/A' }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Posted by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $lpo->postedBy?->full_name ?? 'N/A' }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Added to Daily Lpo by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $lpo->addedToDailyLposBy?->full_name ?? 'N/A' }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Approved by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $lpo->approvedBy?->full_name ?? 'N/A' }}
                                                    </dd>
                                                </dl>

                                                <dl class="grid sm:grid-cols-5 gap-x-3 text-sm">
                                                    <dt class="col-span-3 text-gray-500">Invoice attached by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ $lpo->invoiceAttachedBy?->full_name ?? 'N/A' }}
                                                    </dd>
                                                </dl>
                                            </div>
                                            <!-- End Grid -->
                                        </div>
                                    </div>
                                    <!-- End Flex -->
                                </div>
                                <!-- End Invoice Footer -->

                                <div class="mt-8 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700">
                                        Attach Invoice
                                    </button>
                                </div>


                            </x-livewire-forms>

                        </div>

                    </div>
                    <!-- End New Child Invoice -->

                    <div class="max-w-2xl text-center mx-auto">
                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            <h1 class="block font-semibold text-blue-600 text-2xl">
                                Previous Invoices
                            </h1>
                        </div>
                        <!-- End Title -->
                    </div>


                    <!-- Existing Invoices -->
                    @foreach ($relatedInvoices as $invoice)
                    <!-- Invoice -->
                    <div class="sm:w-11/12 lg:w-3/4 mt-10 mx-auto">
                        <!-- Buttons -->
                        {{-- <div class="m-6 flex justify-end gap-x-3">
                            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                    <polyline points="7 10 12 15 17 10" />
                                    <line x1="12" x2="12" y1="15" y2="3" />
                                </svg>
                                Invoice PDF
                            </a>
                        </div> --}}
                        <!-- End Buttons -->

                        <!-- Card -->
                        <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl">
                            <!-- Grid -->
                            <div class="flex justify-between">
                                <div>
                                    <a href="{{ route('home') }}">
                                        <img class="w-auto h-16 mx-auto"
                                            src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="logo">
                                    </a>

                                    <h1 class="mt-2 text-lg md:text-xl font-semibold text-red-600">Superior Hotels,
                                        Kenya.
                                    </h1>
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
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Item</div>
                                                    {{ $item->lpoItem->item_name }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Ordered Qty</div>
                                                    {{ $item->lpoItem->expected_quantity }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Delivered Qty</div>
                                                    {{ $item->quantity_delivered }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Delivered Qty</div>
                                                    {{ $item->quantity_pending }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        UM</div>
                                                    {{ $item->lpoItem->unit_of_measure }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Price</div>
                                                    {{ number_format($item->lpoItem->price, 2) }}
                                                </td>

                                                <td class="text-gray-700 text-center text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        VAT</div>
                                                    {{ number_format($item->lpoItem->vat) }}%
                                                </td>

                                                <td class="text-gray-700 text-center text-right text-sm py-2 px-2">
                                                    <div class="sm:hidden text-xs font-medium text-gray-500 uppercase">
                                                        Amount</div>
                                                    {{ number_format($item->invoice_amount, 2) }}
                                                </td>
                                            </tr>
                                            @empty
                                            <tr class="sm:space-y-0 space-y-3">
                                                <td colspan="6"
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
                                                {{ $invoice->lpo->invoiceAttachedBy?->full_name ?? 'N/A' }}
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
                                                {{ $invoice->subtotal }}
                                            </dd>
                                        </dl>

                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800">Total VAT:</dt>
                                            <dd class="col-span-2 text-gray-500">
                                                {{ $invoice->vat_total }}
                                            </dd>
                                        </dl>

                                        <dl class="grid sm:grid-cols-5 gap-x-3">
                                            <dt class="col-span-3 font-semibold text-gray-800">Total quote:</dt>
                                            <dd class="col-span-2 text-gray-500">
                                                {{ $invoice->total_amount }}
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
                    @endforeach
                    <!-- End Existing Invoices -->

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