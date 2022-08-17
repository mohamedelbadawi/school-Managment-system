<?php

use App\Http\Controllers\parent\AttendanceController;
use App\Http\Controllers\parent\InvoiceController;
use App\Http\Controllers\parent\PaymentController;
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
            Route::get('/parent/profile', [StudentParentController::class, 'showProfile'])->name('parent.profile');
            Route::post('/parent/profile/update', [StudentParentController::class, 'updateProfile'])->name('parent.profile.update');
            Route::get('/parent/students/invoices', [InvoiceController::class, 'index'])->name('parent.student.invoice');
            Route::get('/parent/students/payments', [PaymentController::class, 'index'])->name('parent.student.payment');
        });
    }
);
