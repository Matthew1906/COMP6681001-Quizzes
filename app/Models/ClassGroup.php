<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'user_classes', 'class_id', 'user_id')->where("users.role_id", "=", "1");
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'user_classes', 'class_id', 'user_id')->where("users.role_id", "=", "2");
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'class_id');
    }
}
