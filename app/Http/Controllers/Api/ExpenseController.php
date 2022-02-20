<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        return auth()->user()->expenses()->paginate(Expense::API_PER_PAGE);
    }

    public function store(StoreExpenseRequest $request){
        $newExpense = auth()->user()->expenses()->create($request->validated());
        return response($newExpense->load(['type', 'user']), 201);
    }
}
