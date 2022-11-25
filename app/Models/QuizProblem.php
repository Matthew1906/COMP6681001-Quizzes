<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizProblem extends Model
{
    use HasFactory;

    public function problem()
    {
        return $this->morphTo();
    }
}
