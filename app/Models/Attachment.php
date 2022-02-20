<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ["description", "expense_id", "file_path"];
    protected $appends = ["download_file_path"];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function getDownloadFilePathAttribute()
    {
        return Storage::url($this->file_path);
    }
}
