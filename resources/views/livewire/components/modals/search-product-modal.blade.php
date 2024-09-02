<div>
    <div wire:ignore.self id="hs-search-product-modal"
        class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-search-product-modal-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 h-[calc(100%-3.5rem)] sm:mx-auto">
            <div
                class="max-h-full overflow-hidden flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 id="hs-search-product-modal-label" class="font-bold text-gray-800">
                        Search Product
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-search-product-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="space-y-4">
                        <!-- Search Input -->
                        <input wire:model.live="search" type="text" id="input-search"
                            class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Search..." autofocus="">

                        <ul class="space-y-2">
                            @forelse ($productSearchResults as $product)
                            <li wire:click="$dispatch('select-product', { id: '{{ $product->id }}' })"
                                class="bg-white shadow-sm rounded-lg border border-gray-200 p-3 transition-transform transform hover:scale-105 hover:shadow-md hover:border-gray-300 max-w-md mx-auto">

                                <div class="flex flex-col space-y-1">
                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $product->item_name }}
                                    </div>

                                    <div class="text-xs text-gray-700">
                                        <strong>Description:</strong> {{
                                        \Illuminate\Support\Str::words($product->description, 5) }}
                                    </div>

                                    <div class="text-xs text-gray-600">
                                        <strong>Unit of Measure:</strong> {{ $product->unit_of_measure }}
                                    </div>

                                    <div class="text-xs text-gray-600">
                                        <strong>Price:</strong> {{ number_format($product->price, 2) }}
                                    </div>
                                </div>
                            </li>
                            @empty
                            <li
                                class="bg-white shadow-sm rounded-lg border border-gray-200 p-3 text-center text-gray-600 max-w-md mx-auto">
                                No products found for your search query.
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>


                {{-- <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                        data-hs-overlay="#hs-search-product-modal">
                        Close
                    </button>
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Save changes
                    </button>
                </div> --}}
            </div>
        </div>
    </div>




</div>