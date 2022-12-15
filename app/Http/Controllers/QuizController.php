<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use App\Models\Quiz;
use App\Models\QuizHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    function dashboard()
    {
        $classes = ClassGroup::whereRelation(Auth::user()->role->name."s", 'id', '=', Auth::id())->pluck('id');
        $histories = QuizHistory::where('user_id', '=', Auth::id())->where('status', '!=', 1)->pluck('quiz_id');
        if(Auth::user()->role->name == 'student'){
            $average_score = QuizHistory::where('user_id', '=', Auth::id())->get()
                ->map(function($history){
                    return $history->score();
                }
            )->average();
            $closest_start = Quiz::where('status', '=', 1)->where('start_date', '>', Carbon::now())->orderBy('start_date')->first();
            $closest_deadline = Quiz::where('status', '=', 1)->where('start_date', '<=', Carbon::now())->where('deadline', '>', Carbon::now())
                ->whereIn('class_id', $classes)->whereNotIn('id', $histories)->orderBy('deadline')->first();
            return view('pages.home', ['average_score'=>$average_score?$average_score:0, 'closest_start'=>$closest_start, 'closest_deadline'=>$closest_deadline]);
        }
        else{
            $quizzes = Quiz::where('status', '=', 1)->where('start_date', '<=', Carbon::now())
                ->where('deadline', '>', Carbon::now())->whereIn('class_id', $classes)->get();
            return view('pages.home', ['quizzes'=>$quizzes]);
        }
    }

    function index(Request $req)
    {
        if(Auth::check()){
            $classes = ClassGroup::whereRelation(Auth::user()->role->name."s", 'id', '=', Auth::id())->pluck('id');
            $quizzes = Quiz::where('status', '=', 1)->where('start_date', '<=', Carbon::now())
                ->where('deadline', '>', Carbon::now())->whereIn('class_id', $classes);
        }
        else{
            $quizzes = Quiz::where('status', '=', 1)->where('start_date', '<=', Carbon::now())
                ->where('deadline', '>', Carbon::now());
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
            "start_date"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
            "deadline"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
        ]);
        $new_quiz = new Quiz;
        $new_quiz->class_id = $req->class;
        $new_quiz->name = $req->name;
        $new_quiz->description = $req->description;
        $new_quiz->start_date = $req->start_date;
        $new_quiz->deadline = $req->deadline;
        $new_quiz->repeat = Arr::exists($req, 'repeat')?1:0;
        $new_quiz->status = 0;
        $new_quiz->save();
        return redirect(route('quizzes.edit', ['quiz_id'=>$new_quiz->id]));
    }

    function edit($quiz_id){
        $quiz = Quiz::find($quiz_id);
        return view("pages.quizzes.update", ['quiz'=>$quiz]);
    }

    function update($quiz_id, Request $req){
        $req->validate([
            "name"=>"required|min:5|max:50",
            "description"=>'min:5|max:500',
            "start_date"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
            "deadline"=>'required|date|after_or_equal:'.Carbon::now()->format("m/d/Y H:i"),
        ]);
        $quiz = Quiz::find($quiz_id);
        $quiz->name = $req->name;
        $quiz->description = $req->description;
        $quiz->deadline = $req->deadline;
        $quiz->repeat = Arr::exists($req, 'repeat')?1:0;
        $quiz->save();
        return redirect(route('quizzes.edit', ['quiz_id'=>$quiz->id]));
    }

    public function save($quiz_id){
        $quiz = Quiz::find($quiz_id);
        $quiz->status = 1;
        $quiz->save();
        return redirect(route('home'));
    }

    public function destroy($quiz_id){
        $quiz = Quiz::find($quiz_id);
        if($quiz->start_date > Carbon::now()) {
            Quiz::destroy($quiz_id);
        }
        return back();
    }
}
