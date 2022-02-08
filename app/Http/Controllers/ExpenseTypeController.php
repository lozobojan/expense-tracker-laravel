<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function index()
    {
        return view("expense_type.index", [
            "expense_types" => ExpenseType::all()
        ]);
    }

    public function create()
    {
        return view("expense_type.create");
    }

    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create($request->validated());
        return redirect()->route("expense_type.index");
    }

    public function show(ExpenseType $expenseType)
    {
        return view("expense_type.show", [
            "expense_type" => $expenseType
        ]);
    }

    public function edit(ExpenseType $expenseType)
    {
        return view("expense_type.edit", [
            "expense_type" => $expenseType
        ]);
    }

    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->validated());
        return redirect()->route("expense_type.index");
    }

    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();
        return redirect()->route("expense_type.index");
    }



    public function addRemoveType(Request $request){
        $type = ExpenseType::query()->findOrFail($request->type_id);

        if($type->isLinkedToCurrentUser()){
            auth()->user()->expenseTypes()->detach($request->type_id);
        }else{
            auth()->user()->expenseTypes()->attach($request->type_id);
        }

        return response("OK", 200);
    }

    public function getTypesForUser()
    {
        return auth()->user()->expenseTypes;
    }

    public function getSubtypes(ExpenseType $expenseType)
    {
        return $expenseType->subtypes;
    }
}
