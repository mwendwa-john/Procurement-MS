<div class="bg-sky-50">
    @livewire('components.modals.lpo-modals')


    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-r from-cyan-300/50 via-blue-200 to-indigo-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-indigo-50 via-cyan-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
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
                        Show LPOs
                    </a>

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-emerald-600 text-xl md:text-3xl lg:text-4xl">
                            Created Local Purchase Orders
                        </h1>
                    </div>
                    <!-- End Title -->
                </div>

                <!-- Start Buttons -->
                @livewire('lpos.lpo-buttons')

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
                                        class="bg-white border border-t-4 border-t-emerald-400 rounded-xl shadow-sm overflow-hidden">
                                        <!-- Header -->
                                        <div
                                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                                            <div>
                                                <h2 class="text-xl font-semibold text-emerald-600">
                                                    LPOs
                                                </h2>
                                                <p class="text-sm text-emerald-500">
                                                    Manage LPOs, edit, and more.
                                                </p>
                                            </div>
                                            <div class="flex gap-4">
                                                <!-- Supplier Filter -->
                                                <select wire:model.live="supplier_id"
                                                    class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="">All Suppliers</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if(!auth()->user()->hasRole('store-keeper'))
                                                <!-- Hotel Filter -->
                                                <select wire:model.live="hotel_id" class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="">All Hotels</option>
                                                    @foreach($hotels as $hotel)
                                                    <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                                    @endforeach
                                                </select>
                                                @endif

                                                <!-- Invoice Filter -->
                                                <select wire:model.live="has_invoice"
                                                    class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="">All LPOs</option>
                                                    <option value="with">With Invoice</option>
                                                    <option value="without">Without Invoice</option>
                                                </select>

                                                <!-- Search Input -->
                                                <input type="text" wire:model.live="search" placeholder="Search..."
                                                    class="py-2 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500" />
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
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Order
                                                            Number</span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        <span
                                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800">Action</span>
                                                    </th>

                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($lpos as $lpo)
                                                <tr>
                                                    <td class="ps-6 py-3 text-blue-600">
                                                        <div class="text-sm font-semibold">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm font-semibold text-gray-800">
                                                            {{ $lpo->hotel->hotel_name }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3">
                                                        <div class="text-sm">
                                                            {{ $lpo->supplier->supplier_name }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-3 text-center">
                                                        <div class="text-sm">
                                                            @if ($lpo->status === 'generated')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-lime-100 text-lime-800 rounded-full">
                                                                {{ $lpo->status }}
                                                            </span>

                                                            @elseif ($lpo->status === 'posted')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-purple-100 text-purple-800 rounded-full">
                                                                {{ $lpo->status }}
                                                            </span>

                                                            @elseif ($lpo->status === 'added_to_daily_lpos')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-100 text-orange-800 rounded-full">
                                                                {{ $lpo->status }}
                                                            </span>

                                                            @elseif ($lpo->status === 'approved')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                                                {{ $lpo->status }}
                                                            </span>

                                                            @elseif ($lpo->status === 'invoice_attached')
                                                            <span
                                                                class="py-1 px-2 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                                                                {{ $lpo->status }}
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </td>


                                                    <td class="px-6 py-1.5">
                                                        <div class="text-sm">
                                                            {{ $lpo->lpo_order_number }}
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-1.5">
                                                        <div class="inline-flex gap-2">
                                                            <a href="{{ route('lpo.view', ['id' => $lpo->id]) }}"
                                                                class="text-orange-400 text-sm hover:underline">
                                                                View
                                                            </a>

                                                            @if ($lpo->status === 'generated')
                                                            @can('post lpo')
                                                            <button
                                                                wire:click="$dispatch('pass-lpo-id', { id: '{{ $lpo->id }}' })"
                                                                data-hs-overlay="#hs-modal-post-lpo"
                                                                class="text-teal-400 text-sm hover:underline">
                                                                Post Lpo
                                                            </button>
                                                            @endcan

                                                            @can('edit lpos')
                                                            <button
                                                                wire:click="$dispatch('pass-lpo-id', { id: '{{ $lpo->id }}' })"
                                                                data-hs-overlay="#hs-modal-edit-supplier"
                                                                class="text-blue-600 text-sm hover:underline">
                                                                Edit
                                                            </button>
                                                            @endcan
                                                            @endif

                                                            @if($lpo->status !== 'invoice_attached')
                                                            @can('delete lpos')
                                                            <button
                                                                wire:click="$dispatch('pass-lpo-id', { id: '{{ $lpo->id }}' })"
                                                                data-hs-overlay="#hs-modal-delete-lpo"
                                                                class="text-red-400 text-sm hover:underline">
                                                                Delete
                                                            </button>
                                                            @endcan
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-3">
                                                        <span class="text-sm font-semibold text-gray-800">No LPOs
                                                            available</span>
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
                                                    <span class="font-semibold text-gray-800">{{ $lpos->total()
                                                        }}</span> LPOs
                                                </p>
                                            </div>
                                            {{ $lpos->links('vendor.pagination.custom') }}
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