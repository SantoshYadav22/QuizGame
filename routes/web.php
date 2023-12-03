<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/question_list', [App\Http\Controllers\Frontend\UserController::class, 'question_list']);
Route::get('/add_question', [App\Http\Controllers\Frontend\UserController::class, 'add_question'])->name('add_question');
Route::post('/question_save', [App\Http\Controllers\Frontend\UserController::class, 'question_save']);
Route::get('/question/edit/{id?}', [App\Http\Controllers\Frontend\UserController::class, 'question_edit']);


Route::get('/', [App\Http\Controllers\Frontend\UserController::class, 'index']);
Route::get('/choose_you_game', [App\Http\Controllers\Frontend\UserController::class, 'choose_you_game']);
Route::get('/sector', [App\Http\Controllers\Frontend\UserController::class, 'sector']);
Route::get('/details_form/{section_type?}', [App\Http\Controllers\Frontend\UserController::class, 'details_form']);
Route::post('/user/add', [App\Http\Controllers\Frontend\UserController::class, 'user_add']);
Route::get('/bfsi', [App\Http\Controllers\Frontend\UserController::class, 'BFSI']);
Route::get('/IT', [App\Http\Controllers\Frontend\UserController::class, 'IT']);
Route::get('/logistics', [App\Http\Controllers\Frontend\UserController::class, 'logistics']);
Route::get('/hospitality', [App\Http\Controllers\Frontend\UserController::class, 'hospitality']);
Route::post('/quiz/save', [App\Http\Controllers\Frontend\UserController::class, 'quiz_save']);
Route::get('/result', [App\Http\Controllers\Frontend\UserController::class, 'result']);
Route::get('/term_condition', [App\Http\Controllers\Frontend\UserController::class, 'term_condition']);

