<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseSubtype;
use App\Models\ExpenseType;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use Illuminate\Http\Response;

class ExpenseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('expensetype.index', [
            "expensetypes"=>ExpenseType::all()
        ]);
    }

    public function create()
    {

        return view("expensetype.create");
    }


    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create([
            "name"=>$request->name,"color"=>$request->color
        ]);
       return  redirect()->route("expensetype.index");
    }


    public function show(ExpenseType $expensetype)
    {

        $array = ExpenseSubtype::query()->
            join("expense_types","expense_types.id","=","expense_subtypes.expense_type_id")->
            where("expense_types.id","=",$expensetype->id)->
            select("expense_subtypes.name")->get();

        return view("expensetype.show",[
            "expensetype" => $expensetype,
            "array"=>$array
        ]);
    }



    public function edit(ExpenseType $expensetype)
    {
        return view("expensetype.edit", [
            "expensetype" => $expensetype,
        ]);
    }


    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expensetype)
    {
        $expensetype->update([
            "name"=>$request->name,"color"=>$request->color
        ]);
        return redirect()->route("expensetype.index");
    }


    public function destroy(ExpenseType $expensetype)
    {

        $expensetype->delete();
        return redirect()->route("expensetype.index");
    }
}
