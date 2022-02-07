<?php

namespace App\Http\Controllers;

use App\Models\ExpenseSubtype;
use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseSubtypeRequest;
use App\Http\Requests\UpdateExpenseSubtypeRequest;

class ExpenseSubtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseSubtypes = ExpenseSubtype::all();
        $expenseTypes = ExpenseType::all();

        return view('expense-subtype.index', [
            'expense_subtypes' => $expenseSubtypes,
            'expense_types' => $expenseTypes
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseSubtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseSubtypeRequest $request)
    {
        $expenseSubtype = ExpenseSubtype::create([
            'name' => $request->name,
            'expense_type_id' => $request->expense_type_id
        ]);

        return redirect()->route('expense-subtype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseSubtype $expenseSubtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseSubtype $expenseSubtype)
    {
        $expenseTypes = ExpenseType::all();

        return view('expense-subtype.update', [
            'expense_subtype' => $expenseSubtype,
            'expense_types' => $expenseTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseSubtypeRequest  $request
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseSubtypeRequest $request, ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->update([
            'name' => $request->name,
            'expense_type_id' => $request->expense_type_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseSubtype $expenseSubtype)
    {
        $expenseSubtype->delete();

        return redirect()->route('expense-subtype.index');
    }
}
