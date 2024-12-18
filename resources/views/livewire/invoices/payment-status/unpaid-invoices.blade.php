<div class="bg-sky-50">
    {{-- @livewire('components.modals.lpo-modals') --}}


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-br from-blue-400/50 via-sky-300 to-cyan-200 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-cyan-100 via-blue-200 to-sky-100 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
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
                        Show Unpaid Invoices
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-orange-600 text-xl md:text-3xl lg:text-4xl">
                            Unpaid Invoices
                        </h1>
                    </div>
                    <!-- End Title -->
                </div>

                <!-- Start Buttons -->
                @livewire('invoices.invoice-buttons')

                <!-- End Buttons -->


                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">
                    <!-- Table Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

                        <!-- Card -->
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div
                                        class="bg-white border border-t-4 border-t-orange-600 rounded-xl shadow-sm overflow-hidden">
                                        <!-- Header -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                            <div>
                                                <h2 class="text-xl font-semibold text-orange-600">
                                                    Invoices
                                                </h2>
                                                <p class="text-sm text-orange-500">
                                                    Link lpos, edit and more.
                                                </p>
                                            </div>

                                            <div class="flex gap-4">
                                                <!-- Supplier Filter -->
                                                <select wire:model.live="supplier_id"
                                                    class="rounded-md border-gray-300">
                                                    <option value="">All Suppliers</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if(!auth()->user()->hasRole('store-keeper'))
                                                <!-- Hotel Filter -->
                                                <select wire:model.live="hotel_id" class="rounded-md border-gray-300">
                                                    <option value="">All Hotels</option>
                                                    @foreach($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                                    @endforeach
                                                </select>
                                                @endif

                                                <!-- Search Input -->
                                                <input type="text" wire:model.live="search" placeholder="Search..."
                                                    class="rounded-md border-gray-300" />

                                                    <!-- Make Payment -->
                                                    @can('make payments on invoice')
                                                    <a href="#">
                                                        <button
                                                            class="inline-flex items-center gap-x-2 bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-500 transition duration-300">
    
                                                            <svg class="flex-shrink-0 size-4" fill="#FFFF" height="200px"
                                                                width="200px" version="1.1" id="_x31__1_"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                viewBox="0 0 128 128" xml:space="preserve" stroke="#FFFF">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <polygon id="_x34_"
                                                                        points="23.6,75.6 23.6,89.8 37.8,89.8 37.8,86.9 26.4,86.9 26.4,75.6 ">
                                                                    </polygon>
                                                                    <polygon id="_x34__1_"
                                                                        points="96.7,89.8 110.9,89.8 110.9,75.6 108,75.6 108,86.9 96.7,86.9 ">
                                                                    </polygon>
                                                                    <polygon id="_x33_"
                                                                        points="37.8,44.3 23.6,44.3 23.6,58.5 26.4,58.5 26.4,47.2 37.8,47.2 ">
                                                                    </polygon>
                                                                    <polygon id="_x32_"
                                                                        points="111.6,58.5 111.6,44.3 97.4,44.3 97.4,47.2 108.7,47.2 108.7,58.5 ">
                                                                    </polygon>
                                                                    <path id="_x31_"
                                                                        d="M48.4,67c0,10.2,8.2,18.5,18.5,18.5S85.3,77.3,85.3,67s-8.2-18.5-18.5-18.5S48.4,56.8,48.4,67z M68.3,55.7 c2.3,0,4,0.6,5.3,1.1l-1.1,4c-0.9-0.4-2.4-1-4.5-1s-3.3,1-3.3,2.1c0,1.4,1.3,2,4.1,3.1c3.8,1.4,5.7,3.4,5.7,6.5s-2,5.7-6.1,6.5v3.3 h-2.8v-3.1c-2.4,0-5-0.7-6.1-1.3l1-4.1c1.3,0.7,3.4,1.4,5.5,1.4c2.3,0,3.5-1,3.5-2.4s-1-2.1-3.7-3.1c-3.7-1.3-6.1-3.3-6.1-6.5 c0-3.1,2.1-5.5,5.8-6.4v-3.4h2.8C68.3,52.4,68.3,55.7,68.3,55.7z">
                                                                    </path>
                                                                    <g>
                                                                        <path
                                                                            d="M114.2,35.7v-5.9H9.2v62.5H15v5.9h105V35.7H114.2z M12,89.5V32.7h99.3v3H15v53.8H12z M117.2,95.4H17.9V38.5h99.3V95.4z">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            Make Payments
                                                        </button>
                                                    </a>
                                                    @endcan
                                            </div>
                                        </div>
                                        <!-- End Header -->

                                        <!-- Table -->
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="ps-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">#</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Hotel</span>
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Supplier</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Status</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Invoice
                                                            Number</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Action</span>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($invoices as $invoice)
                                                <tr>
                                                    <td class="ps-6 py-3 text-blue-600">
                                                        <div class="text-sm font-semibold">
                                                            {{ ($invoices->currentPage() - 1) * $invoices->perPage() +
                                                            $loop->index + 1 }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm font-semibold text-gray-800">
                                                            {{ $invoice->hotel->hotel_name }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3">
                                                        <div class="text-sm">
                                                            {{ $invoice->supplier->supplier_name }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3 text-center">
                                                        <div class="text-sm">
                                                            @if ($invoice->status === 'unpaid')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                                                {{ $invoice->status }}
                                                            </span>

                                                            @elseif ($invoice->status === 'partial_payment')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full">
                                                                {{ $invoice->status }}
                                                            </span>

                                                            @elseif ($invoice->status === 'payment_complete')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                                                                {{ $invoice->status }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>


                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ $invoice->invoice_number }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="inline-flex gap-2">
                                                            <a href="{{ route('lpo.view', ['id' => $invoice->lpo->id]) }}"
                                                                class="text-orange-400 text-sm hover:underline">
                                                                View
                                                            </a>

                                                            @can('edit invoices')
                                                            @if ($invoice->status === 'unpaid')
                                                            <button
                                                                wire:click="$dispatch('pass-invoice-id', { id: '{{ $invoice->id }}' })"
                                                                data-hs-overlay="#hs-modal-edit-invoice"
                                                                class="text-blue-600 text-sm hover:underline">
                                                                Edit
                                                            </button>
                                                            @endif
                                                            @endcan


                                                            @can('make payments on invoice')
                                                            <button
                                                                wire:click="$dispatch('pass-invoice-id', { id: '{{ $invoice->id }}' })"
                                                                data-hs-overlay="#hs-modal-edit-invoice"
                                                                class="text-teal-500 text-sm hover:underline">
                                                                Make Payment
                                                            </button>
                                                            @endcan

                                                            @can('delete invoices')
                                                            @if ($invoice->status === 'unpaid')
                                                            <button
                                                                wire:click="$dispatch('pass-invoice-id', { id: '{{ $invoice->id }}' })"
                                                                data-hs-overlay="#hs-modal-delete-invoice"
                                                                class="text-red-400 text-sm hover:underline">
                                                                Delete
                                                            </button>
                                                            @endif
                                                            @endcan
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-3">
                                                        <span class="text-sm font-semibold text-gray-800">
                                                            No invoices available
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <!-- End Table -->

                                        <!-- Footer -->
                                        <div class="px-6 py-4 border-t border-gray-200 flex justify-between">
                                            <div>
                                                <p class="text-sm text-gray-600">
                                                    <span class="font-semibold text-gray-800">
                                                        {{ $invoices->total() }}
                                                    </span> Invoices
                                                </p>
                                            </div>
                                            {{ $invoices->links('vendor.pagination.custom') }}
                                        </div>
                                        <!-- End Footer -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Card -->




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

</div>