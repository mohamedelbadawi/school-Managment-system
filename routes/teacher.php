<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::middleware(['auth:teacher'])->group(function () {
            Route::get('teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
        });

        Route::get('logout/{type}/', [LoginController::class, 'logout'])->middleware('auth:teacher')->name('logout');
    }
);
