<div>
    <footer class="mt-auto bg-gray-900 w-full py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <!-- Grid -->
        <div class="text-center">
            <div class="flex flex-col items-center lg:flex-row lg:items-start lg:justify-center">
                <a class="flex-none text-xl font-semibold text-white flex items-center lg:items-start" href="#"
                    aria-label="Brand">
                    <img class="w-10" src="{{ asset('front-assets/images/superiorLogo.png') }}" alt="logo">
                    <span class="sm:inline ms-4">{{ config('app.name') }}</span>
                </a>
            </div>
            <!-- End Col -->

            <div class="mt-3">
                <p class="text-gray-500">We're part of the <a class="font-semibold text-blue-600 hover:text-blue-700"
                        href="#">Superior</a> family.</p>
                <p class="text-gray-500">
                    &copy; <span id="currentYear"></span> Superior Hotels, Kenya | Procuement Management System. All rights
                    reserved.
                </p>
            </div>

            <!-- Social Brands -->
            <div class="mt-3 space-x-2">
                <!-- Social Brand Icons -->
            </div>
            <!-- End Social Brands -->
        </div>
        <!-- End Grid -->
        <script>
            const currentYear = new Date().getFullYear();
            document.getElementById("currentYear").textContent = currentYear;
        </script>
    </footer>
</div>
