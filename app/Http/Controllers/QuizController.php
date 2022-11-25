<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class QuizController extends Controller
{

    function create(){
        return view('pages.make-quiz', ['signedIn'=>true]);
    }

    function store(Request $req){
        $req->validate([
            "name"=>"required|unique:quizzes|min:5|max:50",
            "description"=>'min:5|max:500',
            "deadline"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
        ]);
        $new_quiz = new Quiz;
        $new_quiz->name = $req->name;
        $new_quiz->description = $req->description;
        $new_quiz->deadline = $req->deadline;
        $new_quiz->repeat = Arr::exists($req, 'repeat')?1:0;
        $new_quiz->status = 0;
        $new_quiz->save();
        return redirect(route('edit-quiz', ['quiz_id'=>$new_quiz->id]));
    }

    function edit($quiz_id){
        $quiz = Quiz::find($quiz_id);
        return view("pages.edit-quiz", ['signedIn'=>true, 'quiz'=>$quiz]);
    }

    function update($quiz_id, Request $req){
        $req->validate([
            "name"=>"required|min:5|max:50",
            "description"=>'min:5|max:500',
            "deadline"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
        ]);
        $quiz = Quiz::find($quiz_id);
        $quiz->name = $req->name;
        $quiz->description = $req->description;
        $quiz->deadline = $req->deadline;
        $quiz->repeat = Arr::exists($req, 'repeat')?1:0;
        $quiz->save();
        return redirect(route('edit-quiz', ['quiz_id'=>$quiz->id]));
    }

    public function save($quiz_id){
        $quiz = Quiz::find($quiz_id);
        $quiz->status = 1;
        $quiz->save();
        return redirect(route('home'));
    }
}
