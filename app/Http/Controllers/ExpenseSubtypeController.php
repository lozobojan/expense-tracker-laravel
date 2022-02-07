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
        return view('expense_subtype.index', [
            "subtypes" => ExpenseSubtype::all()
        ]);
    }


    public function create()
    {
        $types = ExpenseType::all();
        return view('expense_subtype.create', [
            "types" => $types
            ]);

    }


    public function store(StoreExpenseSubtypeRequest $request)
    {

        ExpenseSubtype::query()->create([
            "name" => $request->name,
            "expense_type_id" => $request->expense_type_id
        ]);

        return redirect()->route("subtype.index");
    }


    public function show($id)
    {
        return view('expense_subtype.show', [
            "subtype" => ExpenseSubtype::query()->findOrFail($id)
        ]);
    }


    public function edit($id)
    {
        return view('expense_subtype.edit', [
            "subtype" => ExpenseSubtype::query()->findOrFail($id),
            "types" => ExpenseType::all()
        ]);
    }


    public function update(UpdateExpenseSubtypeRequest $request, $id)
    {
        $type = ExpenseSubtype::query()->findOrFail($id);
        $type->update($request->validated());
        return redirect()->route("subtype.index");
    }


    public function destroy($id)
    {
        ExpenseSubtype::query()->findOrFail($id)->delete();
        return redirect()->route('subtype.index');
    }
}
