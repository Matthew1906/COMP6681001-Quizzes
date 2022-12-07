<?php

namespace App\Http\Controllers;

use App\Models\HistoryDetail;
use App\Models\Quiz;
use App\Models\QuizHistory;
use App\Models\QuizProblem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuizSimulationController extends Controller
{
    public function start($quiz_id){
        $quiz = Quiz::find($quiz_id);
        if(Carbon::now()>$quiz->deadline){
            return redirect(route('home'));
        }
        $problems = QuizProblem::where('quiz_id', '=', $quiz_id)->paginate(1);
        if(!QuizHistory::where('quiz_id', '=', $quiz_id)->where('user_id', '=', 1)->first()){
            $new_history = new QuizHistory;
            $new_history->quiz_id = $quiz_id;
            $new_history->user_id = 1;
            $new_history->status = 0;
            $new_history->save();
        }
        return view('pages.quiz', ['signedIn'=>true, 'problems'=>$problems]);
    }

    public function answer($quiz_id, $index, Request $req){
        $quiz = Quiz::find($quiz_id);
        if(Carbon::now()>$quiz->deadline){
            return redirect(route('home'));
        }
        $req->validate(["answer"=>'required']);
        $history = QuizHistory::where('quiz_id', '=', $quiz_id)->where('user_id', '=', 1)->first();
        if(!HistoryDetail::where('history_id', '=', $history->id)->where('index', '=', $index)->first()){
            $detail = new HistoryDetail;
            $detail->history_id = $history->id;
            $detail->index = $index;
            $detail->answer = $req->answer;
            $detail->save();
        }
        else{
            HistoryDetail::where('history_id', '=', $history->id)->where('index', '=', $index)->update(['answer'=>$req->answer]);
        }
        return back();
    }

    public function finish($quiz_id)
    {
        $problems = QuizProblem::where('quiz_id', '=', $quiz_id)->get();
        $history = QuizHistory::where('quiz_id', '=', $quiz_id)->where('user_id', '=', 1)->first();
        $details = HistoryDetail::where('history_id', '=', $history->id)->get();
        if($problems->count() == $details->count()){
            QuizHistory::where('quiz_id', '=', $quiz_id)->where('user_id', '=', 1)->update(['status'=>1]);
            return redirect(route('home'));
        }
        return back()->with('error', 'You need to answer all questions first!!');
    }
}
