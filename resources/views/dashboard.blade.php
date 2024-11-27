@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')

    <div class="flex h-screen poppin">
        <!-- Sidebar -->
        @include('include/sidebar')

        <!-- Main Content -->
        <main class="flex-1 bg-[#D9D9D9] p-14 px-14">
            <h1 class="text-2xl font-bold mb-6">My Dashboard</h1>

            <div id="success-popup"
                class="fixed hidden flex top-5 right-5 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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
                <div class="ml-3 text-sm font-normal">Expenses added successfully.</div>
                <button type="button" onclick="closeSuccessPopup()"
                    class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                    {{--  data-dismiss-target="#success-popup"  --}}aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            <!-- Overview Cards -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-16 mb-10">
                <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-arrow-trend-up text-4xl text-[#00712D]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-[#00712D]">Daily Allowance</p>
                        <div class="dailyallowance">
                            <p class="text-3xl text-black font-semibold">₱0.00</p>
                        </div>

                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-arrow-trend-down text-4xl text-[#B8001F]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-[#00712D]">Daily Spending</p>
                        <div class="dailyspending">
                            <p class="text-3xl text-black font-semibold">₱0.00</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-wallet text-4xl text-[#0F0B35]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold text-[#00712D]">Daily Savings</p>
                        <div class="dailysaving">
                            <p class="text-3xl text-black font-semibold">₱0.00</p>
                        </div>
                    </div>
                </div>
                <div class="bg-[#2A3CDE] text-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-arrow-trend-up text-4xl text-[#00712D]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold">Weekly Allowance</p>
                        <p class="text-3xl font-semibold weeklyAllowance">₱0.00</p>
                    </div>
                </div>
                <div class="bg-[#2A3CDE] text-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-arrow-trend-down text-4xl text-[#B8001F]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold">Weekly Spending</p>
                        <p class="text-3xl font-semibold weeklySpending">₱0.00</p>
                    </div>
                </div>
                <div class="bg-[#2A3CDE] text-white p-4 rounded-lg shadow flex items-center gap-3">
                    <div class="rounded-full bg-[#C9FCDE] h-14 w-14 flex justify-center items-center">
                        <i class="fa-solid fa-wallet text-4xl text-[#0F0B35]"></i>
                    </div>
                    <div class="ml-3">
                        <p class="font-semibold">Weekly Savings</p>
                        <p class="text-3xl font-semibold weeklySaving">₱0.00</p>
                    </div>
                </div>
            </section>

            <!-- Income Form -->
            <section class="grid grid-cols-1 md:grid-cols-2 gap-32">

                <div>
                    <h2 class="text-xl font-bold mb-4">Source of Funds</h2>
                    <form class="bg-white p-6 rounded-lg shadow" id="expenses-form">
                        <div class="mb-4 input-wrapper">
                            <label for="type" class="block text-[#757575] ">Type:</label>
                            <select id="type" name="type"
                                class="w-full mt-1 p-2 border border-[#757575] rounded-lg">
                                <option value="" disabled selected>--Select Type--</option>
                                <option value="Allowance">Allowance</option>
                                <option value="Assistance">Assistance</option>
                                <option value="Profit">Profit</option>
                                <option value="Salary">Salary</option>
                                <option value="Savings">Savings</option>
                                <option value="Stipend">Stipend</option>
                            </select>
                        </div>

                        <div class="mb-4 input-wrapper">
                            <label for="amount" class="block text-gray-700">Amount:</label>
                            <div class="relative">
                                <span class="absolute text-[#757575] inset-y-0 left-0 flex items-center pl-3">₱ |</span>
                                <input id="amount" type="number" name="amount"
                                    class="w-full pl-10 p-2 border border-[#757575] rounded-lg" placeholder="0.00">
                            </div>
                        </div>

                        <div class="mb-6 input-wrapper">
                            <label for="date" class="block text-gray-700">Date:</label>
                            <div class="input-wrapper relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-autohide" datepicker-buttons datepicker-autoselect-today
                                    datepicker-orientation="top" datepicker-format="yyyy-mm-dd" name="date" datepicker
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>

                        <button id="add-income-btn" type="submit" onclick="closeSuccessPopup()"
                            class="w-full bg-[#2A3CDE] text-white py-2 px-4 rounded-lg">Add
                            Income</button>
                    </form>
                </div>

                <!-- Recent Transactions -->
                <div>
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Recent Transactions</h2>
                        {{--                      <a href="#" class="text-[#2A3CDE] text-sm">View all</a> --}}
                    </div>

                    <ul class="space-y-4 overflow-y-auto rs-h rounded-lg scrollable">

                        <div role="status" id="loading-indicator" class="text-center py-4 hidden">
                            Loading more transactions...
                        </div>

                    </ul>
                </div>
            </section>
        </main>
    </div>

@endsection

<script>
    function weeklySaving() {
        fetch('/weeklysaving', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklysaving').innerHTML =
                    ` <p class="text-3xl font-semibold">₱${data.weeklySaving}</p> `;

            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function weeklySpending() {
        fetch('/weeklyspending', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklyspending').innerHTML =
                    ` <p class="text-3xl font-semibold">₱${data.weeklySpending}</p> `;

            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function weeklyAllowance() {
        fetch('/weeklyallowance', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.weeklyallowance').innerHTML =
                    ` <p class="text-3xl font-semibold">₱${data.weeklyAllowance}</p> `;

            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function dailySaving() {
        fetch('/dailysaving', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailysaving').innerHTML =
                    ` <p class="text-3xl text-black font-semibold">₱${data.todaysSaving}</p> `;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function dailySpending() {
        fetch('/dailyspending', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailyspending').innerHTML =
                    ` <p class="text-3xl text-black font-semibold">₱${data.todaysSpending}</p> `;
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function dailyAllowance() {
        fetch('/dailyallowance', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                document.querySelector('.dailyallowance').innerHTML =
                    ` <p class="text-3xl text-black font-semibold">₱${data.todaysAllowance}</p> `;

            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function loadUserIncome() {
        const categoryIcons = {
            Allowance: 'fa-solid fa-wallet',
            Salary: 'fa-solid fa-money-check-dollar',
            Stipend: 'fa-solid fa-peso-sign',
            Profit: 'fa-solid fa-money-bill-trend-up',
            Savings: 'fa-solid fa-piggy-bank',
            Assistance: 'fa-solid fa-handshake-angle',
        };

        fetch('/get-user-incomes', {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const scrollableContainer = document.querySelector('.scrollable');

                // Clear previous content
                scrollableContainer.innerHTML = '';

                // Check if data.user exists and has items
                if (!data.user || !Array.isArray(data.user) || data.user.length === 0) {
                    scrollableContainer.innerHTML = '<p>No recent transactions available.</p>';
                    return;
                }

                // Iterate over each income item
                data.user.forEach(income => {
                    const addedAtFormatted = new Date(income.date).toLocaleString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    });

                    const iconClass = categoryIcons[income.type] || 'fa-solid fa-question';

                    const listItem = document.createElement('li');
                    listItem.classList.add('flex', 'justify-between', 'items-center', 'bg-white', 'p-3',
                        'rounded-lg', 'shadow');

                    listItem.innerHTML = `
                <div class="flex items-center space-x-5">
                    <div class="rounded-full bg-[#2A3CDE] h-10 w-10 flex justify-center items-center">
                        <i class="${iconClass} text-xl text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold">${income.type}</p>
                        <p class="text-[#757575] text-sm">${income.date}</p>
                    </div>
                </div>
                <div class="text-end">
                    <p class="text-[#00712D]">+ ${income.amount}</p>
                    <p class="text-[#757575]">${addedAtFormatted}</p>
                </div>
            `;

                    scrollableContainer.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function addIncome() {
        const form = document.getElementById('expenses-form');
        const formData = new FormData(form);

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.remove());

        fetch('/incomeadd', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    Accept: 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    console.error('Validation Errors:', data.errors);

                    // Display errors below each input as floating text
                    Object.keys(data.errors).forEach(field => {
                        const inputWrapper = document.querySelector(`[name="${field}"]`).closest(
                            '.input-wrapper');
                        if (inputWrapper) {
                            const errorMessage = document.createElement('p');
                            errorMessage.classList.add('error-message');
                            errorMessage.innerText = data.errors[field][0];
                            inputWrapper.appendChild(errorMessage);
                        }
                    });
                } else {
                    console.log('Expense added successfully');

                    const successPopup = document.getElementById("success-popup");
                    successPopup.classList.remove("hidden");

                    setTimeout(() => {
                        successPopup.classList.add("hidden");
                    }, 10000); // Adjust the time (in milliseconds) as needed

                    form.reset();
                    loadUserIncome();
                    dailyAllowance();
                    dailySpending();
                    dailySaving();
                    weeklyAllowance();
                    weeklySpending();
                    weeklySaving();
                }
            })
            .catch(error => {
                console.error('Error adding expense:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-income-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            addIncome(); // Call the function to add expenses
        });

        loadUserIncome();
        dailyAllowance();
        dailySpending();
        dailySaving();
        weeklyAllowance();
        weeklySpending();
        weeklySaving();
    });

    /*     function showSuccessPopup() {
            const successPopup = document.getElementById('success-popup');
            successPopup.classList.remove('hidden'); // Show the popup
        } */

    function closeSuccessPopup() {
        const successPopup = document.getElementById('success-popup');
        successPopup.classList.add('hidden'); // Hide the popup
    }
</script>
