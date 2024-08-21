<div>
    <x-livewire-forms submitAction="editProduct" formId="editProductForm">
        @csrf

        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
            <!-- Form Group - Item Name -->
            <div>
                <label for="item_name" class="block text-sm mb-2 text-start">Product name *</label>
                <div class="relative">
                    <input wire:model.live="item_name" type="text" id="item_name" name="item_name"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="item_name">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('item_name')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group - Slug -->
            <div>
                <label for="product_slug" class="block text-sm mb-2 text-start">Product Slug *</label>
                <div class="relative">
                    <input wire:model.live="product_slug" type="text" id="product_slug" name="product_slug"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required disabled aria-describedby="product_slug">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('product_slug')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->


            <!-- Form Group - Unit_of_measure -->
            <div>
                <label for="unit_of_measure" class="block text-sm mb-2 text-start">Unit Of Measure *</label>
                <input wire:model.live="unit_of_measure" type="text" id="unit_of_measure" name="unit_of_measure"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    required>

                @error('unit_of_measure')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - Unit_of_measure -->


            <!-- Form Group - Price -->
            <div>
                <label for="price" class="block text-sm mb-2 text-start">Price *</label>
                <input wire:model.live="price" type="text" id="price" name="price"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    required>
                @error('price')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - Price -->




            <!-- Form Group - description -->
            <div>
                <label for="description" class="block text-sm mb-2 text-start">Description</label>
                <div wire:model.live="description" class="max-w-sm space-y-3">
                    <textarea
                        class="py-3 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        rows="3">

                    </textarea>
                </div>


                @error('description')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - description -->




            <!-- Buttons - Cancel and Edit Product -->
            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-modal-add-product">
                    Cancel
                </button>

                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    Edit product
                </button>
            </div>
            <!-- End Buttons -->
        </div>

    </x-livewire-forms>
</div>