<?php

use App\Http\Controllers\QuizController;
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

Route::get('/quizzes/new', [QuizController::class, 'create'])->name('create-quiz');
Route::post('/quizzes/new', [QuizController::class, 'store'])->name('store-quiz');
Route::get('/quizzes/{quiz_id}/edit', [QuizController::class, 'edit'])->name('edit-quiz');
// Route::get('/quizzes/{quiz_id}/edit', function ($quiz_id) {
//     return view('pages.edit-quiz', ['signedIn'=>true]);
// });

Route::get('/quizzes/{quiz_id}/edit/{question_type}', function ($question_type) {
    if($question_type == 'mcq' || $question_type == 'ftb'){
        return view('pages.make-question', ['signedIn'=>true, 'type'=>$question_type]); // mcq / ftb
    }
    return redirect(route("home"));
});


Route::fallback(function(){
    return redirect(route("home"));
});
