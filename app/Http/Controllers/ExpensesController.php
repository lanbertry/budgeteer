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
        $user_id = auth()->user()->id;
        $limit = $request->input('limit', 10);
        $page = $request->input('page', 1);

        $query = Expenses::where('user_id', $user_id);

        if ($request->filled('date')) {
            $query->whereDate('date', $request->input('date'));
        }

        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        if ($request->filled('amount')) {
            $query->where('amount', $request->input('amount'));
        }

        $userExpenses = $query->paginate($limit, ['*'], 'page', $page);

        return response()->json([
            'user' => $userExpenses->items(),
            'pagination' => [
                'current_page' => $userExpenses->currentPage(),
                'total_pages' => $userExpenses->lastPage(),
            ],
        ]);

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
