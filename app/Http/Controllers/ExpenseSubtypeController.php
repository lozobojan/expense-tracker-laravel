<?php

namespace App\Http\Controllers;

use App\Models\ExpenseSubtype;
use App\Http\Requests\StoreExpenseSubtypeRequest;
use App\Http\Requests\UpdateExpenseSubtypeRequest;
use App\Models\ExpenseType;


class ExpenseSubtypeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $needed = ExpenseSubtype::query()->
            join("expense_types","expense_types.id","=","expense_subtypes.expense_type_id")->
            select("expense_subtypes.expense_type_id","expense_subtypes.name","expense_subtypes.id","expense_types.name as expense")->orderBy("expense_type_id")->
            get();
        return view('expensesubtype.index',[
            "expensesubtypes"=>$needed
        ]);

    }


    public function create()
    {
        $types=ExpenseType::query()->select("expense_types.name","expense_types.id")->get();
        return view("expensesubtype.create",["types"=>$types]);
    }


    public function store(StoreExpenseSubtypeRequest $request)
    {
        ExpenseSubtype::query()->create([
            "name"=>$request->name,"expense_type_id"=>$request->expense_type_id
        ]);
        return  redirect()->route("expensesubtype.index");
    }

    public function show(ExpenseSubtype $expensesubtype)
    {
        return view("expensesubtype.show",[
            "expensesubtype" => $expensesubtype,
        ]);
    }


    public function edit(ExpenseSubtype $expensesubtype)
    {
        return view("expensesubtype.edit", [
            "expensesubtype" => $expensesubtype,

        ]);
    }


    public function update(UpdateExpenseSubtypeRequest $request, ExpenseSubtype $expensesubtype)
    {
        $expensesubtype->update([
            "name"=>$request->name
        ]);
        return redirect()->route("expensesubtype.index");
    }


    public function destroy(ExpenseSubtype $expensesubtype)
    {
        $expensesubtype->delete();
        return redirect()->route("expensesubtype.index");
    }
}
