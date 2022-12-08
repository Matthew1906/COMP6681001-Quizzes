<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function class()
    {
        return $this->belongsTo(ClassGroup::class, 'class_id');
    }

    public function problems()
    {
        return $this->hasMany(QuizProblem::class);
    }

    public function histories()
    {
        return $this->hasMany(QuizHistory::class);
    }

}
