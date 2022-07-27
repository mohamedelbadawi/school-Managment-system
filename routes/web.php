
<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::middleware(['auth'])->group(function () {
            Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
            Route::get('/grades', [GradeController::class, 'index'])->name('grade.index');
            Route::post('/grades/store', [GradeController::class, 'storeGrade'])->name('grade.store');
            Route::Patch('/grades/update/{grade}', [GradeController::class, 'updateGrade'])->name('grade.update');
            Route::delete('/grades/delete/{grade}', [GradeController::class, 'deleteGrade'])->name('grade.delete');
        });
        Auth::routes();
    }
);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
