<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCProblem extends Model
{
    use HasFactory;

    public function problem()
    {
        return $this->morphOne(QuizProblem::class, 'problem');
    }
}
