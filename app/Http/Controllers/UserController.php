<?php

namespace App\Http\Controllers;

use App\Models\QuizHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $histories = QuizHistory::where('user_id', '=', Auth::id())->where('status', '=', '1')->get();
        return view('pages.users.profile', ['histories'=>$histories]);
    }

    public function history($user_id, $quiz_id)
    {
        $history = QuizHistory::where('user_id', '=', $user_id)->where('quiz_id', '=', $quiz_id)->first();
        return view('pages.users.history', ['history'=>$history]);
    }
}
