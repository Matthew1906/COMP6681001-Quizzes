<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->belongsToMany(User::class, 'user_classes', 'class_id', 'user_id');
    }
}
