<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseSubtype extends Model
{
    use HasFactory;

    protected $fillable = ["expense_type_id", "name"];

    public function expenseType(){
        return $this->belongsTo(ExpenseType::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
