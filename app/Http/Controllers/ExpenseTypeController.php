<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseTypes = ExpenseType::all();

        return view('expense-type.index', ['expense_types' => $expenseTypes]);
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
     * @param  \App\Http\Requests\StoreExpenseTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseTypeRequest $request)
    {
        $expenseType = ExpenseType::create([
            'name' => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('expense-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        return view('expense-type.update', ['expense_type' => $expenseType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseTypeRequest  $request
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update([
            'name' => $request->name,
            'color' => $request->color
        ]);

        return redirect()->route('expense-type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expenseType)
    {
        $expenseType->delete();

        return redirect()->route('expense-type.index');
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
