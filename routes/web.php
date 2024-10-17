<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin/createQuestions',[QuestionController::class,'gotoQuestionPage'] )->name('questionPage');
    Route::post('/add-question',[QuestionController::class,'addQuestion'] )->name('addQuestion');


});


    Route::middleware(['auth','role:user'])->group(function () {
        Route::get('/user/dashboard', function () {
            return view('/user/dashboard');
        })->name('user-dashboard');

});
require __DIR__.'/auth.php';
