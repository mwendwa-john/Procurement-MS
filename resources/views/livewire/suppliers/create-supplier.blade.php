<div>
    <x-livewire-forms submitAction="createSupplier" formId="createSupplierForm">
        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
            <!-- Form Group - Supplier Name -->
            <div>
                <label for="supplier_name" class="block text-sm mb-2 text-start">Supplier name *</label>
                <div class="relative">
                    <input wire:model.live="supplier_name" type="text" id="supplier_name" name="supplier_name"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="supplier_name">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('supplier_name')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group - Slug -->
            <div>
                <label for="slug" class="block text-sm mb-2 text-start">Slug *</label>
                <div class="relative">
                    <input wire:model.live="slug" type="text" id="slug" name="slug"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required disabled aria-describedby="slug">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('slug')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->


            <!-- Form Group - Supplies to -->
            <div>
                <label for="supplies_to" class="block text-sm mb-2 text-start">Supplies to *</label>

                {{-- <!-- Floating Select -->
                <div class="relative" wire:ignore>
                    <!-- Select -->
                    <select multiple wire:model.live="selectedHotels"
                        data-hs-select='{"placeholder": "Select hotel options...", "toggleTag": "<button type=\"button\"></button>", "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-blue-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1]", "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-blue-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300", "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100", "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"flex-shrink-0 size-3.5 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>", "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"flex-shrink-0 size-3.5 text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"}'
                        class="hidden">
                        <option value="">select hotels</option>
                        @foreach ($hotels as $hotel)
                        <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        @endforeach
                    </select>
                    <!-- End Select -->
                </div>
                <!-- End Floating Select --> --}}

                <select wire:model.live="selectedHotels"
                    class="py-3 px-4 pe-9 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option value="">select hotel</option>
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>



                @error('selectedHotels')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->


            <!-- Form Group - Email -->
            <div>
                <label for="email" class="block text-sm mb-2 text-start">Email *</label>
                <div class="relative">
                    <input wire:model.live="email" type="email" id="email" name="email"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="email">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('email')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->


            <!--  Form Group - Phone Number -->
            <div>
                <label for="phone_number" class="block text-sm mb-2 text-start">Phone Number *</label>
                <div class="relative">
                    <input wire:model.live.live="phone_number" type="tel" id="phone_number" name="phone_number"
                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="phone_number">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"
                            aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('phone_number')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End  Form Group -->

            <!-- Form Group - Street -->
            <div>
                <label for="street" class="block text-sm mb-2 text-start">Street Address *</label>
                <input wire:model.live="street" type="text" id="street" name="street"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    required>
                @error('street')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - Street -->

            <!-- Form Group - City -->
            <div>
                <label for="city" class="block text-sm mb-2 text-start">City *</label>
                <input wire:model.live="city" type="text" id="city" name="city"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    required>
                @error('city')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - City -->

            <!-- Form Group - State -->
            <div>
                <label for="state" class="block text-sm mb-2 text-start">State *</label>
                <input wire:model.live="state" type="text" id="state" name="state"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    required>
                @error('state')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - State -->

            <!-- Form Group - Postal Code -->
            <div>
                <label for="postal_code" class="block text-sm mb-2 text-start">Postal Code</label>
                <input wire:model.live="postal_code" type="text" id="postal_code" name="postal_code"
                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                @error('postal_code')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group - Postal Code -->




            <!-- Buttons - Cancel and Create Supplier -->
            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-modal-add-supplier">
                    Cancel
                </button>

                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    Create supplier
                </button>
            </div>
            <!-- End Buttons -->
        </div>

    </x-livewire-forms>
</div>