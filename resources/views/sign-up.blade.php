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
                class="w-full md:w-2/3 bg-white flex flex-col justify-center items-center rounded-t-3xl md:rounded-l-3xl md:rounded-t-nonet mt-10 md:mt-0 p-5 md:p-0">
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
                                <input type="text" id="first_name" name="first_name" placeholder="First Name"
                                    class="placeholder-black w-full p-3 border border-[#CFCECE] rounded-md focus:outline-none focus:border-purple-600 @error('first_name') border-red-500 @enderror">
                                @error('first_name')
                                    <p class="error-message text-red-500 text-xs absolute mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/2 mt-4 md:mt-0 relative">
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name"
                                    class="placeholder-black w-full p-3 border border-[#CFCECE] rounded-md focus:outline-none focus:border-purple-600 @error('last_name') border-red-500 @enderror">
                                @error('last_name')
                                    <p class="error-message text-red-500 text-xs absolute mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="relative mt-4">
                            <input type="email" id="email" name="email" placeholder="Email"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative mt-4">
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="relative mt-4">
                            <input type="password" id="confirm_password" name="password_confirmation"
                                placeholder="Confirm Password"
                                class="placeholder-black w-full p-3 border border-[#CFCECE] rounded mt-1 focus:outline-none focus:border-purple-600 @error('password_confirmation') border-red-500 @enderror">
                            @error('password_confirmation')
                                <p class="error-message text-red-500 text-xs absolute">{{ $message }}</p>
                            @enderror
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

@endsection
