<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IncomeController extends Controller
{

    // In IncomeController.php
    public function getAllIncomes(Request $request)
    {
        // Assuming you have a method to fetch all user incomes
        $incomes = Income::where('user_id', auth()->id())->get(); // Modify according to your database structure

        return response()->json(['incomes' => $incomes]);
    }

    public function getUserIncomes()
    {
        $user_id = auth()->user()->id;
        $incomes = DB::table('income')
            ->where('user_id', $user_id)
            ->get();

        return response()->json(['user' => $incomes]);
    }

    public function incomeAdd(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|numeric|between:0,999999.999999',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;
        $data['type'] = $request->type;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;

        $income = Income::create($data);

        return response()->json(['success' => 'Income added successfully']);
    }

    public function dailyAllowance()
    {
        $user_id = auth()->user()->id;
        $todaysDate = Carbon::now()->toDateString();

        $todaysAllowance = DB::table('income')
            ->where('user_id', $user_id)
            ->whereDate('date', $todaysDate)
            ->sum('amount');

        return response()->json(['todaysAllowance' => $todaysAllowance]);
    }

    public function dailySpending()
    {
        $user_id = auth()->user()->id;
        $todaysDate = Carbon::now()->toDateString();

        $todaysSpending = DB::table('expenses')
            ->where('user_id', $user_id)
            ->whereDate('date', $todaysDate)
            ->sum('amount');

        return response()->json(['todaysSpending' => $todaysSpending]);
    }

    public function dailySaving()
    {
        $user_id = auth()->user()->id;
        $todaysDate = Carbon::now()->toDateString();

        $todaysSpending = DB::table('expenses')
            ->where('user_id', $user_id)
            ->whereDate('date', $todaysDate)
            ->sum('amount');

        $todaysAllowance = DB::table('income')
            ->where('user_id', $user_id)
            ->whereDate('date', $todaysDate)
            ->sum('amount');

        $todaysSaving = $todaysAllowance - $todaysSpending;
        $formattedSaving = number_format($todaysSaving, 2);

        return response()->json(['todaysSaving' => $formattedSaving]);
    }

    public function weeklyAllowance()
    {
        $user_id = auth()->user()->id;

        $weeklyAllowance = DB::table('income')
            ->where('user_id', $user_id)
            ->whereBetween('date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->sum('amount');

        return response()->json(['weeklyAllowance' => $weeklyAllowance]);
    }

    public function weeklySpending()
    {
        $user_id = auth()->user()->id;

        $weeklySpending = DB::table('expenses')
            ->where('user_id', $user_id)
            ->whereBetween('date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->sum('amount');

        return response()->json(['weeklySpending' => $weeklySpending]);
    }

    public function weeklySaving()
    {
        $user_id = auth()->user()->id;

        $weeklyAllowance = DB::table('income')
            ->where('user_id', $user_id)
            ->whereBetween('date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->sum('amount');


        $weeklySpending = DB::table('expenses')
            ->where('user_id', $user_id)
            ->whereBetween('date', [
                now()->startOfWeek(),
                now()->endOfWeek(),
            ])
            ->sum('amount');

        $weeklySaving = $weeklyAllowance - $weeklySpending;
        $formattedSaving = number_format($weeklySaving, 2);

        return response()->json(['weeklySaving' => $formattedSaving]);
    }

}
