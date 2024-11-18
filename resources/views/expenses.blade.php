@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')
    @vite(['resources/js/expenses.js'])

    <body class="bg-[#D9D9D9] poppin">
        <div class="flex min-h-screen">
            @include('include/sidebar')
            <main class="w-3/4 pt-2 px-16">
                <!-- My Expenses -->
                <form id="expenses-form" autocomplete="off" class="expenses-form">
                    <h2 class="text-xl font-bold mb-6">My Expenses</h2>
                    <div class="bg-white rounded-lg p-4">
                        <!-- Header Row -->
                        <div class="grid grid-cols-4 bg-[#2A3CDE] text-white font-semibold text-center rounded-t-lg">
                            <div class="py-2 border-r border-[#E0E0E0]">Category</div>
                            <div class="py-2 border-r border-[#E0E0E0]">Type</div>
                            <div class="py-2 border-r border-[#E0E0E0]">Amount</div>
                            <div class="py-2 border-[#E0E0E0]">Date</div>
                        </div>
                        <div class="grid grid-cols-4 gap-6 p-4 rounded-b-lg">
                            <div class="input-wrapper">
                                <select id="category" name="category" class="border border-[#757575] rounded-md p-2">
                                    <option value="" disabled selected>--Select Category--</option>
                                    <option value="Education">Education</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Food">Food</option>
                                    <option value="Health">Health</option>
                                    <option value="Miscellaneous">Miscellaneous</option>
                                    <option value="Shopping">Shopping</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Utilities">Utilities</option>
                                </select>
                            </div>
                            <div class="input-wrapper">
                                <select id="type" name="type" class="border border-[#757575] rounded-md p-2">
                                    <option value="" disabled selected>-- Select a Type --</option>
                                </select>
                            </div>
                            <div class="input-wrapper relative">
                                <span class="absolute text-[#757575] inset-y-0 left-0 flex items-center pl-3">₱ |</span>
                                <input id="amount" name="amount" type="number"
                                    class="w-full pl-10 p-2 border border-[#757575] rounded-lg" placeholder="0.00">
                            </div>
                            <div class="input-wrapper relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-autohide" datepicker-buttons datepicker-autoselect-today
                                    datepicker-format="yyyy-mm-dd" name="date" datepicker type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                    </div>
                    <button id="add-expense-btn"
                        class="bg-[#2A3CDE] ml-2 text-white mt-4 px-10 py-1 rounded-md hover:bg-blue-700 font-bold">Add</button>

                </form>

                <div id="success-popup"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                    <div class="bg-white rounded-lg p-6 text-center shadow-lg max-w-xs">
                        <p class="text-green-500 font-semibold mb-4">Expense added successfully!</p>
                        <button onclick="closeSuccessPopup()"
                            class="bg-[#2A3CDE] text-white px-4 py-2 rounded-md hover:bg-blue-700">OK</button>
                    </div>
                </div>


                <!-- Recent Transactions -->
                <section class="mt-2">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-2xl font-semibold">Recent Transactions</h2>
                        {{--                         <a href="#" class="text-[#2A3CDE]">View all</a> --}}
                    </div>
                    <!-- Filters Section -->
                    <div class="flex space-x-4 mb-4 justify-center">
                        <!-- Date Filter -->
                            <div class="input-wrapper relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="filter-date" datepicker-buttons datepicker-autoselect-today
                                    datepicker-format="yyyy-mm-dd" name="date" datepicker type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>

                        <!-- Type Filter -->
                        <select id="filter-category" class="border border-gray-300 rounded-md px-4 py-2">
                            <option value="">-- Filter by Category --</option>
                            <option value="Education">Education</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Food">Food</option>
                            <option value="Health">Health</option>
                            <option value="Miscellaneous">Miscellaneous</option>
                            <option value="Shopping">Shopping</option>
                            <option value="Transportation">Transportation</option>
                            <option value="Utilities">Utilities</option>
                            <!-- Add more options as needed -->
                        </select>

                        <!-- Amount Filter -->
                        <input type="number" id="filter-amount" placeholder="Enter Amount"
                            class="border border-gray-300 rounded-lg px-4 py-2">

                        <!-- Filter Button -->
                        <button id="apply-filters-btn"
                            class="bg-[#2A3CDE] text-white px-4 py-2 rounded-md hover:bg-blue-700">Apply Filters</button>
                    </div>

                    <div class="space-y-3 overflow-y-auto e-rs-h rounded-lg scrollable"></div>

                </section>
            </main>
        </div>
    </body>
@endsection

<!-- Add your CSS for error messages -->

<script>
    loadUserExpenses();

    function loadUserExpenses() {
        const categoryIcons = {
            Education: 'fa-solid fa-graduation-cap',
            Entertainment: 'fa-solid fa-gamepad',
            Food: 'fa-solid fa-utensils',
            Health: 'fa-solid fa-heartbeat',
            Miscellaneous: 'fa-solid fa-ellipsis',
            Shopping: 'fa-solid fa-shopping-bag',
            Transportation: 'fa-solid fa-bus',
            Utilities: 'fa-solid fa-bolt'
        };

        // Capture filter values, using nullish coalescing to handle missing elements gracefully
        const filterDate = document.getElementById('filter-date')?.value || '';
        const filterCategory = document.getElementById('filter-category')?.value || '';
        const filterAmount = document.getElementById('filter-amount')?.value || '';

        // Include filters in the API request
        fetch(`/get-user-expenses?date=${filterDate}&category=${filterCategory}&amount=${filterAmount}`, {
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
                const scrollableContainer = document.querySelector('.scrollable');
                if (!scrollableContainer) {
                    console.error('Scrollable container not found');
                    return;
                }

                scrollableContainer.innerHTML = ''; // Clear previous content

                if (!data.user || !Array.isArray(data.user) || data.user.length === 0) {
                    scrollableContainer.innerHTML = '<p class="text-center mt-5">No recent transactions available.</p>';
                    return;
                }

                data.user.forEach(expense => {
                    const row = document.createElement('div');
                    row.classList.add('flex', 'items-center', 'justify-between', 'p-4',
                        'bg-gray-100', 'rounded-lg');

                    const iconClass = categoryIcons[expense.category] || 'fa-solid fa-question';

                    row.innerHTML = `
                        <div class="flex items-center space-x-4">
                            <div class="rounded-full bg-[#2A3CDE] h-10 w-10 flex justify-center items-center">
                                <i class="${iconClass} text-xl text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold">${expense.category}</p>
                                <p class="text-sm text-gray-500">${expense.type}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-red-600 font-semibold">- ${expense.amount}</p>
                            <p class="text-sm text-gray-500">${expense.date}</p>
                        </div>
                    `;
                    scrollableContainer.appendChild(row);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function addExpenses() {
        const form = document.getElementById('expenses-form');
        const formData = new FormData(form);

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.remove());

        fetch('/expensesadd', {
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
                    form.reset();
                    loadUserExpenses();
                    showSuccessPopup();
                }
            })
            .catch(error => {
                console.error('Error adding expense:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {

        document.getElementById('add-expense-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            addExpenses();
        });

        document.getElementById('apply-filters-btn').addEventListener('click', function(event) {
            event.preventDefault();
            loadUserExpenses();
        });

    });

    function showSuccessPopup() {
        const popup = document.getElementById('success-popup');
        popup.classList.remove('hidden');

        // Automatically close the popup after 3 seconds
        setTimeout(() => {
            popup.classList.add('hidden');
        }, 3000);
    }

    // Close the popup when clicking "OK"
    function closeSuccessPopup() {
        document.getElementById('success-popup').classList.add('hidden');
    }
</script>
