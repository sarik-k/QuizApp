<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


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

Route::get('/', [PagesController::class, 'home'])->name('homepage');
Route::get('/quiz/{quiz_id}', [PagesController::class, 'takeQuiz'])->name('take-quiz');
Route::get('/result/{result_id}', [PagesController::class, 'showResult'])->name('showResult');

Route::post('/quiz/multiple-choice/submit', [PagesController::class, 'submitMultipleChoice'])->name('submit-quiz-multiple-choice');
Route::post('/quiz/multiple-response/submit', [PagesController::class, 'submitMultipleResponse'])->name('submit-quiz-multiple-response');



require __DIR__.'/auth.php';
