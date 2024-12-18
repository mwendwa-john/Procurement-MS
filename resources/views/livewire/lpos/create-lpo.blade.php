<div class="bg-sky-50">
    @livewire('components.modals.lpo-modals')
    @livewire('components.modals.search-product-modal')


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
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <a href="#"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        Create LPO
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                            Create Local Purchase Order
                        </h1>
                    </div>
                    <!-- End Title -->

                </div>



                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">
                    <!-- Table Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

                        <div class="bg-white p-8 border border-t-4 border-t-blue-600 rounded-xl shadow-sm">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create Local Purchase Order</h2>
                            <x-livewire-forms submitAction="createLPO" formId="createLPOForm">
                                @csrf
                                <!-- LPO Grid -->
                                <div class="grid md:grid-cols-2 gap-3 gap-x-6">
                                    <!-- First Column -->
                                    <div class="space-y-3">
                                        <div>
                                            <label for="lpo_order_number" class="block text-sm mb-2 text-start">Order Number
                                                *</label>
                                            <input wire:model.live="lpo_order_number" type="text" name="lpo_order_number"
                                                id="lpo_order_number" disabled
                                                class="text-gray-800 px-4 py-2 block w-full rounded-lg text-sm border-blue-200 bg-gray-100"
                                                required>

                                            @error('lpo_order_number')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="hotel_id" class="block text-sm mb-2 text-start">Ship to (Hotel)
                                                *</label>
                                            <select wire:model.live="selectedHotel" name="hotel_id" id="hotel_id"
                                                class="px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                required>
                                                <option value="">select hotel</option>
                                                @foreach($hotels as $hotel)
                                                <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                                @endforeach
                                            </select>

                                            @error('selectedHotels')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div>
                                            <label for="supplier_id" class="block text-sm mb-2 text-start">
                                                Supplier*
                                            </label>
                                            <select wire:model.live="selectedSupplier" name="supplier_id"
                                                id="supplier_id"
                                                class="px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                required>
                                                <option value="">select hotel to load suppliers</option>
                                                @if ($selectedHotel)
                                                @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
                                                </option>
                                                @endforeach
                                                @endif
                                            </select>

                                            @error('selectedSupplier')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Second Column -->
                                    <div class="space-y-3">
                                        <div>
                                            <label for="tax_date" class="block text-sm mb-2 text-start">Tax Date</label>
                                            <input wire:model.live="tax_date" type="date" name="tax_date" id="tax_date"
                                                class="px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                            @error('tax_date')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="delivery_date" class="block text-sm mb-2 text-start">Delivery
                                                Date </label>
                                            <input wire:model.live="delivery_date" type="date" name="delivery_date"
                                                id="delivery_date"
                                                class="px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                            @error('delivery_date')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="payment_terms" class="block text-sm mb-2 text-start">Payment
                                                Terms </label>
                                            <textarea wire:model.live="payment_terms" name="payment_terms"
                                                id="payment_terms" rows="3"
                                                class="px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"></textarea>

                                            @error('payment_terms')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                    </div>
                                </div>
                                <!-- End LPO Grid -->

                                <!-- LPO Items Table -->
                                <div class="mt-6">
                                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Items</h3>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Item
                                                    </th>
                                                    
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Description
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Qty
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        UM
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Price
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        VAT
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Amount
                                                    </th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-blue-600 uppercase tracking-wider">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="items-table-body" class="bg-white divide-y divide-gray-200">
                                                @foreach ($lpoItems as $index => $lpoItem)
                                                <tr class="item-row">
                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ $lpoItem['item_name'] }}
                                                        </span>

                                                        @else
                                                        <input wire:model="lpoItems.{{ $index }}.item_name" type="text"
                                                            name="lpoItem[{{ $index }}][item_name]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ $lpoItem['description'] }}
                                                        </span>

                                                        @else
                                                        <input wire:model="lpoItems.{{ $index }}.description"
                                                            type="text" name="lpoItem[{{ $index }}][description]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ $lpoItem['expected_quantity'] }}
                                                        </span>

                                                        @else
                                                        <input wire:model.live.debounce.500ms="lpoItems.{{ $index }}.expected_quantity" type="number"
                                                            name="lpoItem[{{ $index }}][expected_quantity]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ $lpoItem['unit_of_measure'] }}
                                                        </span>

                                                        @else
                                                        <input wire:model="lpoItems.{{ $index }}.unit_of_measure"
                                                            type="text" name="lpoItem[{{ $index }}][unit_of_measure]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ number_format($lpoItem['price'], 2) }}
                                                        </span>

                                                        @else
                                                        <input wire:model.live.debounce.500ms="lpoItems.{{ $index }}.price" type="number"
                                                            name="lpoItem[{{ $index }}][price]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ $lpoItem['vat'] }}
                                                        </span>

                                                        @else
                                                        <input wire:model="lpoItems.{{ $index }}.vat" type="number"
                                                            name="lpoItem[{{ $index }}][vat]" disabled
                                                            class="text-gray-800 px-4 py-2 block w-full rounded-md text-sm bg-gray-100 border border-transparent">
                                                        @endif
                                                    </td>

                                                    <td class="px-3 py-2 whitespace-nowrap">
                                                        @if ($lpoItem['is_saved'])
                                                        <span class="block w-full text-sm">
                                                            {{ number_format($lpoItem['amount'], 2) }}
                                                        </span>

                                                        @else
                                                        <input wire:model.live="lpoItems.{{ $index }}.amount" type="number"
                                                            name="lpoItem[{{ $index }}][amount]"
                                                            class="block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                                        @endif
                                                    </td>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                                        @if ($editingIndex === $index)
                                                        <!-- When in edit mode -->
                                                        <button wire:click.prevent="updateItem({{ $index }})"
                                                            type="button"
                                                            class="px-2 py-1 text-xs font-medium text-teal-400 hover:underline">
                                                            Update
                                                        </button>
                                                        @elseif ($lpoItem['is_saved'])
                                                        <!-- When saved but not editing -->
                                                        <button wire:click.prevent="editItem({{ $index }})"
                                                            type="button"
                                                            class="px-2 py-1 text-xs font-medium text-blue-500 hover:underline">
                                                            Edit
                                                        </button>
                                                        @else
                                                        <!-- Default state when item is not saved -->
                                                        <button wire:click.prevent="saveItem({{ $index }})"
                                                            type="button"
                                                            class="px-2 py-1 text-xs font-medium text-teal-400 hover:underline">
                                                            Save
                                                        </button>
                                                        @endif
                                                        <!-- Always show Remove button -->
                                                        <button wire:click.prevent="removeItem({{ $index }})"
                                                            type="button"
                                                            class="px-2 py-1 text-xs font-medium text-red-600 hover:underline">
                                                            Remove
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


                                        <button wire:click.prevent='addItem' type="button" id="add-item"
                                            class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-500">
                                            Add Item
                                        </button>

                                        <!-- SearchBox Trigger -->
                                        <button type="button"
                                            class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                            aria-haspopup="dialog" aria-expanded="false"
                                            aria-controls="hs-search-product-modal"
                                            data-hs-overlay="#hs-search-product-modal">
                                            Search Product
                                        </button>

                                    </div>
                                </div>
                                <!-- End LPO Items Table -->

                                <!-- LPO Footer -->
                                <div>
                                    <div
                                        class="mt-8 flex flex-col sm:flex-row sm:justify-between space-y-4 sm:space-y-0 sm:space-x-8">
                                        <!-- VAT Summary Table -->
                                        <div class="w-full sm:max-w-md">
                                            <!-- VAT Inclusion Checkbox -->
                                            <div class="flex p-4">
                                                <input type="checkbox" wire:model.live="includeVat"
                                                    class="shrink-0 mt-0.5 border-blue-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    id="hs-default-checkbox">
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
                                                            {{ $vatRate }}%
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
                                                    <dt class="col-span-3 text-gray-500">Prepared by:</dt>
                                                    <dd class="col-span-2 font-medium text-gray-800">
                                                        {{ Auth::user()->first_name }}
                                                        {{ Auth::user()->middle_name }}
                                                        {{ Auth::user()->last_name }}
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
                                            </div>
                                            <!-- End Grid -->
                                        </div>
                                    </div>
                                    <!-- End Flex -->
                                </div>
                                <!-- End LPO Footer -->

                                <div class="mt-8 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700">
                                        Create LPO
                                    </button>
                                </div>


                            </x-livewire-forms>
                        </div>

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




    @script
    <script>
        $wire.on('close-product-search-modal', () => {
        // Handle the closing of the modal logic here
        const modal = document.getElementById('hs-search-product-modal');
        if (modal) {
            window.HSOverlay.close(modal);
        }
    });
    </script>
    @endscript

</div>