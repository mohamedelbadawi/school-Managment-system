<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TeacherController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::middleware(['auth:teacher'])->group(function () {
            Route::get('teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
            // TODO:create quiz with question for only subject of the 
            Route::get('quizzes/create', [QuizController::class, 'create'])->name('quiz.create');
            Route::post('quizzes/store', [QuizController::class, 'store'])->name('quiz.store');
            Route::get('quizzes/', [QuizController::class, 'index'])->name('quiz.index');
            Route::delete('quizzes/delete/{quiz}', [QuizController::class, 'delete'])->name('quiz.delete');
            // create meeting
            Route::post('/meetings/store', [MeetingController::class, 'store'])->name('meeting.store');
            // Route::get('logout/{type}/', [LoginController::class, 'logout'])->name('logout.teacher');
            Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
            Route::get('/attendance/{classRoom}', [AttendanceController::class, 'show'])->name('attendance.show');
            Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');
            Route::get('/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
            Route::post('/profile/update', [TeacherController::class, 'updateProfile'])->name('teacher.profile.update');
            Route::get('/quiz/{quiz}/result', [QuizController::class, 'showStudentsResult'])->name('teacher.quiz.result');
            Route::get('/quiz/{quiz}/close', [QuizController::class, 'closeQuiz'])->name('teacher.quiz.close');
        });
        Route::get('/meetings', [MeetingController::class, 'index'])->name('meeting.index');
    }
);
