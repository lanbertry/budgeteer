@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')
    @vite(['resources/js/sign-up.js'])

    <body class="bg-[#0F0B35] poppin">

        <div class="flex flex-col md:flex-row h-screen">

            <!-- Left Side: Welcome and Illustration -->
            <div class="text-white w-full md:w-1/2 flex flex-col">
                <div class="pb-10 md:pb-20 p-5 px-10">
                    <div class="flex">
                        <img src="{{ asset('img/logo.png') }}" class="h-7 w-7">
                        <h1 class="text-lg font-thin opacity-80">BUDGETeer.</h1>
                    </div>

                    <p class="text-sm">Track, Save, and Succeed!</p>
                </div>

                <div class="">
                    <div class="animate-pulse animate-infinite">
                        <h2 class="text-3xl md:text-5xl text-center font-bold">Keep Your Cash Flow</h2>
                        <h2 class="text-3xl md:text-5xl mt-5 text-center font-bold">In The Know</h2>
                    </div>
                    <p class="text-md md:text-lg mt-5 text-center font-light">with BUDGETeer!</p>
                </div>

                <div class="flex justify-end">
                    <img class="w-40 md:w-80 h-auto" src="{{ asset('img/image1-crop.png') }}" alt="Illustration">
                </div>

            </div>

            <!-- Right Side: Create Account Form -->
            <div
                class="w-full md:w-2/3 bg-white flex flex-col justify-center items-center rounded-t-3xl md:rounded-l-3xl md:rounded-t-nonet  md:mt-0 p-5 md:p-0">
                <div class="w-full max-w-sm md:max-w-md lg:max-w-xl animate-fade animate-once animate-ease-in">
                    @if (session('error'))
                        <div class="error-message text-red-500 text-center mb-4 font-semibold">
                            {{ session('error') }}
                        </div>
                    @endif

                    <h2 class="text-2xl md:text-3xl font-bold mb-1">Create Account!</h2>
                    <p class="mb-6">Please enter your details:</p>

                    <form action="{{ route('registration.post') }}" method="POST" class="space-y-4 w-full relative">
                        @csrf
                        <div class="flex flex-col md:flex-row md:space-x-4 pb-1">
                            <div class="w-full md:w-1/2 relative">
                                <input autocomplete="off" type="text" id="first_name" name="first_name"
                                    placeholder="First Name"
                                    class="placeholder-black w-full p-3 border border-[#CFCECE] rounded-md focus:outline-none focus:border-purple-600 @error('first_name') border-red-500 @enderror">
{{--                                 @error('first_name')
                                    <p class="error-message text-red-500 text-xs absolute mt-1">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <div class="w-full md:w-1/2 mt-4 md:mt-0 relative">
                                <input autocomplete="off" type="text" id="last_name" name="last_name"
                                    placeholder="Last Name"
                                    class="placeholder-black w-full p-3 border border-[#CFCECE] rounded-md focus:outline-none focus:border-purple-600 @error('last_name') border-red-500 @enderror">
                                {{--                                 @error('last_name')
                                    <p class="error-message text-red-500 text-xs absolute mt-1">{{ $message }}</p>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="relative">
                            <input autocomplete="off" type="email" id="email" name="email" placeholder="Email"
                                class="placeholder-black w-full border border-[#CFCECE] rounded focus:outline-none focus:border-purple-600 @error('email') border-red-500 @enderror"
                                onfocus="toggleValidation(true, 'email')" onblur="toggleValidation(false, 'email')"
                                oninput="validateEmail()">

{{--                             @error('email')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror --}}
                            <!-- Validation Messages with Icons -->
                            <ul id="email-validation-messages"
                                class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                                <li id="email-format" class="flex items-center text-red-500">
                                    <span class="mr-2" id="email-icon">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    Enter a valid email address
                                </li>
                            </ul>
                        </div>

                        <div class="relative">

                            <input readonly type="password" id="password" name="password" placeholder="Password"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded focus:outline-none focus:border-purple-600 @error('password') border-red-500 @enderror"
                                onfocus="toggleValidation(true, 'password'), this.removeAttribute('readonly');"
                                onblur="toggleValidation(false, 'password')" oninput="validatePassword()"
                                autocomplete="off">
                            <ul id="password-validation-messages"
                                class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                                <li id="min-length" class="flex items-center text-red-500">
                                    <span class="mr-2" id="min-length-icon">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    Minimum 8 characters
                                </li>
                                <li id="special-char" class="flex items-center text-red-500">
                                    <span class="mr-2" id="special-char-icon">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    At least one special character
                                </li>
                                <li id="uppercase" class="flex items-center text-red-500">
                                    <span class="mr-2" id="uppercase-icon">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    At least one uppercase letter
                                </li>
                            </ul>
                            {{--                             @error('password')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="relative">
                            <input autocomplete="off" type="password" id="confirm_password" name="password_confirmation"
                                placeholder="Confirm Password"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('password_confirmation') border-red-500 @enderror"
                                onfocus="toggleValidation(true, 'confirm-password')"
                                onblur="toggleValidation(false, 'confirm-password')" oninput="validateConfirmPassword()">
                            <!-- Validation Messages with Icons -->
                            <ul id="confirm-password-validation-messages"
                                class="list-disc pl-5 text-sm space-y-1 mt-2 transition-all duration-300 max-h-0 overflow-hidden">
                                <li id="password-match" class="flex items-center text-red-500">
                                    <span class="mr-2" id="password-match-icon">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                    Passwords must match
                                </li>
                            </ul>
                            {{--                             @error('password_confirmation')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="w-full max-w-xs mx-auto pb-5 relative pt-3">
                            <div
                                class="@error('g-recaptcha-response') border_glow border border-red-500 rounded-md @enderror">
                                <div class="g-recaptcha" data-size="normal"
                                    data-sitekey="{{ config('services.captcha.sitekey') }}"></div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#7B47C2] text-[#F5F5F5] py-3 rounded-xl drop-shadow mt-6 font-bold shadow-lg hover:bg-purple-700 transition duration-300">Sign
                            Up</button>
                    </form>


                    <p class="text-sm mt-3 text-left">Already have an account? <a href="{{ route('login') }}"
                            class="text-purple-600 hover:underline">Sign In</a></p>
                </div>
            </div>
        </div>

    </body>
    <script>
        // Toggles visibility of validation messages
        function toggleValidation(show, type) {
            const validationMessages = document.getElementById(`${type}-validation-messages`);
            if (show) {
                validationMessages.classList.remove("max-h-0", "overflow-hidden");
                validationMessages.classList.add("max-h-40", "overflow-visible");
            } else {
                validationMessages.classList.add("max-h-0", "overflow-hidden");
                validationMessages.classList.remove("max-h-40", "overflow-visible");
            }
        }

        // Validates password field
        function validatePassword() {
            const password = document.getElementById("password").value;

            const validations = [{
                    id: "min-length",
                    icon: "min-length-icon",
                    test: (pwd) => pwd.length >= 8
                },
                {
                    id: "special-char",
                    icon: "special-char-icon",
                    test: (pwd) => /[!@#$%^&*(),.?":{}|<>]/g.test(pwd)
                },
                {
                    id: "uppercase",
                    icon: "uppercase-icon",
                    test: (pwd) => /[A-Z]/.test(pwd)
                },
            ];

            validations.forEach((validation) => {
                const element = document.getElementById(validation.id);
                const icon = document.getElementById(validation.icon);

                if (validation.test(password)) {
                    element.classList.replace("text-red-500", "text-green-500");
                    icon.innerHTML =
                        `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
                } else {
                    element.classList.replace("text-green-500", "text-red-500");
                    icon.innerHTML =
                        `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
                }
            });
        }

        // Validates email format
        function validateEmail() {
            const email = document.getElementById("email").value;
            const emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            const emailElement = document.getElementById("email-format");
            const emailIcon = document.getElementById("email-icon");

            if (emailFormat.test(email)) {
                emailElement.classList.replace("text-red-500", "text-green-500");
                emailIcon.innerHTML =
                    `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
            } else {
                emailElement.classList.replace("text-green-500", "text-red-500");
                emailIcon.innerHTML =
                    `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
            }
        }

        // Validates confirm password
        function validateConfirmPassword() {
            const password = document.getElementById("password").value.trim();
            const confirmPasswordInput = document.getElementById("confirm_password");

            if (confirmPasswordInput) {
                const confirmPassword = confirmPasswordInput.value.trim();
                const confirmPasswordElement = document.getElementById("password-match");
                const confirmPasswordIcon = document.getElementById("password-match-icon");

                if (password === confirmPassword && confirmPassword.length > 0) {
                    confirmPasswordElement.classList.replace("text-red-500", "text-green-500");
                    confirmPasswordIcon.innerHTML =
                        `<svg class="w-4 h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>`;
                } else {
                    confirmPasswordElement.classList.replace("text-green-500", "text-red-500");
                    confirmPasswordIcon.innerHTML =
                        `<svg class="w-4 h-4 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>`;
                }
            } else {
                console.error("Confirm password input not found");
            }
        }
    </script>
@endsection
