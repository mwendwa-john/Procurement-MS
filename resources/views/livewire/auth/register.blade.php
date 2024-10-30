<div class="bg-sky-50">


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
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-2 lg:py-16">
                <div class="max-w-2xl text-center mx-auto">
                    <!-- Title -->
                    <a href="{{ route('home') }}">
                        <img class="w-auto h-16 mx-auto" src="{{ asset('front-assets/images/superiorLogo.png') }}"
                            alt="logo">
                    </a>

                    <div class="max-w-2xl">
                        <h1 class="block font-semibold text-blue-600 text-xl md:text-3xl lg:text-4xl">
                            Create a new account
                        </h1>
                    </div>

                    <span class="block font-bold text-violet-500 text-xl">or</span>

                    <a href="{{ route('login') }}"
                        class="inline-block text-sm font-medium bg-clip-text bg-gradient-to-l from-blue-600 to-violet-500 text-transparent">
                        sign in to your account
                    </a>
                    <!-- End Title -->

                </div>


                <!-- ========== MAIN CONTENT ========== -->
                <main id="content">
                    <!-- Table Section -->
                    <div class="max-w-[90rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

                        <div class="mt-7 bg-white border border-gray-200 rounded-xl shadow-sm max-w-lg mx-auto">
                            <div class="p-4 sm:p-7">
                                <div class="mt-5">
                                    <!-- Form -->
                                    <form wire:submit.prevent="registerUser">
                                        @csrf
                                        <!-- Form Group - Prifile Image -->
                                        <div>
                                            <div class="flex items-center justify-center">
                                                <div class="flex flex-wrap items-center gap-3 sm:gap-5">
                                                    <!-- Triggering the file upload when clicking on the icon -->
                                                    <div class="group">
                                                        @if ($profileImage)
                                                        <div class="mt-2 block">
                                                            <label for="upload">
                                                                <img id="preview"
                                                                    class="h-20 w-20 object-cover rounded-full"
                                                                    src="{{ $profileImage->temporaryUrl() }}"
                                                                    alt="profile" />
                                                            </label>
                                                        </div>
                                                        @else
                                                        <label for="upload"
                                                            class="flex shrink-0 justify-center items-center w-20 h-20 border-2 border-dotted border-gray-300 text-gray-400 cursor-pointer rounded-full hover:bg-gray-50">
                                                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                                stroke-width="1.5">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                                <path
                                                                    d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662">
                                                                </path>
                                                            </svg>
                                                        </label>
                                                        @endif
                                                        <input id="upload" wire:model.live="profileImage" type="file"
                                                            class="hidden" accept="image/*" />

                                                    </div>

                                                    <!-- Upload button -->
                                                    <div class="grow">
                                                        <div class="flex items-center gap-x-2">
                                                            <!-- Triggering the file upload when clicking the upload button -->
                                                            <label for="upload"
                                                                class=" flex py-2 px-3 text-xs font-medium text-white bg-blue-600 rounded-lg cursor-pointer hover:bg-blue-700">
                                                                <svg class="w-4 h-4 mr-1"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2">
                                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                    </path>
                                                                    <polyline points="17 8 12 3 7 8"></polyline>
                                                                    <line x1="12" y1="3" x2="12" y2="15"></line>
                                                                </svg>
                                                                Upload photo
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @error('profileImage')
                                            <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <!-- End Form Group -->


                                        <div class="grid grid-cols-2 gap-y-4 gap-x-8">

                                            <!-- Form Group - First Name -->
                                            <div>
                                                <label for="first_name"
                                                    class="block text-sm font-medium mb-2 text-start">
                                                    First name
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="first_name" type="text" id="first_name"
                                                        name="first_name"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="first_name">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('first_name')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Middle Name -->
                                            <div>
                                                <label for="middle_name"
                                                    class="block text-sm font-medium mb-2 text-start">
                                                    Middle name
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="middle_name" type="text" id="middle_name"
                                                        name="middle_name"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="middle_name">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('middle_name')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Last Name -->
                                            <div>
                                                <label for="last_name"
                                                    class="block text-sm font-medium mb-2 text-start">
                                                    Last name
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="last_name" type="text" id="last_name"
                                                        name="last_name"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="last_name">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('last_name')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Username -->
                                            <div>
                                                <label for="username" class="block text-sm font-medium mb-2 text-start">
                                                    Username
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="username" type="text" id="username"
                                                        name="username"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="username">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('username')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Email address -->
                                            <div>
                                                <label for="email" class="block text-sm font-medium mb-2 text-start">
                                                    Email address
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="email" type="email" id="email" name="email"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="email">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('email')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Phone No -->
                                            <div>
                                                <label for="phone_no" class="block text-sm font-medium mb-2 text-start">
                                                    Phone No
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="phone_no" type="tel" id="phone_no"
                                                        name="phone_no"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="phone_no">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('phone_no')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->



                                            <!-- Form Group - gender -->
                                            <div>
                                                <label for="gender" class="block text-sm font-medium mb-2 text-start">
                                                    Gender
                                                </label>
                                                <select wire:model.live="gender"
                                                    class="py-2 px-4 pe-9 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                                    <option value="">select below</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>

                                                @error('gender')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - User Bio -->
                                            <div class="col-span-2">
                                                <div class="max-w-sm">
                                                    <label for="hs-autoheight-textarea"
                                                        class="block text-sm font-medium mb-2">
                                                        User Bio
                                                    </label>
                                                    <textarea wire:model="user_bio" id="hs-autoheight-textarea"
                                                        class="py-3 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        rows="3" placeholder="A little something about you...">
                                                    </textarea>
                                                </div>

                                                @error('user_bio')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->



                                            <!-- Form Group - Password  -->
                                            <div>
                                                <label for="password" class="block text-sm font-medium mb-2">
                                                    Password
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.lazy="password" type="password" id="password"
                                                        name="password"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="password-error">
                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('password')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                            <!-- Form Group - Confirm Password  -->
                                            <div>
                                                <label for="confirm-password"
                                                    class="block text-sm font-medium mb-2 text-start">
                                                    Confirm Password
                                                </label>
                                                <div class="relative">
                                                    <input wire:model.live="passwordConfirmation" type="password"
                                                        id="confirm-password" name="confirm-password"
                                                        class="py-2 px-4 block w-full border-blue-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                                        aria-describedby="confirm-password">

                                                    <div
                                                        class="hidden absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                        <svg class="size-5 text-red-500" width="16" height="16"
                                                            fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                        </svg>
                                                    </div>
                                                </div>

                                                @error('passwordConfirmation')
                                                <p class="text-xs text-red-600 mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <!-- End Form Group -->


                                        </div>

                                        <div class="mt-6">
                                            <button type="submit"
                                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                                Sign up
                                            </button>

                                            <!-- Sign In -->
                                            <h3 class="my-4 text-center text-base">
                                                Already have an account?
                                                <a class="text-blue-600 mx-2 decoration-2 hover:underline focus:outline-none focus:underline font-medium"
                                                    href="{{ route('login') }}">
                                                    Sign In
                                                </a>
                                            </h3>
                                            <!-- End Sign In -->
                                        </div>
                                    </form>
                                    <!-- End Form -->
                                </div>
                            </div>
                        </div>


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