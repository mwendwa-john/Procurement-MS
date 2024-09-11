<div>
    <h3 class="text-xl font-bold text-gray-800 mb-4">
        Assign {{ $userName }} to a hotel
    </h3>
    <x-livewire-forms submitAction="assignHotel" formId="assignHotelForm">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Location -->
            <div>
                <label for="location" class="block text-sm mb-2">Location</label>
                <select wire:model.live="selectedLocation" id="location"
                    class="w-full border-blue-200 rounded-lg py-2 px-4 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select location</option>
                    @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                    @endforeach
                </select>
                @error('selectedLocation')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Hotel -->
            <div>
                <label for="hotel" class="block text-sm mb-2">Hotel</label>
                <select wire:model.live="selectedHotel" id="hotel"
                    class="w-full border-blue-200 rounded-lg py-2 px-4 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select hotel</option>
                    @foreach ($hotels as $hotel)
                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                    @endforeach
                </select>
                @error('selectedHotel')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <!-- Role -->
            <div>
                <label for="role" class="block text-sm mb-2">Role</label>
                <select wire:model.live="selectedRole" id="role"
                    class="w-full border-blue-200 rounded-lg py-2 px-4 focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('selectedRole')
                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
    
        <!-- Buttons -->
        <div class="flex justify-end items-center gap-4 pt-6">
            <button type="button"
                class="py-2 px-4 inline-flex items-center rounded-lg bg-yellow-100 text-gray-800 hover:bg-yellow-400"
                data-hs-overlay="#hs-assign-hotel-modal">Cancel</button>
    
            <button wire:click='assignHotel'
                class="py-2 px-4 inline-flex items-center rounded-lg bg-blue-600 text-white hover:bg-blue-800">
                Assign hotel
            </button>
        </div>
    </x-livewire-forms>

</div>
