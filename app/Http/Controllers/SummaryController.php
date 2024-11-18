<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Expenses;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



class SummaryController extends Controller
{
    public function categoryExpenses($category)
    {
        $user_id = auth()->user()->id;

        $total = DB::table('expenses')
            ->where('user_id', $user_id)
            ->where('category', $category)
            ->sum('amount');

        return response()->json([$category => number_format($total, 2)]);
    }

    public function getTodayData(Request $request)
    {
        // Assuming the user is authenticated and we are using their ID
        $userId = auth()->user()->id;

        // Get today's date
        $today = Carbon::today();

        // Get the data for today
        $incomeToday = Income::where('user_id', $userId)
            ->whereDate('date', $today)
            ->sum('amount');

        $expensesToday = Expenses::where('user_id', $userId)
            ->whereDate('date', $today)
            ->sum('amount');

        $budgetToday = Budget::where('user_id', $userId)
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->sum('amount');

        // Return the data as a JSON response
        return response()->json([
            'income' => $incomeToday,
            'expenses' => $expensesToday,
            'budget' => $budgetToday
        ]);
    }

    public function getLast7DaysData(Request $request)
    {
        // Assuming the user is authenticated and we are using their ID
        $userId = auth()->user()->id;

        // Get today's date
        $today = Carbon::today();

        // Get the start of the week (Sunday)
        $startDate = $today->copy()->startOfWeek(); // Defaults to Sunday

        // Initialize arrays to hold the data for each day
        $incomeData = [];
        $expensesData = [];
        $budgetData = [];

        // Loop through each day of the last 7 days
        for ($i = 0; $i < 7; $i++) {
            $day = $startDate->copy()->addDays($i);

            // Get the income, expenses, and budget data for each day
            $incomeData[] = Income::where('user_id', $userId)
                ->whereDate('date', $day)
                ->sum('amount');

            $expensesData[] = Expenses::where('user_id', $userId)
                ->whereDate('date', $day)
                ->sum('amount');

            $budgetData[] = Budget::where('user_id', $userId)
                ->whereDate('start_date', '<=', $day)
                ->whereDate('end_date', '>=', $day)
                ->sum('amount');
        }

        // Return the data as a JSON response
        return response()->json([
            'income' => $incomeData,
            'expenses' => $expensesData,
            'budget' => $budgetData
        ]);
    }

    public function getYesterdayData(Request $request)
    {
        $userId = auth()->user()->id;

        // Calculate yesterday's date
        $yesterday = Carbon::yesterday();

        // Retrieve income, expenses, and budget data for yesterday
        $incomeYesterday = Income::where('user_id', $userId)
            ->whereDate('date', $yesterday)
            ->sum('amount');

        $expensesYesterday = Expenses::where('user_id', $userId)
            ->whereDate('date', $yesterday)
            ->sum('amount');

        $budgetYesterday = Budget::where('user_id', $userId)
            ->whereDate('start_date', '<=', $yesterday)
            ->whereDate('end_date', '>=', $yesterday)
            ->sum('amount');

        // Return the data as JSON
        return response()->json([
            'income' => $incomeYesterday,
            'expenses' => $expensesYesterday,
            'budget' => $budgetYesterday
        ]);
    }

    public function getLast30DaysData(Request $request)
    {
        $userId = auth()->user()->id;
        $endDate = Carbon::today();
        $startDate = $endDate->copy()->subDays(29);

        // Initialize arrays to hold data for each of the last 30 days
        $incomeData = [];
        $expensesData = [];
        $budgetData = [];

        // Loop through each of the last 30 days
        for ($i = 0; $i < 30; $i++) {
            $day = $startDate->copy()->addDays($i);

            $incomeData[] = Income::where('user_id', $userId)
                ->whereDate('date', $day)
                ->sum('amount');

            $expensesData[] = Expenses::where('user_id', $userId)
                ->whereDate('date', $day)
                ->sum('amount');

            $budgetData[] = Budget::where('user_id', $userId)
                ->whereDate('start_date', '<=', $day)
                ->whereDate('end_date', '>=', $day)
                ->sum('amount');
        }

        return response()->json([
            'income' => $incomeData,
            'expenses' => $expensesData,
            'budget' => $budgetData
        ]);
    }

    public function getLast1YearData(Request $request)
    {
        $userId = auth()->user()->id;
        $endDate = Carbon::today();
        $startDate = $endDate->copy()->subMonths(11)->startOfMonth(); // Start 11 months back to cover a full year

        $incomeData = [];
        $expensesData = [];
        $budgetData = [];

        // Loop through each month of the last year
        for ($i = 0; $i <= 11; $i++) {
            $month = $startDate->copy()->addMonths($i);

            // Get income, expenses, and budget data for the current month
            $incomeData[] = Income::where('user_id', $userId)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->sum('amount');

            $expensesData[] = Expenses::where('user_id', $userId)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->sum('amount');

            $budgetData[] = Budget::where('user_id', $userId)
                ->whereDate('start_date', '<=', $month->endOfMonth())
                ->whereDate('end_date', '>=', $month->startOfMonth())
                ->sum('amount');
        }

        // Return the data as JSON
        return response()->json([
            'income' => $incomeData,
            'expenses' => $expensesData,
            'budget' => $budgetData
        ]);
    }


}



