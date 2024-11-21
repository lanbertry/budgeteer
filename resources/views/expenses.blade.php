@extends('include/layout') @section('title', 'Budgeteer') @section('content')
@vite(['resources/js/expenses.js'])

<body class="bg-[#D9D9D9] poppin">
    <div class="flex min-h-screen">
        @include('include/sidebar')
        <main class="w-3/4 pt-2 px-16">

            {{--             <div id="success-popup" class="fixed inset-0 flex items-center justify-end   ">
                <div class="bg-white rounded-lg p-6 text-center shadow-lg max-w-xs">
                    <p class="text-green-500 font-semibold mb-4">
                        Expense added successfully!
                    </p>
                    <button onclick="closeSuccessPopup()"
                        class="bg-[#2A3CDE] text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        OK
                    </button>
                </div>
            </div> --}}

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
                    data-dismiss-target="#success-popup" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>


            <!-- My Expenses -->
            <form id="expenses-form" autocomplete="off" class="expenses-form">
                <h2 class="text-xl font-bold mb-6">My Expenses</h2>
                <div class="bg-white rounded-lg p-4">
                    <!-- Header Row -->
                    <div class="grid grid-cols-4 bg-[#2A3CDE] text-white font-semibold text-center rounded-t-lg">
                        <div class="py-2 border-r border-[#E0E0E0]">
                            Category
                        </div>
                        <div class="py-2 border-r border-[#E0E0E0]">Type</div>
                        <div class="py-2 border-r border-[#E0E0E0]">Amount</div>
                        <div class="py-2 border-[#E0E0E0]">Date</div>
                    </div>
                    <div class="grid grid-cols-4 gap-6 p-4 rounded-b-lg">
                        <div class="input-wrapper">
                            <select id="category" name="category" class="border border-[#757575] rounded-md p-2">
                                <option value="" disabled selected>
                                    --Select Category--
                                </option>
                                <option value="Education">Education</option>
                                <option value="Entertainment">
                                    Entertainment
                                </option>
                                <option value="Food">Food</option>
                                <option value="Health">Health</option>
                                <option value="Miscellaneous">
                                    Miscellaneous
                                </option>
                                <option value="Shopping">Shopping</option>
                                <option value="Transportation">
                                    Transportation
                                </option>
                                <option value="Utilities">Utilities</option>
                            </select>
                        </div>
                        <div class="input-wrapper">
                            <select id="type" name="type" class="border border-[#757575] rounded-md p-2">
                                <option value="" disabled selected>
                                    -- Select a Type --
                                </option>
                            </select>
                        </div>
                        <div class="input-wrapper relative">
                            <span class="absolute text-[#757575] inset-y-0 left-0 flex items-center pl-3">₱ |</span>
                            <input id="amount" name="amount" type="number"
                                class="w-full pl-10 p-2 border border-[#757575] rounded-lg" placeholder="0.00" />
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
                                placeholder="Select date" />
                        </div>
                    </div>
                </div>
                <button id="add-expense-btn"
                    class="bg-[#2A3CDE] ml-2 text-white mt-4 px-10 py-1 rounded-md hover:bg-blue-700 font-bold">
                    Add
                </button>
            </form>

            <!-- Recent Transactions -->
            <section class="mt-2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">Recent Transactions</h2>
                    {{-- <a href="#" class="text-[#2A3CDE]">View all</a> --}}
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
                            placeholder="Select date" />
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
                        class="border border-gray-300 rounded-lg px-4 py-2" />

                    <!-- Filter Button -->
                    <button id="apply-filters-btn"
                        class="bg-[#2A3CDE] text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Apply Filters
                    </button>
                </div>

                <div id="transactions-container" class="space-y-3 overflow-y-auto e-rs-h rounded-xl scrollable">
                    <div role="status" id="loading-indicator" class="text-center py-4 hidden">
                        Loading more transactions...
                    </div>
                </div>

            </section>
        </main>
    </div>
</body>
@endsection

<!-- Add your CSS for error messages -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const categoryIcons = {
            education: "fa-solid fa-book",
            entertainment: "fa-solid fa-film",
            food: "fa-solid fa-utensils",
            health: "fa-solid fa-heartbeat",
            miscellaneous: "fa-solid fa-star",
            shopping: "fa-solid fa-shopping-cart",
            transportation: "fa-solid fa-bus",
            utilities: "fa-solid fa-lightbulb",
        };



        const container = document.getElementById("transactions-container");
        const loadingIndicator = document.getElementById("loading-indicator");
        const filterDateInput = document.getElementById("filter-date");
        const filterCategoryInput = document.getElementById("filter-category");
        const filterAmountInput = document.getElementById("filter-amount");

        let currentPage = 1;
        const limit = 10;
        let loading = false;

        function loadUserExpenses() {
            if (loading) return;

            const filterDate = filterDateInput.value || "";
            const filterCategory = filterCategoryInput.value || "";
            const filterAmount = filterAmountInput.value || "";

            loading = true;
            loadingIndicator.classList.remove("hidden");

            fetch(
                    `/get-user-expenses?page=${currentPage}&limit=${limit}&date=${filterDate}&category=${filterCategory}&amount=${filterAmount}`
                )
                .then((response) => response.json())
                .then((data) => {
                    console.log("Expenses Loaded:", data); // Debugging log

                    if (!data.user || data.user.length === 0) {
                        if (currentPage === 1) {
                            container.innerHTML = "<p class='text-center'>No transactions found.</p>";
                        }
                        container.removeEventListener("scroll", handleScroll);
                        loading = false;
                        loadingIndicator.classList.add("hidden");
                        return;
                    }

                    data.user.forEach((expense) => {
                        const div = document.createElement("div");
                        div.className =
                            "flex items-center justify-between p-4 bg-gray-100 rounded-lg";

                        const normalizedCategory = expense.category?.trim().toLowerCase() ||
                            "miscellaneous";
                        const iconClass = categoryIcons[normalizedCategory] ||
                            "fa-solid fa-ellipsis";

                        div.innerHTML = `
        <div class="flex items-center space-x-4">
            <div class="rounded-full bg-[#2A3CDE] h-10 w-10 flex justify-center items-center">
                <i class="${iconClass} text-xl text-white"></i>
            </div>
            <div>
                <p class="font-semibold">${expense.category || "Miscellaneous"}</p>
                <p class="text-sm text-gray-500">${expense.type || "N/A"}</p>
            </div>
        </div>
        <div class="text-right">
            <p class="text-red-600 font-semibold">- ${expense.amount || "0.00"}</p>
            <p class="text-sm text-gray-500">${expense.date || "Unknown"}</p>
        </div>`;
                        container.appendChild(div);
                    });


                    currentPage++;
                    loading = false;
                    loadingIndicator.classList.add("hidden");
                })
                .catch((err) => {
                    console.error("Error loading expenses:", err);
                    loading = false;
                    loadingIndicator.classList.add("hidden");
                });
        }

        function handleScroll() {
            if (
                container.scrollTop + container.clientHeight >=
                container.scrollHeight - 50
            ) {
                loadUserExpenses();
            }
        }

        // Apply filters
        document.getElementById("apply-filters-btn").addEventListener("click", function(event) {
            event.preventDefault();
            currentPage = 1;
            container.innerHTML = "";
            loadUserExpenses();
        });

        // Add expense
        document.getElementById("add-expense-btn").addEventListener("click", function(event) {
            event.preventDefault();
            addExpenses();
        });

        function addExpenses() {
    const form = document.getElementById("expenses-form");
    const formData = new FormData(form);

    document.querySelectorAll(".error-message").forEach((el) => el.remove());

    fetch("/expensesadd", {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            Accept: "application/json",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.errors) {
                console.error("Validation Errors:", data.errors);
                Object.keys(data.errors).forEach((field) => {
                    const inputWrapper = document
                        .querySelector(`[name="${field}"]`)
                        .closest(".input-wrapper");
                    if (inputWrapper) {
                        const errorMessage = document.createElement("p");
                        errorMessage.classList.add("error-message");
                        errorMessage.innerText = data.errors[field][0];
                        inputWrapper.appendChild(errorMessage);
                    }
                });
            } else {
                console.log("Expense added successfully");

                // Show success pop-up
                const successPopup = document.getElementById("success-popup");
                successPopup.classList.remove("hidden");

                // Hide the success pop-up after a delay
                setTimeout(() => {
                    successPopup.classList.add("hidden");
                }, 10000); // Adjust the time (in milliseconds) as needed

                form.reset();
                currentPage = 1;
                container.innerHTML = "";

                loadUserExpenses();
            }
        })
        .catch((error) => {
            console.error("Error adding expense:", error);
        });
}


        container.addEventListener("scroll", handleScroll);
        loadUserExpenses();
    });

</script>
