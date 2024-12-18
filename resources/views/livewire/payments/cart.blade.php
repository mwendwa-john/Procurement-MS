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
                <!-- Card Section -->
                <div class="max-w-[95rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Title -->
                    <div class="max-w-2xl my-3 text-center mx-auto">
                        <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                            Invoices In Cart
                        </h1>
                    </div>
                    <!-- End Title -->


                    <!-- Responsive Grid -->
                    <div class="grid mt-6 grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
                        <!-- Card -->
                        @forelse ($invoices as $invoice)
                        <div
                            class="group flex flex-col bg-white border shadow-sm rounded-xl border-gray-300 hover:border-blue-400 hover:shadow-md focus:outline-none focus:shadow-md transition">
                            <div class="p-4 md:p-5">
                                <div class="flex justify-between items-center gap-x-3">
                                    <div class="grow">
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center">
                                                <input wire:model.live="selectedInvoices" value="{{ $invoice->id }}"
                                                    type="checkbox"
                                                    class="shrink-0 mt-0.5 border-blue-400 rounded text-blue-600 focus:ring-blue-300 disabled:opacity-50 disabled:pointer-events-none transition duration-150 ease-in-out ml-auto" />
                                                <label for="selectedInvoices"
                                                    class="block ml-2 text-sm text-gray-400 leading-5">
                                                    Pay Invoice
                                                </label>
                                            </div>
                                            <button
                                                wire:click="$dispatch('remove-from-cart', { id: '{{ $invoice->id }}' })"
                                                class="inline-flex items-center gap-x-1 px-2 text-sm text-red-400 decoration-2 hover:underline font-medium">
                                                Remove
                                            </button>
                                        </div>

                                        <a
                                            href="{{ route('invoice.view', ['invoiceNumber' => $invoice->invoice_number]) }}">
                                            <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                                {{ $invoice->invoice_number }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                {{ $invoice->delivery_date }}
                                            </p>

                                            <dl class="my-2 grid sm:flex gap-x-3 text-sm">
                                                <dt class="text-sm font-medium text-gray-800">
                                                    Supplier:
                                                </dt>
                                                <dd class="text-gray-500 text-sm italic font-medium">
                                                    {{ $invoice->supplier->supplier_name }}
                                                </dd>
                                            </dl>

                                            <dl class="my-2 grid sm:flex gap-x-3 text-sm">
                                                <dt class="text-sm font-medium text-gray-800">
                                                    Hotel:
                                                </dt>
                                                <dd class="text-gray-500 text-sm italic font-medium">
                                                    {{ $invoice->hotel->hotel_name }}
                                                </dd>
                                            </dl>

                                            <dl class="my-2 grid sm:flex gap-x-3 text-sm">
                                                <dt class="text-sm font-medium text-gray-800">
                                                    Total Amount:
                                                </dt>
                                                <dd class="text-gray-500 text-sm italic font-medium">
                                                    {{ number_format($invoice->total_amount, 2) }}
                                                </dd>
                                            </dl>
                                        </a>
                                    </div>
                                    <div>
                                        <svg class="shrink-0 w-5 h-5 text-gray-800 group-hover:text-blue-600"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="max-w-2xl my-3 text-center mx-auto">
                            <h1 class="block font-semibold text-red-400 text-base">
                                No invoices in Cart
                            </h1>
                        </div>
                        @endforelse
                        <!-- End Card -->
                    </div>
                    <!-- End Responsive Grid -->



                    <!-- Checkout -->
                    <div
                        class="block border bg-gray-200 border-gray-300 max-w-[85rem] md:max-w-[75rem] my-10 mx-auto rounded-lg hover:shadow-sm">
                        <div class="relative overflow-hidden">
                            
                            <div class="p-4">
                                <h3 class="font-semibold text-xl text-blue-600">Checkout</h3>
                                <h2 class="font-medium text-base text-gray-600 mb-4">
                                    Pay for the below invoices efficiently
                                </h2>

                                <x-livewire-forms submitAction="processPayments" formId="processPaymentsForm">
                                    @csrf

                                    <!-- Table for invoices -->
                                    <div class="overflow-auto rounded-xl bg-white">
                                        <table class="w-full table-auto border-collapse border border-gray-300 text-sm">
                                            <thead class="bg-blue-50 sticky top-0 z-10">
                                                <tr class="text-left text-blue-600 font-semibold">
                                                    <th class="border border-gray-300 px-4 py-2">Invoice Number</th>
                                                    <th class="border border-gray-300 px-4 py-2">Invoice Date</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-right">Total Amount
                                                        (Ksh)
                                                    </th>
                                                    <th class="border border-gray-300 px-4 py-2 text-right">Payment
                                                        Amount</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-right">Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($selectedInvoices as $selectedInvoiceId)
                                                @php
                                                $invoice = $invoices->find($selectedInvoiceId);
                                                @endphp
                                                <tr class="hover:bg-gray-100">
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        {{ $invoice->invoice_number }}
                                                    </td>

                                                    <td class="border border-gray-300 px-4 py-2">
                                                        {{ $invoice->delivery_date }}
                                                    </td>

                                                    <td class="border border-gray-300 px-4 py-2 text-right">
                                                        {{ number_format($invoice->total_amount, 2) }}
                                                    </td>

                                                    <td class="border border-gray-300 px-4 py-2 text-right">
                                                        <input type="number"
                                                            wire:model.live.debounce.500ms="payments.{{ $invoice->id }}.invoice_amount"
                                                            max="{{ $invoice->total_amount }}"
                                                            class="border border-blue-200 rounded-lg text-sm px-4 py-2 text-blue-500 focus:ring focus:ring-blue-200">

                                                        <button wire:click.prevent="fillFullAmounts({{ $invoice->id }})"
                                                            type="button"
                                                            class="px-2 py-1 border-none text-xs font-medium text-teal-400 hover:underline">
                                                            Fill Full Amounts
                                                        </button>
                                                    </td>

                                                    <td class="border border-gray-300 px-4 py-2 text-right">
                                                        <input type="text"
                                                            wire:model="payments.{{ $invoice->id }}.due_balance"
                                                            disabled
                                                            class="bg-gray-100 border border-gray-300 rounded-lg text-sm px-4 py-2 text-red-500">
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr class="hover:bg-gray-100">
                                                    <td colspan="5" class="border text-center text-red-500 px-4 py-2">
                                                        Select invoices to checkout
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Batch Actions -->
                                    <div class="flex justify-between items-center mt-4">
                                        <div class="text-gray-800 font-medium text-sm">
                                            Total amount paid:
                                            <span class="text-blue-600">
                                                Ksh {{ number_format($totalPaymentAmount, 2) }}</span>
                                        </div>

                                        <div class="text-gray-800 font-medium text-sm">
                                            Total amount to pay:
                                            <span class="text-blue-600">
                                                Ksh {{ number_format($invoicesTotalAmount, 2) }}</span>
                                        </div>
                                    </div>

                                    <!-- Payment Details -->
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-gray-100 p-4 rounded-lg mt-6">
                                        <!-- Payment number -->
                                        <div>
                                            <label for="payment_number"
                                                class="block text-sm font-medium text-gray-800 mb-1">
                                                Payment number
                                            </label>

                                            <input wire:model="payment_number" type="text" disabled id="payment_number"
                                                class="px-4 py-2 w-full border border-blue-200 rounded-lg text-sm focus:ring focus:ring-blue-300">

                                            @error('payment_number')
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <!-- Payment Date -->
                                        <div>
                                            <label for="payment_date"
                                                class="block text-sm font-medium text-gray-800 mb-1">
                                                Payment Date
                                            </label>
                                            <input wire:model="payment_date" type="date" id="payment_date"
                                                class="px-4 py-2 w-full border border-blue-200 rounded-lg text-sm focus:ring focus:ring-blue-300">

                                            @error('payment_date')
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <!-- Paid By -->
                                        <div>
                                            <label for="payed_by" class="block text-sm font-medium text-gray-800 mb-1">
                                                Paid By
                                            </label>
                                            <select wire:model="payed_by" id="payed_by"
                                                class="px-4 py-2 w-full border border-blue-200 rounded-lg text-sm focus:ring focus:ring-blue-300">
                                                <option value="" disabled>Select user</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('payed_by')<span class="text-red-500 text-sm">{{ $message
                                                }}</span>@enderror
                                        </div>

                                        <!-- Payment Method -->
                                        <div>
                                            <label for="payment_method"
                                                class="block text-sm font-medium text-gray-800 mb-1">
                                                Payment Method
                                            </label>
                                            <!-- Floating Select -->
                                            <div class="relative">
                                                <select wire:model.live="payment_method"
                                                    class="pe-9 block w-full bg-gray-100 border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                                    <option disabled>select method</option>
                                                    @foreach ($paymentMethods as $paymentMethod)
                                                    <option value="{{ $paymentMethod->id }}">
                                                        {{ $paymentMethod->payment_method_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- End Floating Select -->

                                            @error('payment_method')
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div>
                                            <label for="description"
                                                class="block text-sm font-medium text-gray-800 mb-1">
                                                Description
                                            </label>
                                            <textarea wire:model="description" id="description" rows="3"
                                                class="px-4 py-2 w-full border border-blue-200 rounded-lg text-sm focus:ring focus:ring-blue-300"
                                                placeholder="Enter description">
                                            </textarea>

                                            @error('description')
                                            <span class="text-red-500 text-sm">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    @can('make payments on invoice')
                                    <div class="flex justify-center items-center mt-6">
                                        <button type="submit"
                                            class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-blue-700 focus:ring focus:ring-blue-300">
                                            Complete Payment
                                        </button>
                                    </div>
                                    @endcan
                                </x-livewire-forms>
                            </div>
                        </div>
                    </div>
                    <!-- End Checkout -->




                </div>
                <!-- End Card Section -->
            </main>
            <!-- ========== END MAIN CONTENT ========== -->
        </div>
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>