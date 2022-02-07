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
        $subtypes = ExpenseSubtype::query()->
        join("expense_types", "expense_types.id", "=", "expense_subtypes.expense_type_id")->
            select("expense_subtypes.id","expense_subtypes.name","expense_subtypes.expense_type_id","expense_types.name as expense")->
        orderBy("expense_type_id")->get();
        return view("expenseSubtype.index", [
            "expenseSubtypes" => $subtypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ExpenseType::query()->select("expense_types.id","expense_types.name")->get();
        return view("expenseSubtype.create", ["types"=>$types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseSubtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseSubtypeRequest $request)
    {
        if(!$request->expense_type_id){
            return redirect()->route("expenseType.create");
        };
        ExpenseSubtype::query()->create([
            "expense_type_id"=>$request->expense_type_id,
            "name"=>$request->name
        ]);
        return redirect()->route("expenseSubtype.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseSubtype $expenseSubtype)
    {
        return view("expenseSubtype.show", [
            "expenseSubtype" => $expenseSubtype
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseSubtype $expenseSubtype)
    {
        return view("expenseSubtype.edit", [
            "expenseSubtype" => $expenseSubtype
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
            "name"=>$request->name
        ]);
        return redirect()->route("expenseSubtype.index");
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
        return redirect()->route("expenseSubtype.index");
    }
}
