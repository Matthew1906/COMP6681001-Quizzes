<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    function index(Request $req)
    {
        if(Auth::check()){
            $classes = ClassGroup::whereRelation('students', 'id', '=', Auth::id())->pluck('id');
            $quizzes = Quiz::where('status', '=', 1)->where('deadline', '>', Carbon::now())
                ->whereIn('class_id', $classes);
        }
        else{
            $quizzes = Quiz::where('status', '=', 1)->where('deadline', '>', Carbon::now());
        }
        if($req->has('search') && Str::of($req->query('search'))->trim()!=''){
            $search = Str::of($req->query('search'))->trim();
            $quizzes = $quizzes->where('name', 'like', "%".$search."%");
        }
        return view("pages.quizzes.index", ['quizzes' => $quizzes->paginate(2)]);
    }

    function create(){
        return view('pages.quizzes.create');
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
        return view("pages.quizzes.update", ['quiz'=>$quiz]);
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
