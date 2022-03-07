<?php

namespace App\Models;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    use HasFactory, Taggable;

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

    public function isLinkedToCurrentUser()
    {
        return $this->users()->where("users.id", auth()->id())->count() > 0;
    }
}
