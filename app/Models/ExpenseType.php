<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory;

    protected $fillable = ["id", "name", "color"];

    public function users(){
        return $this->belongsToMany(User::class, "expense_type_user");
    }

    public function subtypes(){
        return $this->hasMany(ExpenseSubtype::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
