<?php

namespace App\Models;

use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, Taggable, SoftDeletes;
    protected $guarded = ["id"];
    protected $dates = ["created_at", "updated_at", "date"];
    const DATE_FORMAT = "d.m.Y";
    const API_PER_PAGE = 2;

    protected $with = ["type"];


    /** Globalni scope **/
//    protected static function booted()
//    {
//        static::addGlobalScope('forCurrentUser', function ($query) {
//            $query->where('user_id', '=', auth()->id());
//        });
//    }


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

    public function getAttachmentsCountAttribute()
    {
        return $this->attachments()->count();
    }

    /** scope method **/
    // ovo se poziva kao: Expense::query()->forCurrentUser()->get()
    public function scopeForCurrentUser($query){
        return $query->where('user_id', '=', auth()->id());
    }



}
