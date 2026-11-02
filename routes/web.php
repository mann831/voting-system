<?php

use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [VoteController::class, 'index'])->name('home');
Route::get('/submissions', [VoteController::class, 'submissions'])->name('submissions');
Route::delete('/submissions/{vote}', [VoteController::class, 'destroy'])->name('submissions.destroy');
Route::post('/check-age', [VoteController::class, 'checkAge'])->name('check.age');

Route::middleware('check.age')->group(function () {
    Route::get('/vote', [VoteController::class, 'showVotePage'])->name('vote');
    Route::post('/vote', [VoteController::class, 'submitVote'])->name('vote.submit');
});