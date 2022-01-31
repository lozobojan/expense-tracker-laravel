<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(ExpenseType::class);
    }

    public function subtype(){
        return $this->belongsTo(ExpenseSubtype::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }
}
