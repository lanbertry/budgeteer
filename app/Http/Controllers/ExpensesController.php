<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpensesController extends Controller
{
    public function getUserExpenses(Request $request)
    {
        // Log filter parameters to check if they are received as expected
        Log::info('Filter parameters:', $request->only(['date', 'type', 'amount']));

        $user_id = auth()->user()->id;
        $query = DB::table('expenses')->where('user_id', $user_id);

        // Apply date filter if provided
        if ($request->filled('date')) {
            $query->whereDate('date', '=', $request->input('date'));
        }

        // Apply type filter if provided
        if ($request->filled('category')) {
            $query->where('category', '=', $request->input('category'));
        }

        // Apply amount filter if provided
        if ($request->filled('amount')) {
            $query->where('amount', '=', $request->input('amount'));
        }

        $userExpenses = $query->get();

        return response()->json(['user' => $userExpenses]);
    }



    public function expensesAdd(Request $request)
    {

        Log::info('Request data: ', $request->all());

        $request->validate([
            'type' => 'required|min:3',
            'category' => 'required|in:Education,Entertainment,Food,Health,Miscellaneous,Shopping,Transportation,Utilities',
            'amount' => 'required|numeric|between:0,999999.999999',
            'date' => 'required|date_format:Y-m-d',
        ]);

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;
        $data['type'] = $request->type;
        $data['category'] = $request->category;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;

        $expenses = Expenses::create($data);

        return response()->json(['success' => 'Expenses added successfully']);
    }
}
