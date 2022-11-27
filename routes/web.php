<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizProblemController;
use App\Http\Controllers\QuizSimulation;
use App\Http\Controllers\QuizSimulationController;
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

/* Sathya */

Route::get('/login', function () {
    return view('pages.login', ['signedIn'=>false]);
});

Route::get('/register', function () {
    return view('pages.register', ['signedIn'=>false]);
});

Route::get('/quizHistory', function () {
    return view('pages.quiz-history', ['signedIn'=>true]);
});

Route::get('/profile', function () {
    return view('pages.profile', ['signedIn'=>true]);
});

/* Matthew */

Route::get('/quiz', function () {
    return view('pages.quiz', ['signedIn'=>true, 'type'=>'mcq']); // mcq / ftb
});

Route::controller(QuizController::class)->group(function(){
    Route::get('/quizzes/new', 'create')->name('create-quiz');
    Route::post('/quizzes/new', 'store')->name('store-quiz');
    Route::get('/quizzes/{quiz_id}', 'edit')->name('edit-quiz');
    Route::patch('/quizzes/{quiz_id}', 'update')->name('update-quiz');
    Route::post('/quizzes/{quiz_id}', 'save')->name('save-quiz');
});

Route::controller(QuizProblemController::class)->group(function(){
    Route::get('/quizzes/{quiz_id}/problems/{index}/{question_type}', 'create')->name('create-quiz-problem');
    Route::post('/quizzes/{quiz_id}/problems/{index}/{question_type}', 'store')->name('store-quiz-problem');
    Route::get('/quizzes/{quiz_id}/problems/{index}', 'edit')->name('edit-quiz-problem');
    Route::patch('/quizzes/{quiz_id}/problems/{index}', 'update')->name('update-quiz-problem');
    Route::delete('/quizzes/{quiz_id}/problems/{index}', 'destroy')->name('destroy-quiz-problem');
});

Route::controller(QuizSimulationController::class)->group(function(){
    Route::get('/quizzes/{quiz_id}/simulation', 'start')->name('start-quiz');
    Route::post('/quizzes/{quiz_id}/simulation/{index}', 'answer')->name('answer-quiz');
});

Route::fallback(function(){
    return redirect(route("home"));
});
