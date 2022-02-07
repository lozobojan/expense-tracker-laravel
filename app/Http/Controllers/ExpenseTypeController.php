<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;

class ExpenseTypeController extends Controller
{

    public function index()
    {
        return view('expense_type.index', [
            "types" => ExpenseType::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense_type.create');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create(["name" => $request->name, "color" => $request->color]);
        return redirect()->route("type.index");
    }

    /**
     * Display the specified resource.

     */
    public function show($id)
    {

        return view('expense_type.show', [
            "type" => ExpenseType::query()->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.

     */
    public function edit($id)
    {
        return view('expense_type.edit', [
            "type" => ExpenseType::query()->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.

     */
    public function update(UpdateExpenseTypeRequest $request, $id)
    {
        $type = ExpenseType::query()->findOrFail($id);
        $type->update([
            "name" => $request->name,
            "color" => $request->color
        ]);
        return redirect()->route("type.index");
    }

    /**
     * Remove the specified resource from storage.

     */
    public function destroy($id)
    {
        ExpenseType::query()->findOrFail($id)->delete();
        return redirect()->route('type.index');
    }
}
