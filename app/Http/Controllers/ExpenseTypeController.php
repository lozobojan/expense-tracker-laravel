<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use App\Models\ExpenseSubtype;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use Illuminate\Http\Response;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("expenseType.index", [
            "expenseType" => ExpenseType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("expenseType.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create([
            "name"=>$request->name,
            "color"=>$request->color
        ]);
        return redirect()->route("expenseType.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expenseType)
    {
        $subtypes = ExpenseSubtype::query()->
        join("expense_types","expense_types.id","=","expense_subtypes.expense_type_id")->
        where("expense_types.id","=",$expenseType->id)->
        select("expense_subtypes.name")->get();

        return view("expenseType.show", [
            "expenseType" => $expenseType,
            "subtypes" => $subtypes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        return view("expenseType.edit", [
            "expenseType" => $expenseType
        ]);
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
            "name"=>$request->name,
            "color"=>$request->color
        ]);
        return redirect()->route("expenseType.index");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expenseType)
    {
        ExpenseSubtype::query()->where("expense_type_id", $expenseType->id)->delete();
        $expenseType->delete();
        return redirect()->route("expenseType.index");
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
