<?php

use App\Http\Controllers\parent\AttendanceController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentParentController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::middleware(['auth:parent'])->group(function () {
            Route::get('/parent/dashboard', [StudentParentController::class, 'index'])->name('parent.dashboard');
            Route::get('/parent/{student}/result', [ResultController::class, 'showStudentQuizzesResult'])->name('parent.student.result');
            Route::get('/parent/attendance', [AttendanceController::class, 'index'])->name('parent.attendance');
        });
    }
);
