<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\VoteQuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VoteAnswerController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('home');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('question', QuestionsController::class);
Route::resource('question.answer', AnswersController::class);
Route::post('answer/{answer}/accept', AcceptAnswerController::class)->name('answer.accept');

Route::post('question/favorites/{question}', [FavoritesController::class, 'store'])->name('question.favorite');
Route::delete('question/favorites/{question}', [FavoritesController::class, 'destroy'])->name('question.unfavorite');



// Route::delete('question/favorites/{question}', 'FavoritesController@destroy')->name('question.unfavorite');
Route::post('question/vote/{question}', VoteQuestionController::class)->name('question.vote');
Route::post('answer/vote/{answer}', VoteAnswerController::class)->name('answer.vote');
// Route::post('answer/vote/{answer}', 'VoteAnswerController')->name('answer.vote');