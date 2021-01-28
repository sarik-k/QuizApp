<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');

    Route::get('/dashboard/quiz/create', [QuizController::class, 'create'])->name('create-quiz');
    Route::post('/dashboard/quiz/create', [QuizController::class, 'store'])->name('create-quiz');

    Route::get('/dashboard/question/multiple-choice/create/quizid_{quiz_id}', [QuestionController::class, 'create_multiple_choice'])->name('create-question-multiple-choice');
});
require __DIR__ . '/auth.php';
