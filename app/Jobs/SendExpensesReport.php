<?php

namespace App\Jobs;

use App\Mail\ExpenseReportMail;
use App\Models\Expense;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendExpensesReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    /**
     * @param $users
     */
    public function __construct()
    {
        $this->users = User::all();
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->users as $user) {
            Mail::to($user->email)
                ->queue(new ExpenseReportMail($this->generateData($user)));
        }
    }

    public function generateData($user)
    {
        return Expense::query()
            ->join("expense_types", "expense_types.id", "=", "expenses.expense_type_id")
            ->where("user_id", '=', $user->id)
            ->select(["amount", "date", "name"])
            ->get();
    }
}
