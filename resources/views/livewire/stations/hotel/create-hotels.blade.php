<div>
    <x-livewire-forms submitAction="createHotel" formId="createHotelForm">
        <div class="grid grid-cols-2 gap-y-4 gap-x-8">
            <!-- Form Group - Location -->
            <div>
                <label for="location_id" class="block text-sm mb-2 text-start">Location *</label>

                <!-- Floating Select -->
                <div class="relative">
                    <select wire:model.live="location_id"
                        class="peer p-4 pe-9 block w-full bg-gray-100 border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2">

                        <option value="">select location</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                    <label
                        class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-1.5 peer-[:not(:placeholder-shown)]:text-gray-500">Location</label>
                </div>
                <!-- End Floating Select -->

                @error('location_id')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!-- Form Group - Hotel it Belongs To -->
            <div>
                <label for="parent_id" class="block text-sm mb-2 text-start">Hotel it belongs to</label>

                <!-- Floating Select -->
                <div class="relative">
                    <select wire:model.live="parent_id"
                        class="peer p-4 pe-9 block w-full bg-gray-100 border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2">

                        <option value="">select hotel</option>
                        @foreach ($belongsToHotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                        @endforeach
                    </select>
                    <label
                        class="absolute top-0 start-0 p-4 h-full truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-1.5 peer-[:not(:placeholder-shown)]:text-gray-500">Hotel</label>
                </div>
                <!-- End Floating Select -->

                @error('parent_id')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Form Group -->

            <!--  Form Group - Hotel Name -->
            <div>
                <label for="hotel_name" class="block text-sm mb-2 text-start">Hotel name *</label>
                <div class="relative">
                    <input wire:model.live="hotel_name" type="text" id="hotel_name" name="hotel_name"
                        class="py-3 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="hotel_name">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('hotel_name')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End  Form Group -->

            <!--  Form Group - KRA Pin -->
            <div>
                <label for="hotel_kra_pin" class="block text-sm mb-2 text-start">Hotel KRA PIN *</label>
                <div class="relative">
                    <input wire:model.live="hotel_kra_pin" type="text" id="hotel_kra_pin" name="hotel_kra_pin"
                        class="py-3 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                        required aria-describedby="hotel_kra_pin">

                    <div class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                        <svg class="size-5 text-red-500" width="16" height="16" fill="currentColor"
                            viewBox="0 0 16 16" aria-hidden="true">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                        </svg>
                    </div>
                </div>

                @error('hotel_kra_pin')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End  Form Group -->

            <!--  Form Group - Hotel Image -->
            <div>
                <label for="hotel_image_path" class="block text-sm mb-2 text-start">Hotel Image *</label>
                <form class="max-w-sm">
                    <label for="file-input" class="sr-only">Choose image</label>
                    <input wire:model.live='hotel_image_path' type="file" name="file-input" id="file-input"
                        class="block w-full border border-blue-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-blue-600 file:text-white file:border-0 file:me-4 file:py-3 file:px-4">
                </form>

                @error('hotel_image_path')
                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- End  Form Group -->
            @if ($hotel_image_path)
                <div class="d-flex justify-content-center align-items-center m-3">
                    <img width="200" height="200" src="{{ $hotel_image_path->temporaryUrl() }}" alt="">
                </div>
            @endif

            <!-- Buttons - Cancel and Create Hotel -->
            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-modal-add-hotel">
                    Cancel
                </button>

                <button type="submit"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    Create hotel
                </button>
            </div>
            <!-- End Buttons -->
        </div>

    </x-livewire-forms>
</div>
