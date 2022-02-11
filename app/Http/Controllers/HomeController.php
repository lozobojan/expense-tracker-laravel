<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home', [
            "expense_types" => ExpenseType::all(),
            "expenses" => $request->limit == -1 ?
                                            Expense::all() :
                                            Expense::query()->take($request->limit)->get(),
            "lengths" => ["5" => 5,"10" => 10,"15" => 15,"20" => 20, "Sve" => -1]
        ]);
    }

    public function getChartData(Request  $request)
    {
        $labels = $totals = $colors = [];
        $total = 0;

        $data = Expense::query()
            ->join("expense_types", "expense_types.id", "=", "expenses.expense_type_id")
            ->where("user_id", '=', auth()->id())
            ->select(["expense_types.name", "expense_types.color"])
            ->selectRaw("sum(expenses.amount) as total")
            ->groupBy(["expense_types.name", "expense_types.color"])
            ->orderByDesc("total")
            ->get();

        foreach ($data as $item) {
            $labels[] = $item->name;
            $totals[] = $item->total;
            $colors[] = $item->color;
            $total += $item->total;
        }

        $res_arr = [
            "labels" => $labels,
            "data" => $totals,
            "colors" => $colors,
            "total" => number_format($total,2),
        ];

        return response($res_arr, 200);
    }
}
