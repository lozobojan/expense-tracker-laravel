<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Http\Request;

class ExpenseTypeController extends Controller
{

    public function index()
    {
        $expense_types = ExpenseType::latest()->paginate(5);

        return view('expense-types.index',compact('expense_types'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('expense-types.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        ExpenseType::create($request->all());

        return redirect()->route('expense-types.index')
            ->with('success','Type created successfully.');
    }


    public function show(ExpenseType $expense_type)
    {
        return view('expense-types.show',compact('expense_type'));
    }


    public function edit(ExpenseType $expense_type)
    {
        return view('expense-types.edit',compact('expense_type'));
    }


    public function update(Request $request, ExpenseType $expense_type)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        $expense_type->update($request->all());

        return redirect()->route('expense-types.index')
            ->with('success','Type updated successfully');
    }


    public function destroy(ExpenseType $expense_type)
    {
        $expense_type->delete();

        return redirect()->route('expense-types.index')
            ->with('success','Type deleted successfully');
    }
}
