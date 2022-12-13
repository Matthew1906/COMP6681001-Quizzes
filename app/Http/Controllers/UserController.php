<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function profile()
    {
        return view('pages.profile');
    }

    public function history()
    {
        return view('pages.my-class-quiz-history');
    }

}
