<?php

namespace App\Http\Controllers;

use App\Models\ExpenseSubtype;
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
        //
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseSubtype  $expenseSubtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseSubtype $expenseSubtype)
    {
        //
    }
}
