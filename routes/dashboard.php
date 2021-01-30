<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
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

    Route::get('/dashboard/quiz/', [QuizController::class, 'index'])->name('list-quiz');

    Route::get('/dashboard/quiz/create', [QuizController::class, 'create'])->name('create-quiz');
    Route::post('/dashboard/quiz/create', [QuizController::class, 'store'])->name('store-quiz');

    Route::get('/dashboard/quiz/{quiz_id}/edit', [QuizController::class, 'edit'])->name('edit-quiz');

    Route::get('/dashboard/results/', [ResultController::class, 'index'])->name('list-results');



    //Route::get('/dashboard/quiz/{quiz_id}/question/multiple-choice/create/', [QuestionController::class, 'create_multiple_choice'])->name('create-question-multiple-choice');
    Route::post('/dashboard/quiz/{quiz_id}/question/multiple-choice/store/', [QuestionController::class, 'store_multiple_choice'])->name('store-question-multiple-choice');
    Route::post('/dashboard/quiz/{quiz_id}/question/multiple-response/store/', [QuestionController::class, 'store_multiple_response'])->name('store-question-multiple-response');
});
require __DIR__ . '/auth.php';
