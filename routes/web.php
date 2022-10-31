<?php

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
    return view('home', ['signedIn'=>true]);
});

Route::get('/login', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('home');
});

Route::get('/quiz', function () {
    return view('home');
});

Route::get('/make-quiz', function () {
    return view('home');
});
