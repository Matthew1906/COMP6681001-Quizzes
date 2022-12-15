<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizProblemController;
use App\Http\Controllers\QuizSimulationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassController;
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

Route::get('/', [QuizController::class, 'dashboard'])->name("home")->middleware("auth");

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('users.login');
    Route::post('/login', 'authenticate')->name('users.authenticate');
    Route::get('/register', 'create')->name('users.create');
    Route::post('/register', 'store')->name('users.store');
    Route::post('/logout', 'logout')->name("users.logout");
});

Route::controller(UserController::class)->group(function(){
    Route::get('/users/{user_id}', 'profile')->name('users.profile');
    Route::get('/users/{user_id}/histories/{quiz_id}', 'history')->name('users.history');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('/contact', 'create')->name('contact-us.create');
    Route::post('/contact', 'store')->name('contact-us.store');
});

Route::controller(ClassController::class)->group(function(){
    Route::get('/classes', "index")->name('classes.index');
    Route::get('/classes/{class_id}', "show")->name('classes.show');
    Route::get('/classes/{class_id}/histories/{quiz_id}', "history")->name('classes.history');
});

Route::controller(QuizController::class)->group(function(){
    Route::get("/quizzes", "index")->name("quizzes.index");
    Route::get('/quizzes/new', 'create')->name('quizzes.create')->middleware(['auth', 'teacher_only']);
    Route::post('/quizzes/new', 'store')->name('quizzes.store')->middleware(['auth', 'teacher_only']);
    Route::get('/quizzes/{quiz_id}', 'edit')->name('quizzes.edit')->middleware(['auth', 'teacher_only']);
    Route::patch('/quizzes/{quiz_id}', 'update')->name('quizzes.update')->middleware(['auth', 'teacher_only']);
    Route::post('/quizzes/{quiz_id}', 'save')->name('quizzes.save')->middleware(['auth', 'teacher_only']);
    Route::delete('/quizzes/{quiz_id}', 'destroy')->name('quizzes.destroy')->middleware(['auth', 'teacher_only']);
});

Route::controller(QuizProblemController::class)->group(function(){
    Route::get('/quizzes/{quiz_id}/problems/{index}/{question_type}', 'create')->name('quiz-problems.create');
    Route::post('/quizzes/{quiz_id}/problems/{index}/{question_type}', 'store')->name('quiz-problems.store');
    Route::get('/quizzes/{quiz_id}/problems/{index}', 'edit')->name('quiz-problems.edit');
    Route::patch('/quizzes/{quiz_id}/problems/{index}', 'update')->name('quiz-problems.update');
    Route::delete('/quizzes/{quiz_id}/problems/{index}', 'destroy')->name('quiz-problems.destroy');
});

Route::controller(QuizSimulationController::class)->group(function(){
    Route::get('/quizzes/{quiz_id}/simulation', 'start')->name('quiz-simulations.start');
    Route::post('/quizzes/{quiz_id}/simulation/{index}', 'answer')->name('quiz-simulations.answer');
    Route::patch('/quizzes/{quiz_id}/simulation', 'finish')->name('quiz-simulations.finish');
});

Route::get("/403", function(){
    return view("errors.unauthorized");
})->name("errors.unauthorized");

Route::fallback(function(){
    return redirect(route("home"));
});
