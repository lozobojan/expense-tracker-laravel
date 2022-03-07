<?php

namespace App\Http\Controllers\Api;

use App\Events\ExpenseAdded;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use App\Notifications\ExpenseAddedNotification;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        return ExpenseResource::collection(auth()->user()->expenses()->paginate(Expense::API_PER_PAGE));
    }

    public function store(StoreExpenseRequest $request){
        $newExpense = auth()->user()->expenses()->create($request->validated());
        // auth()->user()->notify(new ExpenseAddedNotification($newExpense));
        ExpenseAdded::dispatch($newExpense);
        return response($newExpense->load(['type', 'user']), 201);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->validated());
        return response($expense, 200);
    }

    public function show(Expense $expense)
    {
        return new ExpenseResource($expense);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response(null, 200);
    }
}
