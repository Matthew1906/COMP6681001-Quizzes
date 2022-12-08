<?php

namespace App\Http\Controllers;

use App\Models\FillProblem;
use App\Models\MCProblem;
use App\Models\Quiz;
use App\Models\QuizProblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuizProblemController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'teacher_only']);
    }

    function create($quiz_id, $index, $question_type){
        $quiz = Quiz::find($quiz_id);
        $curr_index = count($quiz->problems)>0?$quiz->problems->last()->index+1:1;
        if($curr_index>=$index && ($question_type == 'mcq' || $question_type == 'ftb')){
            return view('pages.make-question', ['signedIn'=>true, 'type'=>$question_type, 'quiz_id'=>$quiz->id, 'index'=>$index]); // mcq / ftb
        }
        return redirect(route("edit-quiz", ['quiz_id'=>$quiz_id]));
    }

    function store($quiz_id, $index, $question_type, Request $req){
        $new_quiz_problem = new QuizProblem;
        $new_quiz_problem->index = $index;
        $new_quiz_problem->quiz_id = $quiz_id;
        if($question_type=='mcq'){
            $req->validate([
                'question'=>'required|min:5|max:100',
                'answer'=>'required',
                'answer-a'=>'required',
                'answer-b'=>'required',
                'answer-c'=>'required',
                'answer-d'=>'required',
                'image'=>'image'
            ]);
            $problem = new MCProblem;
            $problem->question = $req->question;
            $problem->answer = $req->answer;
            $problem->choice1 = $req->input("answer-a");
            $problem->choice2 = $req->input("answer-b");
            $problem->choice3 = $req->input("answer-c");
            $problem->choice4 = $req->input("answer-d");
            $new_quiz_problem->problem_type = "App\Models\MCProblem";
        }
        else if($question_type=='ftb'){
            $req->validate([
                'question'=>'required|min:5|max:100',
                'answer'=>'required|min:5|max:100',
                'image'=>'image'
            ]);
            $problem = new FillProblem;
            $problem->question = $req->question;
            $problem->answer = $req->answer;
            $new_quiz_problem->problem_type = "App\Models\FillProblem";

        }
        $problem->save();
        $new_quiz_problem->problem_id = $problem->id;
        if($req->file('image')){
            $path = $req->file('image')->getRealPath();
            $image = file_get_contents($path);
            Storage::put("public/quizzes/".$req->file('image')->getClientOriginalName(), $image);
            $new_quiz_problem->image = $req->file('image')->getClientOriginalName();
        }
        $new_quiz_problem->save();
        return redirect(route('edit-quiz', ['quiz_id'=>$quiz_id]));
    }

    function edit($quiz_id, $index){
        $quiz_problem = QuizProblem::where('index', "=", $index)->where('quiz_id', '=', $quiz_id)->first();
        if($quiz_problem->problem_type=='App\Models\MCProblem'){
            $problem = MCProblem::find($quiz_problem->problem_id);
            $question_type = 'mcq';
        }
        else{
            $problem = FillProblem::find($quiz_problem->problem_id);
            $question_type = 'ftb';
        }
        return view('pages.make-question', ['signedIn'=>true, 'type'=>$question_type, 'quiz_id'=>$quiz_id, 'index'=>$index, 'problem'=>$problem]); // mcq / ftb
    }

    function update($quiz_id, $index, Request $req){
        $quiz_problem = QuizProblem::where('index', "=", $index)->where('quiz_id', '=', $quiz_id)->first();
        if($quiz_problem->problem_type=='App\Models\MCProblem'){
            $problem = MCProblem::find($quiz_problem->problem_id);
            $req->validate([
                'question'=>'required|min:5|max:100',
                'answer'=>'required',
                'answer-a'=>'required',
                'answer-b'=>'required',
                'answer-c'=>'required',
                'answer-d'=>'required',
                'image'=>'image'
            ]);
            $problem->question = $req->question;
            $problem->answer = $req->answer;
            $problem->choice1 = $req->input("answer-a");
            $problem->choice2 = $req->input("answer-b");
            $problem->choice3 = $req->input("answer-c");
            $problem->choice4 = $req->input("answer-d");
        }
        else{
            $problem = FillProblem::find($quiz_problem->problem_id);
            $req->validate([
                'question'=>'required|min:5|max:100',
                'answer'=>'required|min:5|max:100',
                'image'=>'image'
            ]);
            $problem->question = $req->question;
            $problem->answer = $req->answer;
        }
        $problem->save();
        if($req->file('image')){
            $path = $req->file('image')->getRealPath();
            $image = file_get_contents($path);
            Storage::put("public/quizzes/".$req->file('image')->getClientOriginalName(), $image);
            $quiz_problem->image = $req->file('image')->getClientOriginalName();
        }
        $quiz_problem->save();
        return redirect(route('edit-quiz', ['quiz_id'=>$quiz_id]));
    }

    function destroy($quiz_id, $index){
        $quiz_problem = QuizProblem::where('index', "=", $index)->where('quiz_id', '=', $quiz_id)->first();
        if($quiz_problem->problem_type=='App\Models\MCProblem'){
            $problem = MCProblem::find($quiz_problem->problem_id);
        }
        else{
            $problem = FillProblem::find($quiz_problem->problem_id);
        }
        QuizProblem::where('index', "=", $index)->where('quiz_id', '=', $quiz_id)->delete();
        $problem->delete();
        return redirect(route('edit-quiz', ['quiz_id'=>$quiz_id]));
    }

}
