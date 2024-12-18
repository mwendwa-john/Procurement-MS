<div class="bg-sky-50">
    @livewire('payments.payments-index')


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


        <div class="relative z-10">
            <!-- ========== MAIN CONTENT ========== -->
            <main id="content">
                <div class="max-w-[85rem] w-full mx-auto flex flex-row justify-start py-3 px-4 sm:px-6 lg:px-8">

                    <h1 class="text-lg text-gray-800 font-medium">
                        Select Supplier
                    </h1>
                </div>


                <!-- Suplier Section -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($suppliers as $supplier)
                        <a href="{{ route('supplier.invoices.payments', ['supplierId' => $supplier->id]) }}">
                            <div
                                class="group flex flex-col h-full bg-white border border-blue-200 shadow-lg rounded-xl">
                                <!-- Header Section -->
                                <div class="h-44 flex flex-col justify-center items-center bg-blue-400 rounded-t-xl">
                                    <svg class="flex-shrink-0 size-32" fill="#FFFF" height="200px" width="200px"
                                        version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 188"
                                        xml:space="preserve">
                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                        </g>
                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M63,133c-13,0-23.5,10.5-23.5,23.5s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S76,133,63,133z M63,165.4 c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9c4.9,0,9,4.1,9,9C72,161.4,68,165.4,63,165.4z M210.8,132c-13,0-23.5,10.5-23.5,23.5 s10.5,23.5,23.5,23.5c13,0,23.5-10.5,23.5-23.5S223.8,132,210.8,132z M210.8,164.4c-4.9,0-9-4.1-9-9c0-4.9,4.1-9,9-9 c4.9,0,9,4.1,9,9C219.8,160.4,215.8,164.4,210.8,164.4z M-0.5,143.1c0,4.6,3.7,8.2,8.2,8.2h22.6c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-24.9,30.8-24.9s28.3,10.2,30.8,24.9c0.2,0.9,0.9,1.5,1.9,1.5H99h30.9V115H-0.5V143.1z M253.6,134.5h-5v-22 c0-7.5-6.1-13.6-13.7-13.6h-24.3c-0.5,0-1-0.3-1.4-0.6l-38-37c-1.7-1.7-4.1-2.7-6.6-2.8h-27.5v92.8h40.9c0.9,0,1.7-0.7,1.9-1.5 c2.6-14.7,15.4-25.9,30.8-25.9s28.3,11.2,30.8,25.9c0.2,0.9,0.9,1.5,1.9,1.5h3.2c4.9,0,8.7-3.9,8.7-8.7v-6.3 C255.5,135.4,254.6,134.5,253.6,134.5z M191.1,99h-41.4c-1,0-1.9-0.9-1.9-1.9V70.7c0-1,0.9-1.9,1.9-1.9h13.9c0.5,0,1,0.3,1.5,0.6 l27.5,26.3C193.5,97,192.7,99,191.1,99z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                            <path
                                                d="M57.8,101.5H17.1V60.8h15.7v13h9.3v-13h15.7V101.5z M110.9,101.5H70.3V60.8H86v13h9.3v-13h15.7V101.5z M84.7,48.3H44V7.6 h15.7v13H69v-13h15.7V48.3z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>

                                <!-- Content Section -->
                                <div class="p-4 md:p-6">
                                    <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                                        {{ $supplier->email }}
                                    </span>
                                    <h3 class="text-xl font-semibold text-gray-800">
                                        {{ $supplier->supplier_name }}
                                    </h3>
                                    <h2 class="text-base font-semibold text-gray-800">
                                        Category:
                                        <span class="font-medium italic">{{ $supplier->category }}</span>
                                    </h2>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>


                </div>
                <!-- End Suplier Section -->
            </main>
            <!-- ========== END MAIN CONTENT ========== -->
        </div>
        <!-- End Hero -->
    </div>


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->

</div>