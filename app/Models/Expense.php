<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $dates = ["created_at", "updated_at", "date"];
    const DATE_FORMAT = "d.m.Y";

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(ExpenseType::class, "expense_type_id");
    }

    public function subtype(){
        return $this->belongsTo(ExpenseSubtype::class, "expense_subtype_id");
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function getDateFormattedAttribute()
    {
        return $this->date->format(self::DATE_FORMAT);
    }
}
