<!-- System Settings Section -->
<div class="max-w-[85rem] my-6 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-t-4 border-t-blue-600 rounded-xl shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200]">
                        <div>
                            <p class="text-sm text-blue-500">
                                Edit system Settings
                            </p>
                        </div>
                    </div>
                    <!-- End Header -->

                    <x-livewire-forms submitAction="updateSystemSettings" formId="updateSystemSettingsForm">
                        @csrf
                        
                        <div class="p-8">
                            <!-- List -->
                            <div class="space-y-3">
                                @foreach ($systemValues as $key => $value)
                                <dl class="flex flex-col sm:flex-row gap-1">
                                    <dt class="min-w-40">
                                        <span class="block text-sm text-gray-500">{{ str()->ucfirst($key) }}</span>
                                    </dt>
                    
                                    <dd>
                                        <div class="max-w-sm space-y-3">
                                            <input type="text" id="{{ $key }}" wire:model="systemValues.{{ $key }}"
                                                class="py-2 px-3 block w-full bg-gray-100 border border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                        </div>
                                    </dd>
                                </dl>
                                @endforeach
                            </div>
                            <!-- End List -->
                    
                            <!-- Buttons - Cancel and Save Settings -->
                            <div class="col-span-2 mt-6 flex justify-center gap-x-4">
                                <button type="button"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-400 text-white shadow-sm hover:bg-red-300 disabled:opacity-50 disabled:pointer-events-none">
                                    Cancel
                                </button>
                    
                                <button type="submit"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                    Save Settings
                                </button>
                            </div>
                            <!-- End Buttons -->
                        </div>

                    </x-livewire-forms>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>
<!-- End System Settings Section -->