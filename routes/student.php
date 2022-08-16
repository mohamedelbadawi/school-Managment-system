<?php

use App\Http\Controllers\Student\QuizController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::middleware(['auth:student'])->group(function () {
            Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');

            Route::get('student/quizzes/', [QuizController::class, 'index'])->name('student.quiz.index');
            Route::get('student/quizzes/{quiz}', [QuizController::class, 'show'])->middleware('checkAtemptStatus')->name('student.quiz.atempt');
            Route::post('student/quizzes/{quiz}/submit', [QuizController::class, 'submitQuiz'])->name('student.quiz.submit');
            Route::get('student/profile', [StudentController::class, 'showProfile'])->name('student.profile');
            Route::post('student/profile/update', [StudentController::class, 'updateProfile'])->name('student.profile.update');
        });
    }
);
