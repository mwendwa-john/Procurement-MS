<div>
    {{-- Do your work, then step back. --}}
    <!--  Transfer User -->
    <div wire:ignore.self id="hs-transfer-user-modal"
        class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden size-full fixed top-0 start-0 z-[80] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-transfer-user-modal-label">
        <div class="sm:max-w-md w-full m-3 sm:mx-auto">

            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">

                <!-- Close Button -->
                <div class="flex justify-end items-center py-2 px-3">
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-transfer-user-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="p-4 sm:p-6 text-center overflow-y-auto">
                    <h3 class="mb-3 text-xl font-semibold text-gray-800">
                        {{-- Transfer {{ $user->full_name }} --}}
                    </h3>
                    <p class="text-sm text-gray-500 mb-6">
                        Transfer a user to a new hotel.
                    </p>

                    <div class="mt-4 space-y-5">
                        <x-livewire-forms submitAction="transferUser" formId="transferUserForm">
                            @csrf

                            <!-- Form Grid -->
                            <div class="grid grid-cols-1 gap-4 py-4">
                                <!-- To Data (Right Column) -->
                                <div class="space-y-4">
                                    <dl class="grid grid-cols-2 gap-4">
                                        <div>
                                            <dt>
                                                <label for="to_location_slug"
                                                    class="block text-sm font-medium text-gray-700 mb-1">To
                                                    Location</label>
                                            </dt>
                                            <dd>
                                                <select wire:model.live='selectedLocation' id="to_location_slug"
                                                    name="to_location_slug"
                                                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                    <option value="">select location</option>
                                                    @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->location_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('selectedLocation')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dd>
                                        </div>

                                        <div>
                                            <dt>
                                                <label for="to_hotel_slug"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    To Hotel
                                                </label>
                                            </dt>
                                            <dd>
                                                <select wire:model.live='selectedHotel' id="to_hotel_slug"
                                                    name="to_hotel_slug"
                                                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                    <option value="">select hotel</option>
                                                    @foreach ($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('selectedHotel')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dd>
                                        </div>

                                        <div>
                                            <dt>
                                                <label for="to_role"
                                                    class="block text-sm font-medium text-gray-700 mb-1">To Role</label>
                                            </dt>
                                            <dd>
                                                <select wire:model.live='selectedRole' id="to_role" name="to_role"
                                                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                    <option value="">select role</option>
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @error('selectedRole')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dd>
                                        </div>

                                        <div>
                                            <dt>
                                                <label for="to_role"
                                                    class="block text-sm font-medium text-gray-700 mb-1">Transfer
                                                    Date</label>
                                            </dt>
                                            <dd>
                                                <input wire:model.live='transfer_date' type="date"
                                                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">

                                                @error('transfer_date')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dd>
                                        </div>

                                        <div class="col-span-2">
                                            <dt>
                                                <label for="to_role"
                                                    class="block text-sm font-medium text-gray-700 mb-1">
                                                    Reason for transfer
                                                </label>
                                            </dt>
                                            <dd>
                                                <textarea wire:model='transfer_reason' id="transfer_reason" name="transfer_reason"
                                                    placeholder="Enter reason for transfer"
                                                    class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                    rows="4"></textarea>

                                                @error('transfer_reason')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-5 flex justify-between items-center gap-x-4">
                                <button type="button"
                                    class="py-2 px-3 text-sm font-medium rounded-md border border-transparent bg-red-400 text-white hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none"
                                    data-hs-overlay="#hs-transfer-user-modal">
                                    Cancel
                                </button>

                                <button type="submit"
                                    class="py-2 px-3 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">
                                    Transfer
                                </button>
                            </div>
                        </x-livewire-forms>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--  End: Transfer User -->
</div>