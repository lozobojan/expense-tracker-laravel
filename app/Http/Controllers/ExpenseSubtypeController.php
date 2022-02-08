<?php

namespace App\Http\Controllers;

use App\Models\ExpenseSubtype;
use App\Http\Requests\StoreExpenseSubtypeRequest;
use App\Http\Requests\UpdateExpenseSubtypeRequest;
use App\Models\ExpenseType;

class ExpenseSubtypeController extends Controller
{
    public function index()
    {
        return view("expense_subtype.index", [
            "expense_subtypes" => ExpenseSubtype::all()
        ]);
    }

    public function create()
    {
        return view("expense_subtype.create", [
            "expense_types" => ExpenseType::all()
        ]);
    }

    public function store(StoreExpenseSubtypeRequest $request)
    {
        ExpenseSubtype::query()->create($request->validated());
        return redirect()->route("expense_subtype.index");
    }

    public function show(ExpenseSubtype $expenseSubtype)
    {
        return view("expense_subtype.show", [
            "expense_subtype" => $expenseSubtype
        ]);
    }

    public function edit(ExpenseSubtype $expenseSubtype)
    {
        return view("expense_subtype.edit", [
            "expense_subtype" => $expenseSubtype,
            "expense_types" => ExpenseType::all(),
            "belonging_expense_type" => $expenseSubtype->expenseType()
        ]);
    }

    public function update(UpdateExpenseSubtypeRequest $request, ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->update($request->validated());
        return redirect()->route("expense_subtype.index");
    }

    public function destroy(ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->delete();
        return redirect()->route("expense_subtype.index");
    }
}
