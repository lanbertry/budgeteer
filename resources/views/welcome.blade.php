@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')
    @vite(['resources/css/welcome.css', 'resources/js/welcome.js'])

    <div class="intro poppin">

        <h1 class="logo-header">
            <div class="budgetlogo flex justify-center text-center animate-fade animate-delay-500">
                <img src="{{ asset('img/logo.png') }}" class="w-auto h-16">
            </div>

            <span class="logo text-4xl animate-fade-up animate-delay-500">Budg</span><span
                class="logo text-4xl animate-fade-up animate-delay-500">eteer</span>
        </h1>

    </div>

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <div class="welcome min-h-screen flex flex-col justify-center items-center text-white">
        <!-- Header -->

        <img src="{{ asset('img/logo.png') }}" class="w-auto h-16 animate-fade animate-delay-[2800ms]">
        <div class="text-center px-4">
            <div class="animate-fade animate-delay-[2800ms]">
                <h1 id="thintext" class="text-3xl opacity-40 pb-5 md:pb-5">BUDGETeer.</h1>
                <p class="text-5xl md:text-5xl font-extrabold mt-4 text-center">Track Every Move, Build a
                    Brighter </p>
                <br>
                <p class="font-bold md:text-4xl text-4xl italic">Financial Future!</p>
            </div>
        </div>

        <!-- Get Started Button -->
        <br><br><br>
        <a href="{{ route('login') }}"
            class="animate-fade animate-delay-[2800ms] mt-18 px-6 py-3 text-2xl bg-[#7B47C2] text-white font-bold rounded-lg shadow-lg hover:bg-purple-700 transition-all duration-300 transform hover:scale-105 flex items-center justify-center group">
            Get Started
            <i
                class="fa-solid fa-arrow-right ml-2 transition-all duration-300 ease-in-out transform group-hover:translate-x-3  "></i>
        </a>
    </div>

