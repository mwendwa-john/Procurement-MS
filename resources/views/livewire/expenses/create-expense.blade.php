<div>

    <x-livewire-forms submitAction="createExpense" formId="createExpenseForm">
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
                <label for="supplier_number" class="block text-sm mb-2 text-start">Supplier *</label>
                <select wire:model.live="supplier_number" id="supplier_number" name="supplier_number"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                    <option value="" class="text-gray-400">Select a supplier</option>
                    @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->supplier_number }}">{{ $supplier->supplier_name }}</option>
                    @endforeach
                </select>

                @error('supplier_number')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - Supplier -->


            <!-- Form Group - Expense Category -->
            <div>
                <label for="expense_category_code" class="block text-sm mb-2 text-start">Expense Category *</label>
                <select wire:model.live="expense_category_code" id="expense_category_code" name="expense_category_code"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                    <option value="" class="text-gray-400">Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->category_code }}">{{ $category->category_name }}</option>
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
                <label for="unit_of_measure" class="block text-sm mb-2 text-start">Unit of Measure</label>
                <input wire:model.live="unit_of_measure" type="text" id="unit_of_measure" name="unit_of_measure"
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



            <!-- Buttons - Cancel and Create Product -->
            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-add-expense">
                    Cancel
                </button>

                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    Create Expense
                </button>
            </div>
            <!-- End Buttons -->
        </div>
    </x-livewire-forms>

</div>