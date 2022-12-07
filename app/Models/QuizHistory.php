<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizHistory extends Model
{
    use HasFactory;

    public function participant()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(HistoryDetail::class, "history_id");
    }
}
