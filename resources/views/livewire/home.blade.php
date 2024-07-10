<div>
    <div>
        <!-- Hero -->
        <div class="relative overflow-hidden">
            <!-- Gradients -->
            <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">
                <div
                    class="bg-gradient-to-r from-violet-300/50 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
                </div>
                <div
                    class="bg-gradient-to-tl from-blue-50 via-blue-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-fulls origin-top-left -rotate-12 -translate-x-[15rem]">
                </div>
            </div>
            <!-- End Gradients -->

            <!-- ========== HEADER ========== -->
            @livewire('components.navigation')
            <!-- ========== END HEADER ========== -->

            <div class="relative z-10">
                <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
                    <div class="max-w-2xl text-center mx-auto">
                        <p
                            class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                            Redifining hospitality
                        </p>

                        <!-- Title -->
                        <div class="mt-5 max-w-2xl">
                            <h1 class="block font-semibold text-gray-600 text-4xl md:text-5xl lg:text-6xl">
                                Superior Hotels, <span class="text-red-400">Kenya</span>
                            </h1>
                        </div>
                        <!-- End Title -->

                        <div class="mt-5 max-w-3xl">
                            <p class="text-lg text-gray-600">Welcome to Superior Hotels Procurement System. Streamline
                                your
                                procurement process with ease, efficiency, and transparency. Experience seamless
                                management
                                tailored for Kenya's hospitality industry.
                            </p>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-8 gap-3 flex justify-center">
                            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="#">
                                Get started
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </a>
                        </div>
                        <!-- End Buttons -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero -->

    </div>

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="max-w-[85rem] min-h-[75rem] mx-auto pt-12 pb-10 px-4 sm:px-6 lg:px-8 md:pt-24">
            <!-- About Us -->
            <section class="mt-12">
                <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Grid -->
                    <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">

                        <div class="relative">
                            <img class="w-full rounded-md" src="{{ asset('front-assets/images/about-us.png') }}"
                                alt="about-us">
                            <div
                                class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6">
                            </div>
                        </div>
                        <!-- End Col -->

                        <div class="m-5">
                            <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight">
                                About
                                <span class="text-blue-600">Us</span>
                            </h1>
                            <p class="mt-3 text-lg text-gray-800">
                                We are a leading Group of Hotels in Kenya comprised of properties in Nairobi and
                                Naivasha;
                                committed to redefining hospitality
                            </p>

                            <div class="space-y-6 lg:space-y-10 mt-6">
                                <!-- Icon Block -->
                                <div class="flex">
                                    <!-- Icon -->
                                    <span
                                        class="flex-shrink-0 inline-flex justify-center items-center size-[46px] rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm mx-auto">
                                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M7 10v12" />
                                            <path
                                                d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2h0a3.13 3.13 0 0 1 3 3.88Z" />
                                        </svg>
                                    </span>
                                    <div class="ms-5 sm:ms-8">
                                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                                            Karibu.
                                        </h3>
                                        <p class="mt-1 text-gray-600">
                                            Our emblem signifies the path we have curved in continuously redefining our
                                            standards of service in accommodation, conferencing and restaurant
                                            facilities.
                                            We welcome you for a wholesome and inspiring experience whether visiting us
                                            for
                                            business or leisure.
                                        </p>
                                    </div>
                                </div>
                                <!-- End Icon Block -->
                            </div>
                        </div>
                        <!-- End Col -->

                    </div>
                    <!-- End Grid -->
                </div>

                <!-- Icon Blocks -->
                <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 items-center gap-6">
                        <!-- Card -->
                        <a class="group flex gap-y-6 size-full hover:bg-gray-100 rounded-lg p-5 transition-all"
                            href="#">
                            <svg class="flex-shrink-0 size-8 text-gray-800 mt-0.5 me-6"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="13.5" cy="6.5" r=".5" />
                                <circle cx="17.5" cy="10.5" r=".5" />
                                <circle cx="8.5" cy="7.5" r=".5" />
                                <circle cx="6.5" cy="12.5" r=".5" />
                                <path
                                    d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z" />
                            </svg>

                            <div>
                                <div>
                                    <h3 class="block font-bold text-gray-800">Our Mission</h3>
                                    <p class="text-gray-600">To offer value and service excellence to our guests,
                                        stakeholders and communities through highly motivated staff</p>
                                </div>
                            </div>
                        </a>
                        <!-- End Card -->

                        <!-- Card -->
                        <a class="group flex gap-y-6 size-full hover:bg-gray-100 rounded-lg p-5 transition-all"
                            href="#">
                            <svg class="flex-shrink-0 size-8 text-gray-800 mt-0.5 me-6"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M2 3h20" />
                                <path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3" />
                                <path d="m7 21 5-5 5 5" />
                            </svg>

                            <div>
                                <div>
                                    <h3 class="block font-bold text-gray-800">Our Vision</h3>
                                    <p class="text-gray-600">To be the leading group of hotels providing undisputed
                                        value
                                        in hospitality services in East Africa & beyond.</p>
                                </div>
                            </div>
                        </a>
                        <!-- End Card -->

                    </div>
                </div>
                <!-- End Icon Blocks -->
            </section>

            <!-- End About Us -->

            <!-- Our Hotels -->
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mt-10">
                <!-- Title -->
                <div class="max-w-2xl text-center mx-auto mb-10 lg:mb-14">

                    <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight">Our
                        <span class="text-blue-600">Hotels</span>
                    </h1>
                    <p class="mt-1 text-gray-600">Explore the hotels at Superior Hotels Kenya.</p>
                </div>
                <!-- End Title -->

                <!-- Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10 lg:mb-14">
                    @forelse ($hotels as $hotel)
                        <!-- Card -->
                        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition"
                            href="#">
                            <div class="aspect-w-16 aspect-h-9">
                                <img class="w-full object-cover rounded-t-xl h-40"
                                    src="{{ Storage::url($hotel->hotel_image_path) }}" alt="hotel-image">
                            </div>
                            <div class="p-4 md:p-5 text-center">
                                <p class="mt-2 text-xs uppercase text-gray-600">
                                    {{ $hotel->location->location_name }}
                                </p>
                                <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600">
                                    {{ $hotel->hotel_name }}
                                </h3>
                            </div>
                        </a>
                        <!-- End Card -->
                    @empty
                        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition"
                            href="#">
                            <div class="aspect-w-16 aspect-h-9">
                                <img class="w-full object-cover rounded-t-xl h-60"
                                    src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="hotel-image">
                            </div>
                            <div class="p-4 md:p-5 text-center">
                                <p class="mt-2 text-xs uppercase text-gray-600">
                                    Superior
                                </p>
                                <h3 class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600">
                                    No Hotels Uploaded
                                </h3>
                            </div>
                        </a>
                        <!-- End Card -->
                    @endforelse
                </div>
                <!-- End Grid -->


            </div>
            <!-- End Our Hotels -->

            <!-- Contact -->
            <div class="max-w-7xl px-4 lg:px-6 lg:px-8 py-12 lg:py-24 mx-auto">
                <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
                    <h1 class="block text-3xl font-bold text-blue-600 sm:text-4xl lg:text-6xl lg:leading-tight">
                        Contacts
                    </h1>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
                    <div class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl">
                        <img class="group-hover:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"src="{{ asset('front-assets/images/contact-us.png') }}"
                            alt="contact-us">
                    </div>
                    <!-- End Col -->

                    <div class="space-y-8 lg:space-y-16">
                        <div>
                            <h3 class="mb-5 font-semibold text-black">
                                Our address
                            </h3>

                            <!-- Grid -->
                            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                                <div class="flex gap-4">
                                    <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>

                                    <div class="grow">
                                        <p class="text-sm text-gray-600">
                                            Nairobi
                                        </p>
                                        <address class="mt-1 text-black not-italic">
                                            Mayfair Suites, <br>
                                            5th Floor Parklands Rd,
                                        </address>
                                    </div>
                                </div>
                            </div>
                            <!-- End Grid -->
                        </div>

                        <div>
                            <h3 class="mb-5 font-semibold text-black">
                                Our contacts
                            </h3>

                            <!-- Grid -->
                            <div class="grid sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                                <div class="flex gap-4">
                                    <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z">
                                        </path>
                                        <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                                    </svg>

                                    <div class="grow">
                                        <p class="text-sm text-gray-600">
                                            Email us
                                        </p>
                                        <p>
                                            <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-blue-400 hover:before:bg-black focus:outline-none focus:before:bg-black"
                                                href="mailto:example@site.so">
                                                hello@example.so
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="flex gap-4">
                                    <svg class="flex-shrink-0 size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>

                                    <div class="grow">
                                        <p class="text-sm text-gray-600">
                                            Call us
                                        </p>
                                        <p>
                                            <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-blue-400 hover:before:bg-black focus:outline-none focus:before:bg-black"
                                                href="tel:+254 706 443440">
                                                +254 706 443440
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
            </div>
            <!-- End Contact -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    
    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->
</div>
