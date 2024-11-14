@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')

    <link rel="icon" href=
"{{ asset('img/logo.png') }}" type="image/x-icon">
    <div class="welcome min-h-screen flex flex-col justify-center items-center text-white">
        <!-- Header -->
        <img src="{{ asset('img/logo.png') }}" class="w-auto h-16">
        <div class="text-center px-4">

            <h1 id="thintext" class="text-3xl opacity-40 pb-5 md:pb-5 animate-pulse">BUDGETeer.</h1>
            <p class="text-5xl md:text-5xl font-extrabold mt-4 text-center">Track Every Move, Build a Brighter </p>
            <br>
            <p class="font-bold md:text-4xl text-4xl italic">Financial Future!</p>
        </div>


        <!-- Get Started Button -->
        <br>
        <br>
        <br>
        <a href="{{ route('login') }}"
            class="mt-18 px-6 py-3 text-2xl bg-[#7B47C2] text-white font-bold rounded-lg shadow-lg hover:bg-purple-700 transition duration-300">
            Get Started <i class="fa-solid fa-angle-right ml-2"></i>
        </a>


        {{--         <!-- Images Section -->
        <div class="mt-12 flex justify-center">
            <img src="{{ asset('img/group93.png') }}" alt="App Preview" class="w-83 h-72">
        </div> --}}
    </div>
