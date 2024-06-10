<div class="bg-sky-50">
    <!-- Hero -->
    <div class="relative overflow-hidden">
        <!-- Gradients -->
        <div aria-hidden="true" class="flex absolute -top-96 start-1/2 transform -translate-x-1/2">

            <div
                class="bg-gradient-to-r from-indigo-300/50 via-violet-200 to-purple-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-purple-50 via-violet-100 to-indigo-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div>

            {{-- <div
                class="bg-gradient-to-r from-cyan-300/50 via-blue-200 to-indigo-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-indigo-50 via-cyan-100 to-blue-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div> --}}

            {{-- <div
                class="bg-gradient-to-r from-green-300/50 via-lime-200 to-teal-100 blur-3xl w-[25rem] h-[44rem] rotate-[-60deg] transform -translate-x-[10rem]">
            </div>
            <div
                class="bg-gradient-to-tl from-teal-50 via-green-100 to-lime-50 blur-3xl w-[90rem] h-[50rem] rounded-full origin-top-left -rotate-12 -translate-x-[15rem]">
            </div> --}}


        </div>
        <!-- End Gradients -->

        <!-- ========== HEADER ========== -->
        @livewire('components.navigation')
        <!-- ========== END HEADER ========== -->

        <div class="relative z-10">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    @if ($user->slug == Auth::user()->slug)
                        <a href="{{ route('user.profile.edit', ['slug' => Auth::user()->slug]) }}"
                            class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                            Edit Profile
                        </a>
                    @endif

                    <!-- Title -->
                    <div class="mt-5 max-w-2xl">
                        <h1 class="block font-semibold text-gray-600 text-4xl md:text-5xl lg:text-6xl">
                            User <span class="text-red-400">Profile</span>
                        </h1>
                    </div>
                    <!-- End Title -->

                    @if ($user->slug == Auth::user()->slug)
                        <!-- Buttons -->
                        <div class="mt-8 gap-3 flex justify-center">
                            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                href="{{ route('user.profile.edit', ['slug' => Auth::user()->slug]) }}">
                                Edit Profile
                                <svg class="flex-shrink-0 size-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path
                                            d="M4 21C4 17.134 7.13401 14 11 14C11.3395 14 11.6734 14.0242 12 14.0709M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7ZM12.5898 21L14.6148 20.595C14.7914 20.5597 14.8797 20.542 14.962 20.5097C15.0351 20.4811 15.1045 20.4439 15.1689 20.399C15.2414 20.3484 15.3051 20.2848 15.4324 20.1574L19.5898 16C20.1421 15.4477 20.1421 14.5523 19.5898 14C19.0376 13.4477 18.1421 13.4477 17.5898 14L13.4324 18.1574C13.3051 18.2848 13.2414 18.3484 13.1908 18.421C13.1459 18.4853 13.1088 18.5548 13.0801 18.6279C13.0478 18.7102 13.0302 18.7985 12.9948 18.975L12.5898 21Z"
                                            stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <!-- End Buttons -->
                    @endif
                </div>
            </div>
        </div>

    </div>
    <!-- End Hero -->


    <!-- ========== MAIN CONTENT ========== -->
    <main id="content">
        <div class="max-w-[90rem] min-h-[60rem] mt-0 mx-auto pt-12 pb-10 px-4 sm:px-6 lg:px-8 md:pt-24">
            <!-- Profile -->
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-[#DDEBFE] p-3 border-t-4 border-blue-600 rounded-lg hover:bg-[#EDEBFE]">
                            <div class="text-center">
                                <img class="rounded-xl sm:size-48 lg:size-60 mx-auto"
                                    src="{{ $user->person->profile_photo_path }}"
                                    alt="profile">
                                <div class="mt-2 sm:mt-4">
                                    <h3 class="text-sm font-medium text-blue-600 text-2xl sm:text-base lg:text-lg ">
                                        {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                                    </h3>
                                    <p class="text-xs text-gray-600 sm:text-sm lg:text-base">
                                        {{ $user->username }}
                                    </p>
                                </div>

                                <div class="py-6 sm:mt-6">
                                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">
                                        {{ $user->person->user_bio }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- End of profile card -->
                        <div class="my-4"></div>
                    </div>

                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64 border-t-4 border-blue-600 rounded-lg">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-[#EDEBFE] hover:bg-[#DDEBFE] p-3 shadow-sm rounded-sm">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide text-2xl text-blue-600 py-4">About</span>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">First Name</div>
                                        <div class="px-4 py-2">{{ $user->first_name }}</div>
                                    </div>

                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Middle Name</div>
                                        <div class="px-4 py-2">{{ $user->middle_name }}</div>
                                    </div>

                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Last Name</div>
                                        <div class="px-4 py-2">{{ $user->last_name }}</div>
                                    </div>

                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Username</div>
                                        <div class="px-4 py-2">{{ $user->username }}</div>
                                    </div>

                                    <div class="my-4"></div>
                                    <div class="my-4"></div>

                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Gender</div>
                                        <div class="px-4 py-2">{{ $user->person->gender }}</div>
                                    </div>
                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                                        <div class="px-4 py-2">{{ $user->person->phone_no }}</div>
                                    </div>
                                    <div class="grid grid-cols-2 hover:bg-gray-100">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>

                    </div>
                </div>
            </div>
            <!-- End Profile -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    
    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->


</div>
