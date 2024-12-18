<div>

    <!--  Add Expense -->
    <div wire:ignore.self id="hs-add-expense"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-add-expense-label">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">

            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">

                <div class="flex justify-end items-center py-3 px-4">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-add-expense">
                        <span class="sr-only">Close</span>

                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        Add Expense
                    </h3>

                    <div class="mt-5">
                        @livewire('expenses.create-expense')

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  End: Add Expense -->



    <!--  View Expense -->
    <div wire:ignore.self id="hs-modal-view-expense"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-modal-view-expense-label">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">

            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">

                <div class="flex justify-end items-center py-3 px-4">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-modal-view-expense">
                        <span class="sr-only">Close</span>

                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        View Expense
                    </h3>

                    <!-- Expense Details -->
                    <div class="relative">
                        <div class="space-y-3">
                            <!-- Item Name -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Item Name:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $item_name }}
                                </dd>
                            </dl>

                            <!-- Description -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Description:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $description ?? 'N/A' }}
                                </dd>
                            </dl>

                            <!-- Unit of Measure -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Unit of Measure:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $unit_of_measure ?? 'N/A' }}
                                </dd>
                            </dl>

                            <!-- Quantity -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Quantity:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $quantity ?? 'N/A' }}
                                </dd>
                            </dl>

                            <!-- Amount -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Amount:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ number_format($amount, 2) }}
                                </dd>
                            </dl>

                            <!-- Supplier Number -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Supplier Number:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $supplier_number }}
                                </dd>
                            </dl>

                            <!-- Expense Category -->
                            <dl class="sm:flex gap-x-3 text-sm">
                                <dt class="min-w-36 max-w-[200px] text-gray-700">
                                    Expense Category:
                                </dt>
                                <dd
                                    class="font-medium text-gray-800 mx-4 px-4 py-2 block w-full rounded-lg text-sm bg-gray-100 text-right">
                                    {{ $expense_category_code }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- End Expense Details -->




                    <!-- Buttons - Cancel -->
                    <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-modal-view-expense">
                            Cancel
                        </button>
                    </div>
                    <!-- End Buttons -->
                </div>
            </div>

        </div>
    </div>
    <!--  End: View Expense -->


    <!--  Edit Expense -->
    <div wire:ignore.self id="hs-modal-edit-expense"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-modal-edit-expense-label">
        <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">

            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">

                <div class="flex justify-end items-center py-3 px-4">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-modal-edit-expense">
                        <span class="sr-only">Close</span>

                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 text-center overflow-y-auto">
                    <h3 class="mb-2 text-2xl font-bold text-gray-800">
                        Edit Expense
                    </h3>

                    <div class="mt-5">
                        <x-livewire-forms submitAction="editExpense" formId="editExpenseForm">
                            @csrf

                            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                                <!-- Form Group - Item Name -->
                                <div>
                                    <label for="item_name" class="block text-sm mb-2 text-start">Item Name *</label>
                                    <input wire:model.live="item_name" type="text" id="item_name" name="item_name"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    @error('item_name')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Item Name -->

                                <!-- Form Group - Amount -->
                                <div>
                                    <label for="amount" class="block text-sm mb-2 text-start">Amount *</label>
                                    <input wire:model.live="amount" type="number" id="amount" name="amount" step="0.01"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    @error('amount')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Amount -->


                                <!-- Form Group - Supplier -->
                                <div>
                                    <label for="supplier_number" class="block text-sm mb-2 text-start">Supplier
                                        *</label>
                                    <select wire:model.live="supplier_number" id="supplier_number"
                                        name="supplier_number"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                        <option value="" class="text-gray-400">Select a supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->supplier_number }}">{{ $supplier->supplier_name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('supplier_number')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Supplier -->


                                <!-- Form Group - Expense Category -->
                                <div>
                                    <label for="expense_category_code" class="block text-sm mb-2 text-start">Expense
                                        Category *</label>
                                    <select wire:model.live="expense_category_code" id="expense_category_code"
                                        name="expense_category_code"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                        <option value="" class="text-gray-400">Select a category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->category_code }}">{{ $category->category_name }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('expense_category_code')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Expense Category -->


                                <!-- Form Group - Description -->
                                <div class="col-span-2">
                                    <label for="description" class="block text-sm mb-2 text-start">Description</label>
                                    <textarea wire:model.live="description" id="description" name="description" rows="3"
                                        class="py-3 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"></textarea>
                                    @error('description')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Description -->

                                <!-- Form Group - Unit of Measure -->
                                <div>
                                    <label for="unit_of_measure" class="block text-sm mb-2 text-start">Unit of
                                        Measure</label>
                                    <input wire:model.live="unit_of_measure" type="text" id="unit_of_measure"
                                        name="unit_of_measure"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    @error('unit_of_measure')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Unit of Measure -->

                                <!-- Form Group - Quantity -->
                                <div>
                                    <label for="quantity" class="block text-sm mb-2 text-start">Quantity</label>
                                    <input wire:model.live="quantity" type="number" id="quantity" name="quantity"
                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    @error('quantity')
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- End Form Group - Quantity -->



                                <!-- Buttons - Cancel and edit Product -->
                                <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                                    <button type="button"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-modal-edit-expense">
                                        Cancel
                                    </button>

                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                        Edit Expense
                                    </button>
                                </div>
                                <!-- End Buttons -->
                            </div>
                        </x-livewire-forms>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--  End: Edit Expense -->




    <!--  Delete Expense -->
    <div wire:ignore.self id="hs-delete-expense-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-delete-expense-modal-label">
        <div
            class="sm:max-w-lg sm:w-full m-3 sm:mx-auto relative flex flex-col bg-white border shadow-sm rounded-xl overflow-hidden">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="absolute top-2 end-2">
                    <button type="button"
                        class="flex justify-center items-center size-7 text-sm font-semibold rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-expense-modal">
                        <span class="sr-only">Close</span>
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-4 sm:p-10 overflow-y-auto">
                    <div class="flex gap-x-4 md:gap-x-7">
                        <!-- Icon -->
                        <span
                            class="flex-shrink-0 inline-flex justify-center items-center size-[46px] sm:w-[62px] sm:h-[62px] rounded-full border-4 border-red-50 bg-red-100 text-red-500">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <!-- End Icon -->

                        <div class="grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-800">
                                Delete Expense
                            </h3>
                            <p class="text-gray-500 flex flex-col items-center">
                                <span class="text-center font-semibold text-gray-700">
                                    Temporarily delete this expense.
                                </span>
                                This action soft deletes the expense, it is reversible, and one can restore the expense
                                later.
                            </p>
                        </div>

                    </div>
                </div>

                <div class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-yellow-300 text-gray-800 shadow-sm hover:bg-yellow-400 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-delete-expense-modal">
                        Cancel
                    </button>

                    <button wire:click='deleteExpense'
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-400 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none">
                        Delete Expense
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--  End: Delete Expense -->




</div>