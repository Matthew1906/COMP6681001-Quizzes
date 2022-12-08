<?php

use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizProblemController;
use App\Http\Controllers\QuizSimulationController;
use App\Http\Controllers\UserController;
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
    return view('pages.dashboard');
})->name("home")->middleware("auth");

/* Sathya */

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'login_user'])->name('login_user');
Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_user'])->name('register_user');
Route::post('logout', [UserController::class, 'logout'])->name("logout");

Route::get('/quizHistory', function () {
    return view('pages.quiz-history', ['signedIn'=>true]);
});

Route::get('/profile', function () {
    return view('pages.profile', ['signedIn'=>true]);
})->name("profile");

/* Matthew */

Route::controller(QuizController::class)->group(function(){
    Route::get("/quizzes", "index")->name("index-quiz");
    Route::get('/quizzes/new', 'create')->name('create-quiz')->middleware(['auth', 'teacher_only']);
    Route::post('/quizzes/new', 'store')->name('store-quiz')->middleware(['auth', 'teacher_only']);
    Route::get('/quizzes/{quiz_id}', 'edit')->name('edit-quiz')->middleware(['auth', 'teacher_only']);
    Route::patch('/quizzes/{quiz_id}', 'update')->name('update-quiz')->middleware(['auth', 'teacher_only']);
    Route::post('/quizzes/{quiz_id}', 'save')->name('save-quiz')->middleware(['auth', 'teacher_only']);
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
    Route::patch('/quizzes/{quiz_id}/simulation', 'finish')->name('finish-quiz');
});

Route::get("/403", function(){
    return view("errors.unauthorized");
})->name("errors.unauthorized");

Route::fallback(function(){
    return redirect(route("home"));
});

/* Charles */
Route::get('/contact', function () {
    return view('pages.contact',['signedIn'=>false]);
});

/* Bryan D */
Route::get('/my-class', function () {
    return view('pages.my-class',['signedIn'=>true]);
});

Route::get('/my-classes', function(){
    return view('pages.my-classes',['signedIn'=>true]);
});
Route::get('/my-class/quiz-history', function(){
    return view('pages.my-class-quiz-history',['signedIn'=>true]);
});
