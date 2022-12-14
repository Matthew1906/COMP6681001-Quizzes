<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QuizHistory extends Model
{
    use HasFactory;

    public function participant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function details()
    {
        return $this->hasMany(HistoryDetail::class, "history_id");
    }

    public function score()
    {
        if($this->details->count()==$this->quiz->problems->count()){
            $points = 0.0;
            foreach($this->details as $index=>$detail){
                if(Str::lower($detail->answer) == Str::lower($this->quiz->problems[$index]->problem->answer)){
                    $points++;
                }
            }
            return round($points*10/$this->quiz->problems->count(), 2);
        }
        return 0;
    }

}
