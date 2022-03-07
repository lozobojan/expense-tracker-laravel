<?php

namespace App\Http\Controllers;

use App\Mail\ExpenseReportMail;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function index()
    {
        return view("reports", [
            "types" => ExpenseType::all()
        ]);
    }

    public function generateReport(Request $request)
    {
        $data = Expense::query()
            ->join("expense_types", "expense_types.id", "=", "expenses.expense_type_id")
            ->where("user_id", '=', auth()->id())
            ->when($request->date_from, function($query) use ($request){
                $query->where("date", ">=", $request->date_from);
            })
            ->when($request->date_to, function($query) use ($request){
                $query->where("date", "<=", $request->date_to);
            })
            ->when($request->amount_from, function($query) use ($request){
                $query->where("amount", ">=", $request->amount_from);
            })
            ->when($request->amount_to, function($query) use ($request){
                $query->where("amount", "<=", $request->amount_to);
            })
            ->when($request->expense_type_id, function($query) use ($request){
                $query->where("expense_type_id", "=", $request->expense_type_id);
            })
            ->when($request->has("group_by_type"), function($query) use ($request){
                $query->groupBy("name")
                      ->selectRaw("name, sum(amount) as amount");
            }, function($query){
                $query->select(["amount", "date", "name"]);
            })
            ->get();
        Session::put('reportData', $data->toArray());
        return view("reports", [
            "data" => $data,
            "types" => ExpenseType::all(),
            "filters" => $request->except(["_token"])
        ]);
    }

    public function sendEmailReport(Request $request){
        $data = Session::get('reportData');
        Mail::to($request->email)->queue(new ExpenseReportMail($data));
        return redirect()->back()->with(['mailSent' => true]);
    }
}
