@extends('include/layout')
@section('title', 'Budgeteer')
@section('content')
    @vite(['resources/js/budget.js'])

    <body class="bg-[#D9D9D9] poppin">
        <!-- Sidebar -->
        <div class="flex min-h-screen">
            @include('include/sidebar')

            <!-- Main Content -->
            <main class="w-3/4 pt-6 px-16">
                <!-- My Budget Plan -->
                <section>
                    <!-- Budget Plan Form -->
                    <div class="bg-white rounded-lg shadow-lg px-8 pt-3 pb-4 mb-8">
                        <h2 class="text-2xl font-semibold mb-2 text-gray-700">Budget Plan</h2>
                        <hr>
                        <form id="budget-form" class="grid grid-cols-1 md:grid-cols-2 gap-6 budget-form">
                            <div class="input-wrapper">
                                <label class="block text-sm font-medium text-gray-600">Amount</label>
                                <div class="relative">
                                    <span class="absolute text-[#757575] inset-y-0 left-0 flex items-center pl-3">₱ |</span>
                                    <input id="amount" name="amount" type="number"
                                        class="w-full pl-10 p-2 border border-[#757575] rounded-lg" placeholder="0.00">
                                </div>

                            </div>
                            <div class="input-wrapper">
                                <label class="block text-sm font-medium text-gray-600">Category</label>
                                <select id="category" name="category"
                                    class="block w-full rounded-lg border p-2 border-[#757575] shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700">
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
                            <div id="date-range-picker" date-rangepicker datepicker-buttons datepicker-autoselect-today
                                datepicker-format="yyyy-mm-dd">
                                <div class="input-wrapper">
                                    <label class="block text-sm font-medium text-gray-600">Start Date</label>
                                    <div class="relative flex items-center">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-range-start" name="start_date" type="text"
                                            placeholder="Select date start"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                </div>
                                <br>
                                <div class="input-wrapper">
                                    <label class="block text-sm font-medium text-gray-600">End Date</label>
                                    <div class="relative flex items-center">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg>
                                        </div>
                                        <input id="datepicker-range-end" name="end_date" type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date end">
                                    </div>
                                </div>

                            </div>
                            <div>
                                <div class="input-wrapper">
                                    <label class="block text-sm font-medium text-gray-600">Budget Type</label>
                                    <select id="type" name="type"
                                        class="border p-2 block w-full rounded-lg border-[#757575] shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700">
                                        <option value="" disabled selected>-- Select a Type --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-1 md:col-span-2 flex justify-center">
                                <button id="add-budget-btn"
                                    class="bg-[#2A3CDE] text-white py-3 px-16 rounded-lg hover:bg-blue-700 transition font-semibold">
                                    Add Budget
                                </button>
                            </div>
                        </form>
                    </div>

                    <div id="success-popup"
                        class="fixed hidden flex top-5 right-5 items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-md dark:text-gray-400 dark:bg-gray-800"
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

                    <!-- Budget Table -->
                    <div class="bg-white rounded-lg shadow-lg px-8 pt-8 h-80">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-700">Budget Overview</h2>

                        <!-- Header Table with fixed header -->
                        <table class="w-full border-collapse table-fixed">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="w-1/5 text-left py-3 px-4 text-sm font-semibold text-gray-700">Category</th>
                                    <th class="w-1/5 text-left py-3 px-4 text-sm font-semibold text-gray-700">Budget Type
                                    </th>
                                    <th class="w-1/5 text-left py-3 px-4 text-sm font-semibold text-gray-700">Amount</th>
                                    <th class="w-1/5 text-left py-3 px-4 text-sm font-semibold text-gray-700">Start Date
                                    </th>
                                    <th class="w-1/5 text-left py-3 px-4 text-sm font-semibold text-gray-700">End Date</th>
                                </tr>
                            </thead>
                        </table>

                        <!-- Scrollable Table Body -->
                        <div class="overflow-y-auto h-44"> <!-- Wrapper div with overflow-y-auto -->
                            <table class="w-full border-collapse table-fixed">
                                <tbody class="divide-y divide-gray-200 scrollable" id="scrollable">


                                    <!-- Additional rows as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>




                </section>
            </main>
        </div>
    </body>



@endsection

<script>
    loadUserBudgets();

    function loadUserBudgets() {
        fetch('/get-user-budgets', {
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
                console.log(data); // Inspect the response structure

                const scrollableContainer = document.querySelector('.scrollable');
                if (!scrollableContainer) {
                    console.error('Scrollable container not found');
                    return;
                }

                // Clear previous content
                scrollableContainer.innerHTML = '';

                // Check if budgets array exists and has items
                if (!data.budgets || !Array.isArray(data.budgets) || data.budgets.length === 0) {
                    scrollableContainer.innerHTML =
                        '<p class="text-center pt-5">No recent transactions available.</p>';
                    return;
                }

                // Iterate over budgets array and create rows
                data.budgets.forEach(budget => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                <td class="w-1/5 py-4 px-4 text-gray-700">${budget.category}</td>
                <td class="w-1/5 py-4 px-4 text-gray-700">${budget. type}</td>
                <td class="w-1/5 py-4 px-4 text-gray-700">₱ ${budget.amount}</td>
                <td class="w-1/5 py-4 px-4 text-gray-700">${budget.start_date}</td>
                <td class="w-1/5 py-4 px-4 text-gray-700">${budget.end_date}</td>
            `;
                    scrollableContainer.appendChild(row);
                });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    function addBudget() {
        const form = document.getElementById('budget-form');
        const formData = new FormData(form);

        // Clear previous errors
        document.querySelectorAll('.error-message').forEach(el => el.remove());

        fetch('/budgetadd', {
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
                    loadUserBudgets();

                    const successPopup = document.getElementById("success-popup");
                    successPopup.classList.remove("hidden");

                    setTimeout(() => {
                        successPopup.classList.add("hidden");
                    }, 10000); // Adjust the time (in milliseconds) as needed

                }
            })
            .catch(error => {
                console.error('Error adding expense:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('add-budget-btn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent form submission
            addBudget();
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
    function closeSuccessPopup() {
        const successPopup = document.getElementById('success-popup');
        successPopup.classList.add('hidden'); // Hide the popup
    }
</script>
