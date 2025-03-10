@extends('livewire.layouts.admin-sidebar')

@section('admin-content')
<div>
    <!-- Header -->
    @livewire('components.admin-header', [
    'svgIcon' => '
    <svg class="flex-shrink-0 size-6" fill="#2563EB" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" id="dashboard" class="icon glyph">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
        <g id="SVGRepo_iconCarrier">
            <rect x="2" y="2" width="9" height="11" rx="2"></rect>
            <rect x="13" y="2" width="9" height="7" rx="2"></rect>
            <rect x="2" y="15" width="9" height="7" rx="2"></rect>
            <rect x="13" y="11" width="9" height="11" rx="2"></rect>
        </g>
    </svg>
    ',
    'pageTitle' => 'Dashboard',
    ], key(now()->timestamp))
    <!-- End: Header -->



    <!-- Icon Blocks -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 items-center gap-6 md:gap-10">
            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="13.5" cy="6.5" r=".5" />
                            <circle cx="17.5" cy="10.5" r=".5" />
                            <circle cx="8.5" cy="7.5" r=".5" />
                            <circle cx="6.5" cy="12.5" r=".5" />
                            <path
                                d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Build your portfolio</h3>
                    </div>
                </div>
                <p class="text-gray-600">The simplest way to keep your portfolio always up-to-date.</p>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 3h20" />
                            <path d="M21 3v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V3" />
                            <path d="m7 21 5-5 5 5" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Get freelance work</h3>
                    </div>
                </div>
                <p class="text-gray-600">New design projects delivered to your inbox each morning.</p>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7" />
                            <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                            <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4" />
                            <path d="M2 7h20" />
                            <path
                                d="M22 7v3a2 2 0 0 1-2 2v0a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12v0a2 2 0 0 1-2-2V7" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Sell your goods</h3>
                    </div>
                </div>
                <p class="text-gray-600">Get your goods in front of millions of potential customers with ease.</p>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5.5 8.5 9 12l-3.5 3.5L2 12l3.5-3.5Z" />
                            <path d="m12 2 3.5 3.5L12 9 8.5 5.5 12 2Z" />
                            <path d="M18.5 8.5 22 12l-3.5 3.5L15 12l3.5-3.5Z" />
                            <path d="m12 15 3.5 3.5L12 22l-3.5-3.5L12 15Z" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Get freelance work</h3>
                    </div>
                </div>
                <p class="text-gray-600">New design projects delivered to your inbox each morning.</p>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M16.466 7.5C15.643 4.237 13.952 2 12 2 9.239 2 7 6.477 7 12s2.239 10 5 10c.342 0 .677-.069 1-.2" />
                            <path d="m15.194 13.707 3.814 1.86-1.86 3.814" />
                            <path
                                d="M19 15.57c-1.804.885-4.274 1.43-7 1.43-5.523 0-10-2.239-10-5s4.477-5 10-5c4.838 0 8.873 1.718 9.8 4" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Sell your goods</h3>
                    </div>
                </div>
                <p class="text-gray-600">Get your goods in front of millions of potential customers with ease.</p>
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="size-full bg-white shadow-lg rounded-lg p-5">
                <div class="flex items-center gap-x-4 mb-3">
                    <div
                        class="inline-flex justify-center items-center size-[62px] rounded-full border-4 border-blue-50 bg-blue-100">
                        <svg class="shrink-0 size-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M8.3 10a.7.7 0 0 1-.626-1.079L11.4 3a.7.7 0 0 1 1.198-.043L16.3 8.9a.7.7 0 0 1-.572 1.1Z" />
                            <rect x="3" y="14" width="7" height="7" rx="1" />
                            <circle cx="17.5" cy="17.5" r="3.5" />
                        </svg>
                    </div>
                    <div class="shrink-0">
                        <h3 class="block text-lg font-semibold text-gray-800">Build your portfolio</h3>
                    </div>
                </div>
                <p class="text-gray-600">The simplest way to keep your portfolio always up-to-date.</p>
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Icon Blocks -->

</div>

@endsection