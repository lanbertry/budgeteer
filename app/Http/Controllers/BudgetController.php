<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BudgetController extends Controller
{
    public function getUserBudgets()
    {
        $user_id = auth()->user()->id;
        $budgets = DB::table('budget')
            ->where('user_id', $user_id)
            ->get();

        return response()->json(['budgets' => $budgets]);

    }

    public function budgetAdd(Request $request)
    {
        Log::info('Request data received for budget addition:', $request->all());

        $request->validate([
            'amount' => 'required|numeric|between:0,999999.999999',
            'type' => 'required|string|min:3',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
        ]);

        $user_id = auth()->user()->id;

        // Check for overlapping budget entries within the same category and type
        $exists = Budget::where('user_id', $user_id)
            ->where('category', $request->category)
            ->where('type', $request->type)
            ->where('start_date', '<=', $request->end_date)
            ->where('end_date', '>=', $request->start_date)
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'A budget entry already exists for this category and type within the specified date range.'], 422);
        }

        $data = [
            'user_id' => $user_id,
            'type' => $request->type,
            'category' => $request->category,
            'amount' => $request->amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        Log::info('Creating new budget entry with data:', $data);

        try {
            $budget = Budget::create($data);
            return response()->json(['success' => 'Budget added successfully']);
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Database error while adding budget:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'A database error occurred. Please try again later.'], 500);
        } catch (\Exception $e) {
            Log::error('General error while adding budget:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

}


