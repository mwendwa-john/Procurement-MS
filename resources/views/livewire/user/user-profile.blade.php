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
                    <a href="{{ route('password.change', ['slug' => Auth::user()->slug]) }}"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        change password
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
            <!-- Profile Container -->
            <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">

                <!-- Profile Header -->
                <div class="flex items-center gap-x-6">
                    <div class="shrink-0">
                        <img class="w-24 h-24 object-cover rounded-full border-2 border-gray-300"
                            src="{{ $user->person->profile_photo_path ? Storage::url($user->person->profile_photo_path) : asset('front-assets/images/superiorLogo.png') }}"
                            alt="Profile Photo">
                    </div>

                    <div class="grow">
                        <h1 class="text-2xl font-semibold text-gray-800">{{ $user->first_name }} {{ $user->last_name }}
                        </h1>
                        <p class="text-sm text-gray-600">{{ $user->username }}</p>
                    </div>
                </div>
                <!-- End Profile Header -->

                <!-- About Section -->
                <div class="my-10">
                    <h2 class="text-lg font-semibold text-gray-700">Basic Info</h2>
                    <p class="mt-2 text-sm text-gray-600">{{ $user->person->user_bio }}</p>

                    <ul class="mt-4 space-y-3">
                        <li class="flex items-center gap-x-2 text-sm text-gray-500">

                            <svg class="size-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <rect width="24" height="24" fill="white"></rect>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.96802 4H18.032C18.4706 3.99999 18.8491 3.99998 19.1624 4.02135C19.4922 4.04386 19.8221 4.09336 20.1481 4.22836C20.8831 4.53284 21.4672 5.11687 21.7716 5.85195C21.9066 6.17788 21.9561 6.50779 21.9787 6.83762C22 7.15088 22 7.52936 22 7.96801V16.032C22 16.4706 22 16.8491 21.9787 17.1624C21.9561 17.4922 21.9066 17.8221 21.7716 18.1481C21.4672 18.8831 20.8831 19.4672 20.1481 19.7716C19.8221 19.9066 19.4922 19.9561 19.1624 19.9787C18.8491 20 18.4706 20 18.032 20H5.96801C5.52936 20 5.15088 20 4.83762 19.9787C4.50779 19.9561 4.17788 19.9066 3.85195 19.7716C3.11687 19.4672 2.53284 18.8831 2.22836 18.1481C2.09336 17.8221 2.04386 17.4922 2.02135 17.1624C1.99998 16.8491 1.99999 16.4706 2 16.032V7.96802C1.99999 7.52937 1.99998 7.15088 2.02135 6.83762C2.04386 6.50779 2.09336 6.17788 2.22836 5.85195C2.53284 5.11687 3.11687 4.53284 3.85195 4.22836C4.17788 4.09336 4.50779 4.04386 4.83762 4.02135C5.15088 3.99998 5.52937 3.99999 5.96802 4ZM4.31745 6.27777C4.68114 5.86214 5.3129 5.82002 5.72854 6.1837L11.3415 11.095C11.7185 11.4249 12.2815 11.4249 12.6585 11.095L18.2715 6.1837C18.6871 5.82002 19.3189 5.86214 19.6825 6.27777C20.0462 6.69341 20.0041 7.32517 19.5885 7.68885L13.9755 12.6002C12.8444 13.5899 11.1556 13.5899 10.0245 12.6002L4.41153 7.68885C3.99589 7.32517 3.95377 6.69341 4.31745 6.27777Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>

                            <a href="mailto:{{ $user->email }}" class="text-blue-600 hover:underline">
                                {{ $user->email }}
                            </a>
                        </li>

                        <li class="flex items-center gap-x-2 text-sm text-gray-500">
                            <svg class="size-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.5562 12.9062L16.1007 13.359C16.1007 13.359 15.0181 14.4355 12.0631 11.4972C9.10812 8.55901 10.1907 7.48257 10.1907 7.48257L10.4775 7.19738C11.1841 6.49484 11.2507 5.36691 10.6342 4.54348L9.37326 2.85908C8.61028 1.83992 7.13596 1.70529 6.26145 2.57483L4.69185 4.13552C4.25823 4.56668 3.96765 5.12559 4.00289 5.74561C4.09304 7.33182 4.81071 10.7447 8.81536 14.7266C13.0621 18.9492 17.0468 19.117 18.6763 18.9651C19.1917 18.9171 19.6399 18.6546 20.0011 18.2954L21.4217 16.883C22.3806 15.9295 22.1102 14.2949 20.8833 13.628L18.9728 12.5894C18.1672 12.1515 17.1858 12.2801 16.5562 12.9062Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <a href="#" class="text-blue-600 hover:underline">
                                {{ $user->person->phone_no }}
                            </a>
                        </li>

                        <li class="flex items-center gap-x-2 text-sm text-gray-500">
                            <svg class="size-4" height="200px" width="200px" version="1.1" id="_x32_"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #000000;
                                        }
                                    </style>
                                    <g>
                                        <path class="st0"
                                            d="M474.234,284.88c23.29-23.268,37.781-55.654,37.766-91.185c0.015-35.53-14.476-67.917-37.766-91.178 c-23.261-23.298-55.64-37.788-91.185-37.766c-35.53-0.022-67.924,14.469-91.17,37.766c-23.304,23.261-37.795,55.648-37.78,91.178 c-0.015,35.53,14.476,67.916,37.78,91.185c19.268,19.297,44.809,32.517,73.21,36.488v52.976h-58.486v35.944h58.486v56.766h35.937 v-56.766h58.486v-35.944h-58.486v-52.976C429.426,317.397,454.966,304.177,474.234,284.88z M383.049,275.921 c-11.413-0.008-22.172-2.301-32.002-6.454c-14.724-6.222-27.327-16.684-36.198-29.817c-8.857-13.147-14.012-28.844-14.012-45.955 c0-11.42,2.294-22.172,6.447-31.994c6.214-14.731,16.669-27.326,29.81-36.198c13.155-8.864,28.85-14.019,45.955-14.034 c11.413,0.008,22.172,2.302,32.002,6.462c14.724,6.214,27.327,16.676,36.198,29.809c8.857,13.156,14.012,28.851,14.026,45.956 c-0.014,11.42-2.308,22.172-6.461,31.995c-6.214,14.73-16.683,27.333-29.81,36.198 C415.849,270.759,400.168,275.907,383.049,275.921z">
                                        </path>
                                        <path class="st0"
                                            d="M146.912,202.305v-88.55l35.69,35.683l25.424-25.41l-79.075-79.082l-79.09,79.082l25.41,25.41l35.704-35.69 v88.557c-28.401,3.978-53.941,17.199-73.209,36.502C14.462,262.069-0.014,294.448,0,329.979 c-0.014,35.545,14.462,67.924,37.766,91.184c23.261,23.305,55.64,37.788,91.185,37.774c35.53,0.014,67.91-14.469,91.17-37.774 c23.304-23.261,37.78-55.64,37.78-91.184c0-35.53-14.476-67.91-37.78-91.171C200.854,219.505,175.313,206.283,146.912,202.305z M204.716,361.981c-6.229,14.73-16.683,27.326-29.81,36.198c-13.154,8.872-28.85,14.027-45.955,14.027 c-11.427,0-22.172-2.294-32.002-6.447c-14.723-6.229-27.327-16.684-36.198-29.817c-8.872-13.155-14.026-28.844-14.026-45.962 c0-11.412,2.294-22.164,6.446-31.987c6.229-14.723,16.684-27.326,29.824-36.198c13.14-8.864,28.836-14.011,45.955-14.026 c11.413,0,22.157,2.294,32.002,6.454c14.709,6.222,27.312,16.676,36.184,29.809c8.871,13.156,14.026,28.844,14.026,45.948 C211.163,341.405,208.868,352.165,204.716,361.981z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <span>{{ $user->person->gender }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End About Section -->

                <!-- Additional Information Section -->
                <div class="bg-[#DDEBFE] p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span class="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="text-2xl text-blue-600 py-4">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">First Name</div>
                                <div class="text-gray-600 w-2/3">{{ $user->first_name }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Middle Name</div>
                                <div class="text-gray-600 w-2/3">{{ $user->middle_name }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Last Name</div>
                                <div class="text-gray-600 w-2/3">{{ $user->last_name }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Username</div>
                                <div class="text-gray-600 w-2/3">{{ $user->username }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Gender</div>
                                <div class="text-gray-600 w-2/3">{{ $user->person->gender }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Contact No.</div>
                                <div class="text-gray-600 w-2/3">{{ $user->person->phone_no }}</div>
                            </div>
                            <div class="flex items-center p-2 rounded-md">
                                <div class="font-semibold text-blue-700 w-1/3">Email</div>
                                <div class="text-gray-600 w-2/3">
                                    <a class="text-blue-800 hover:underline" href="mailto:{{ $user->email }}">{{
                                        $user->email }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Additional Information Section -->

            </div>
            <!-- End Profile Container -->

        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->


    <!-- ========== FOOTER ========== -->
    @livewire('components.footer')
    <!-- ========== END FOOTER ========== -->


</div>