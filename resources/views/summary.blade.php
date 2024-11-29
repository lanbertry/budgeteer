@extends('include/layout')
@section('title', 'Budgeteer - Summary')
@section('content')

    <div class="flex h-screen poppin">
        <!-- Sidebar -->
        @include('include/sidebar')

        <!-- Main Content -->
        <main class="flex-1 bg-[#D9D9D9] px-14">
            {{--             <h1 class="text-2xl font-bold mt-14">Summary</h1> --}}

            <!-- Expense Tracking Chart Section -->
            <section class="pt-5">
                <div class="flex mb-6 mt-6">
                    <!-- Expense Tracking Chart -->
                    <div class="bg-[#EEEEEE] shadow-lg rounded-lg w-full py-5 px-6">
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-bold text-gray-900">Expense Tracking</h3>
                                <select id="dateFilter" class="text-gray-700 text-sm font-medium bg-gray-100 p-1 rounded-md">
                                    <option value="yesterday">Yesterday</option>
                                    <option value="today">Today</option>
                                    <option value="last7days" selected>Last 7 Days</option>
                                    <option value="30days">Last 30 Days</option>
                                    <option value="1year">Last 1 Year</option>
                                </select>
                            </div>

                            <div class="text-center mb-2 flex justify-center">
                                <div class="px-2">
                                    <i class="fa-solid fa-circle text-[#757575]"></i>
                                    <span class="text-base">Allowance</span>
                                </div>
                                <div class="px-2">
                                    <i class="fa-solid fa-circle text-[#0F0B35]"></i>
                                    <span class="text-base">Spending</span>
                                </div>
                                <div class="px-2">
                                    <i class="fa-solid fa-circle text-[#7B47C2]"></i>
                                    <span class="text-base">Budget</span>
                                </div>
                            </div>

                            <!-- Bar chart canvas -->
                            <div class="h-72">
                                <canvas id="expenseChart" class="bg-white rounded-lg w-full h-full"
                                    style="max-height: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Total Expenses Section -->
            <section class="mt-10">
                <h2 class="text-xl font-semibold mb-4">Total Expenses</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    <!-- Food Category -->

                    <!-- Card 1: Education -->

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-graduation-cap mr-1"></i> <span
                                    class="text-center text-1xl font-light">Education</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center educCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-gamepad mr-1"></i> <span
                                    class="text-center text-1xl font-light">Entertainment</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center entCard">
                            <p class="text-2xl font-bold ">₱0.00</p>
                        </div>
                    </div>


                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-utensils mr-1"></i> <span
                                    class="text-center text-1xl font-light">Foods</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center foodsCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-heartbeat mr-1 "></i> <span
                                    class="text-center text-1xl font-light">Health</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center healthCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-shopping-bag mr-1"></i> <span
                                    class="text-center text-1xl font-light">Shopping</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center shopCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-bus mr-1"></i> <span
                                    class="text-center text-1xl font-light">Transportation</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center transCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-bolt mr-1"></i> <span
                                    class="text-center text-1xl font-light">Utilities</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center utilCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-lg">
                        <div class="bg-[#2A3CDE] text-white rounded-t-lg p-2 text-center font-semibold">
                            <div>
                                <i class="fa-solid fa-ellipsis mr-1"></i> <span
                                    class="text-center text-1xl font-light">Miscellaneous</span>
                            </div>

                        </div>
                        <div class="mt-4 mb-4 justify-center text-center miscCard" id="miscCard">
                            <p class="text-2xl font-bold">₱0.00</p>
                        </div>
                    </div>



                </div>
            </section>
        </main>
    </div>


    <script>
        const categories = [{
                name: 'Miscellaneous',
                elementClass: 'miscCard'
            },
            {
                name: 'utilities',
                elementClass: 'utilCard'
            },
            {
                name: 'transportation',
                elementClass: 'transCard'
            },
            {
                name: 'shopping',
                elementClass: 'shopCard'
            },
            {
                name: 'health',
                elementClass: 'healthCard'
            },
            {
                name: 'food',
                elementClass: 'foodsCard'
            },
            {
                name: 'Entertainment',
                elementClass: 'entCard'
            },
            {
                name: 'Education',
                elementClass: 'educCard'
            }
        ];

        categories.forEach(category => fetchExpense(category.name, category.elementClass));

        function fetchExpense(category, elementClass) {
            fetch(`/get-user-expenses/${category}`, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        Accept: 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Handle response when valid category data is available
                    const expense = data[category];
                    if (expense) {
                        document.querySelector(`.${elementClass}`).innerHTML =
                            `<p class="text-2xl font-bold">₱${expense}</p>`;
                    } else {
                        document.querySelector(`.${elementClass}`).innerHTML =
                            `<p class="text-2xl font-bold text-gray-500">₱0.00</p>`;
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    document.querySelector(`.${elementClass}`).innerHTML =
                        `<p class="text-2xl font-bold text-red-500">Error</p>`;
                });
        }

        // Expense Tracking Chart setup
        const ctx = document.getElementById('expenseChart').getContext('2d');
        let expenseChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                datasets: [{
                        label: 'Allowance',
                        backgroundColor: '#757575',
                        data: []
                    },
                    {
                        label: 'Spending',
                        backgroundColor: '#0F0B35',
                        data: []
                    },
                    {
                        label: 'Budget',
                        backgroundColor: '#7B47C2',
                        data: []
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.dataset.label || '';
                                const value = context.raw || 0;
                                return `${label}: ₱${value.toLocaleString()}`;
                            }
                        }
                    },
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        },
                        ticks: {
                            display: true
                        }
                    }
                },
                // Enable resizing for initial load
                resizeDelay: 100
            }
        });



        // Update chart based on selected timeframe
        async function updateChartData(timeframe = 'last7days') {
            let endpoint = '/chart-data/last7days';

            // Update the endpoint based on the selected timeframe
            if (timeframe === 'yesterday') {
                endpoint = '/chart-data/yesterday';
            } else if (timeframe === 'today') {
                endpoint = '/chart-data/today';
            } else if (timeframe === '30days') {
                endpoint = '/chart-data/last30days';
            } else if (timeframe === '1year') {
                endpoint = '/chart-data/last1year';
            }

            try {
                const response = await fetch(endpoint);
                const data = await response.json();

                // Update chart with the data
                if (timeframe === 'last7days') {
                    expenseChart.data.datasets[0].data = data.income;
                    expenseChart.data.datasets[1].data = data.expenses;
                    expenseChart.data.datasets[2].data = data.budget;
                    expenseChart.data.labels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                } else if (timeframe === '30days') {
                    expenseChart.data.datasets[0].data = data.income;
                    expenseChart.data.datasets[1].data = data.expenses;
                    expenseChart.data.datasets[2].data = data.budget;
                    expenseChart.data.labels = Array.from({
                        length: 30
                    }, (_, i) => `Day ${i + 1}`);
                } else if (timeframe === '1year') {
                    expenseChart.data.datasets[0].data = data.income;
                    expenseChart.data.datasets[1].data = data.expenses;
                    expenseChart.data.datasets[2].data = data.budget;
                    expenseChart.data.labels = [
                        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                    ]; // Monthly labels for 1 year
                } else {
                    expenseChart.data.datasets[0].data = [data.income];
                    expenseChart.data.datasets[1].data = [data.expenses];
                    expenseChart.data.datasets[2].data = [data.budget];
                    expenseChart.data.labels = [timeframe.charAt(0).toUpperCase() + timeframe.slice(1)];
                }

                expenseChart.update();
            } catch (error) {
                console.error('Error fetching chart data:', error);
            }
        }


        document.getElementById('dateFilter').addEventListener('change', function() {
            const selectedOption = this.value;
            updateChartData(selectedOption);
        });

        expenseChart.resize();

        // Initial chart load
        updateChartData('last7days');
    </script>
@endsection
