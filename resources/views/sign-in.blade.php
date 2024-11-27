@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')

    <body class="bg-[#0F0B35] poppin">

        @if ($errors->any())
            <div id="error-popup"
                class="fixed right-4 top-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 max-w-lg animate-shake shadow-lg"
                role="alert">
                <div class="flex items-start">
                    <svg class="flex-shrink-0 inline w-5 h-5 mr-3 mt-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div>
                        <span class="font-medium">Ensure that these requirements are met:</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button type="button"
                    class="absolute top-2 right-2 text-red-500 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700"
                    data-dismiss-target="#error-popup" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        @if (session('success'))
            <div id="success-popup"
                class="fixed flex top-5 right-5 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg drop-shadow-lg dark:text-gray-400 dark:bg-gray-800 animate-jump-in"
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal text-green-800">{{ session('success') }}</div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    data-dismiss-target="#success-popup" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        <div class="flex flex-col md:flex-row h-screen">

            <!-- Left Side: Welcome and Illustration -->
            <div class="text-white w-full md:w-1/2 flex flex-col animate-fade">

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
                    <img class="w-40 md:w-80 h-auto animate-fade-left" src="{{ asset('img/image1-crop.png') }}"
                        alt="Illustration">
                </div>

            </div>

            <!-- Right Side: Login Form -->
            <div
                class="w-full md:w-2/3 bg-white flex flex-col justify-center items-center rounded-t-3xl md:rounded-l-3xl md:rounded-tl-3xl md:rounded-t-none animate-fade-left mt-10 md:mt-0 p-5 md:p-0">
                <div class="w-full max-w-sm md:max-w-md lg:max-w-lg">

                    <h2 class="text-2xl md:text-3xl font-bold mb-1">Welcome!</h2>
                    <p class="mb-6">Please enter your details:</p>

                    <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input autocomplete="off" type="email" id="email" name="email" placeholder="Email"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('email') border-red-500 @enderror">
                            {{--                             @error('email')
                                <p class="text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="relative">
                            <input autocomplete="off" type="password" id="password" name="password" placeholder="Password"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('password') border-red-500 @enderror" />

                            <button type="button" id="toggle-password"
                                class="absolute inset-y-0 right-3 flex items-center text-gray-500 focus:outline-none"
                                onclick="togglePassword()">
                                <i id="eye-icon" class="fa-solid fa-eye h-6 w-6"></i>
                            </button>

                            {{--                             @error('password')
                                <p class="text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        <div class="flex items-center">

                            <input type="checkbox" id="remember_me" name="remember"
                                class="ml-5 w-4 h-4 text-purple-600 shadow border-gray-300 rounded focus:ring-purple-500" />

                            <label for="remember_me"
                                class="ml-2 text-sm text-gray-700 text-shadow-sm shadow-gray-300">Remember Me</label>

                            <div class="ml-auto mr-5">
                                <a href="#"
                                    class="text-sm text-purple-600 hover:underline text-shadow-sm shadow-gray-300">Forgot
                                    Password?</a>
                            </div>
                        </div>


                        <div class="w-full max-w-xs mx-auto pb-5 relative pt-3">
                            <div
                                class="@error('g-recaptcha-response') border_glow border border-red-500 rounded-md @enderror">
                                <div class="g-recaptcha" data-size="normal"
                                    data-sitekey="{{ config('services.captcha.sitekey') }}"></div>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#7B47C2] text-[#F5F5F5] py-3 rounded-xl drop-shadow mt-6 font-bold shadow-lg hover:bg-purple-700 transition duration-300">
                            Sign In
                        </button>
                    </form>

                    <p class="text-sm mt-3 text-left">Don't have an account? <a href="{{ route('registration') }}"
                            class="text-purple-600 hover:underline">Sign Up</a></p>
                </div>
                {{--                 <div class="mt-6">

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-gray-100 text-gray-500">
                                Or continue with
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        <div>
                            <a href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <img class="h-5 w-5" src="https://www.svgrepo.com/show/512120/facebook-176.svg"
                                    alt="">
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="w-full flex items-center justify-center px-8 py-3 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-[#0F0B35] bg-white hover:bg-gray-50">
                                <img class="h-6 w-6" src="https://www.svgrepo.com/show/506498/google.svg"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>

    </body>



    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                // Change the icon to eye-slash
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                // Change the icon back to eye
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function closeSuccessPopup() {
            const popup = document.getElementById('success-popup');
            popup.style.display = 'none'; // This will hide the popup without a fade effect.
        }
    </script>

    <style>
        #success-popup {
            z-index: 9999;
            /* Makes sure the popup is always on top */
        }

        #error-popup {
            z-index: 9999;
            /* Makes sure the popup is always on top */
        }
    </style>
@endsection
