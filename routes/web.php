<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home', ['signedIn'=>false]);
})->name("home");

Route::get('/login', function () {
    return view('pages.home');
});

Route::get('/register', function () {
    return view('pages.home');
});

/* Matthew */

Route::get('/quiz', function () {
    return view('pages.quiz', ['signedIn'=>true, 'type'=>'mcq']); // mcq / ftb
});

Route::get('/quiz/new', function () {
    return view('pages.make-quiz', ['signedIn'=>true]);
});

Route::get('/quiz/new/{question_type}', function ($question_type) {
    if($question_type == 'mcq' || $question_type == 'ftb'){
        return view('pages.make-question', ['signedIn'=>true, 'type'=>$question_type]); // mcq / ftb
    }
    return redirect(route("home"));
});


Route::fallback(function(){
    return redirect(route("home"));
});
