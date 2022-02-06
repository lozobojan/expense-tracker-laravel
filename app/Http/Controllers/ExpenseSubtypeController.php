<?php

namespace App\Http\Controllers;

use App\Models\ExpenseType;
use Illuminate\Support\Facades\DB;
use App\Models\ExpenseSubtype;
use Illuminate\Http\Request;

class ExpenseSubtypeController extends Controller
{
    public function index()
    {
        $expense_subtypes = ExpenseSubtype::latest()->paginate(5);

        return view('expense-subtypes.index',compact('expense_subtypes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        $expense_types = ExpenseType::query()->select('id')->pluck('id');
        return view('expense-subtypes.create', compact('expense_types'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'expense_type_id' => 'required',
        ]);

        ExpenseSubtype::create($request->all());

        return redirect()->route('expense-subtypes.index')
            ->with('success','Subtype created successfully.');
    }


    public function show(ExpenseSubtype $expense_subtype)
    {
        return view('expense-subtypes.show',compact('expense_subtype'));
    }


    public function edit(ExpenseSubtype $expense_subtype)
    {
        $expense_types = ExpenseType::query()->select('id')->pluck('id');
        return view('expense-subtypes.edit',compact('expense_types', 'expense_subtype'));
    }


    public function update(Request $request, ExpenseSubtype $expense_subtype)
    {
        $request->validate([
            'name' => 'required',
            'expense_type_id' => 'required',
        ]);

        $expense_subtype->update($request->all());

        return redirect()->route('expense-subtypes.index')
            ->with('success','Subtype updated successfully');
    }


    public function destroy(ExpenseSubtype $expense_subtype)
    {
        $expense_subtype->delete();

        return redirect()->route('expense-subtypes.index')
            ->with('success','Subtype deleted successfully');
    }
}
